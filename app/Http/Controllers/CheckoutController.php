<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Newpost;
use App\Models\Order;
use App\Models\Settings;
use App\Models\UserData;
use App\Models\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Models\Modules;
use App\Models\Products;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Validator;

class CheckoutController extends Controller
{
    /**
     * Создание заказа
     *
     * @param Request $request
     * @param Order $order
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(Request $request, Order $order, Cart $cart, User $users)
    {
        $cart = $cart->current_cart();

        if(!$cart->total_quantity){
            return response()->json(['error' => ['cart' => 'В корзине нет товаров!']]);
        }

        $errors = $this->validateFields($request->all());
        if ($errors) {
            return response()->json(['error' => $errors]);
        }

        $user = Sentinel::check();

        if (!$user) {
            $existed_user = $users->checkIfUnregistered($request->phone, $request->email);

            if(!is_null($existed_user)) {
                $user = $existed_user;
            } else {
                $register = new LoginController();
                $user = $register->storeAsUnregistered($request);
            }
        }

        $delivery_method = $request->delivery;
        $delivery_info = [
            'method'    => $delivery_method,
            'info'      => $request->$delivery_method
        ];

        $data = [
            'user_id'   => $user->id,
            'products'  => $cart->products,
            'total_quantity'    => $cart->total_quantity,
            'total_price'       => $cart->total_price,
            'user_info'         => json_encode([
                'name'  => $request->fio,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment
            ]),
            'delivery'  => json_encode($delivery_info),
            'payment'   => $request->payment,
            'status_id' => 0,
            'created_at' => Carbon::now()
        ];

        $id = $order->insertGetId($data);

        $this->sendOrderMails($id);
//        if($order->payment == 'card')
//            return $this->get_liqpay_data($order);
//        else
            return response()->json(['success' => 'redirect', 'order_id' => $id]);
    }

    /**
     * Получене данных для Liqpay
     *
     * @param $order
     * @return array
     * @throws \League\Flysystem\Exception
     */
    public function get_liqpay_data($order){
        $public_key = config('liqpay.public_key');
        $private_key = config('liqpay.private_key');
        $liqpay = new LiqPay($public_key, $private_key);
        $checkout = $liqpay->cnb_form([
            'action'    => 'pay',
            'amount'    => $order->total_price,
            'currency'  => 'UAH',
            'description'   => 'Оплата заказа №' . $order->id . ' на сайте ВерхАгро',
            'order_id'  => $order->id,
            'sandbox'   => 1,
            'version'   => 3,
            'result_url' => url('/checkout/complete?order_id=' . $order->id)
        ]);

        return ['success' => 'liqpay', 'liqpay' => $checkout, 'order_id' => $order->id];
    }

    public function sendOrderMails($order_id){
        $setting = new Settings();
        $cart = new Cart();

        $order = Order::find($order_id);

        $order->update(['status_id' => 1]);

        $order_user = json_decode($order->user_info, true);

        $cart = $cart->current_cart();

        $cart->current_cart()->delete();

        Mail::send('emails.order', ['user' => $order_user, 'order' => $order, 'admin' => true], function($msg) use ($setting){
            $msg->from('admin@tyfli.com', 'Интернет-магазин Tyfli.com');
            $msg->to(get_object_vars($setting->get_setting('notify_emails')));
            $msg->subject('Новый заказ');
        });

        Mail::send('emails.order', ['user' => $order_user, 'order' => $order, 'admin' => false], function($msg) use ($order_user){
            $msg->from('admin@tyfli.com', 'Интернет-магазин Tyfli.com');
            $msg->to($order_user['email']);
            $msg->subject('Новый заказ');
        });
    }

    /**
     * Подгрузка различных темплейтов в зависимости от выбранного способа доставки
     * @param Request $request
     * @param Newpost $newpost
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delivery(Request $request, Newpost $newpost)
    {
        if (!is_null($request->cookie('current_order_id'))) {
            $current_order_id = $request->cookie('current_order_id');
        } elseif ($request->order_id) {
            $current_order_id = $request->order_id;
        }else {
            $current_order_id = 0;
        }

        if ($request->delivery == 'newpost'){
            $regions = $newpost->getRegions();

            return view('public.checkout.newpost', [
                'regions'           => $regions,
                'current_order_id'  => $current_order_id
            ]);
        } else {
            return view('public.checkout.' . $request->delivery, ['current_order_id' => $current_order_id]);
        }
    }

    /**
     * Валидация полей доставки
     *
     * @param $data
     * @return mixed
     */
    public function validateFields($data)
    {
        $errors = [];

        $rules = [
            'fio' => 'required',
            'phone'     => 'required|regex:/^[0-9\-! ,\'\"\/+@\.:\(\)]+$/',
            'email'     =>'required|email'
        ];

        $messages = [
            'fio.required' => 'Вы не указали имя!',
            'phone.required'    => 'Вы не указали телефон!',
            'phone.regex'       => 'Некорректный номер телефона!',
            'email.required'    => 'Вы не указали e-mail!',
            'email.email'       => 'Некорректный email-адрес!'
        ];

        if(isset($data['delivery'])) {
            if ($data['delivery'] == 'newpost') {
                $rules = array_merge($rules, [
                    'newpost.region' => 'not_in:0',
                    'newpost.city' => 'not_in:0',
                    'newpost.warehouse' => 'not_in:0',
                ]);

                $messages = array_merge($messages, [
                    'newpost.region.not_in' => 'Выберите область!',
                    'newpost.city.not_in' => 'Выберите город!',
                    'newpost.warehouse.not_in' => 'Выберите отделение Новой Почты!',
                ]);
            } elseif ($data['delivery'] == 'courier') {
                $rules = array_merge($rules, [
                    'courier.street' => 'required',
                    'courier.house' => 'required',
                ]);

                $messages = array_merge($messages, [
                    'courier.street.required' => 'Не указана улица!',
                    'courier.house.required' => 'Не указан номер дома!',
                ]);
            } elseif ($data['delivery'] == 'ukrpost') {
                $rules = array_merge($rules, [
                    'ukrpost.region' => 'required',
                    'ukrpost.city' => 'required',
                    'ukrpost.index' => 'required|numeric',
                    'ukrpost.street' => 'required',
                    'ukrpost.house' => 'required',
                ]);

                $messages = array_merge($messages, [
                    'ukrpost.region.required' => 'Не указана область!',
                    'ukrpost.city.required' => 'Не указан город!',
                    'ukrpost.index.required' => 'Не указан почтовый индекс!',
                    'ukrpost.index.numeric' => 'Индекс должен быть числовым!',
                    'ukrpost.street.required' => 'Не указана улица!',
                    'ukrpost.house.required' => 'Не указан номер дома!',
                ]);
            } elseif (!$data['delivery']) {
                $errors = [
                    'delivery' => 'Не выбран метод доставки!',
                ];
            }
        }else{
            $errors = [
                'delivery' => 'Не выбран метод доставки!',
            ];
        }

        $rules['payment'] = 'required|in:cash,prepayment,cod';
        $messages['payment.required'] = 'Не выбран способ оплаты!';
        $messages['payment.in'] = 'Выбран некорректный способ оплаты!';

        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()){
            $errors = array_merge($errors, $validator->messages()->toArray());
        }

        if (!empty($errors))
            return $errors;

        return false;
    }

    /**
     * Загрузка списка городов Новой Почты
     *
     * @param Request $request
     * @param Newpost $newpost
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities(Request $request, Newpost $newpost)
    {
        $region = $newpost->getRegionRef($request->region_id);

        if (!is_null($region)) {
            $cities = $newpost->getCities($region->region_id);
        } else {
            return response()->json(['error' => 'При загрузке городов произошла ошибка. Пожалуйста, попробуйте еще раз!']);
        }

        if ($cities) {
            return response()->json(['success' => $cities]);
        } else {
            return response()->json(['error' => 'При загрузке городов произошла ошибка. Пожалуйста, попробуйте еще раз!']);
        }
    }

    /**
     * Загрузка списка отделений Новой Почты
     *
     * @param Request $request
     * @param Newpost $newpost
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWarehouses(Request $request, Newpost $newpost)
    {
        $city = $newpost->getCityRef($request->city_id);

        if (!is_null($city)) {
            $warehouses = $newpost->getWarehouses($city->city_id);
        } else {
            return response()->json(['error' => 'При загрузке отделений произошла ошибка. Пожалуйста, попробуйте еще раз!']);
        }

        if ($warehouses) {
            return response()->json(['success' => $warehouses]);
        } else {
            return response()->json(['error' => 'При загрузке отделений произошла ошибка. Пожалуйста, попробуйте еще раз!']);
        }
    }
}
