@extends('public.layouts.main')

@section('breadcrumbs')
    {!! Breadcrumbs::render('history') !!}
@endsection

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    <ul class="breadcrambs">
                        {!! Breadcrumbs::render('user') !!}
                    </ul>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="main-title">Мои заказы</p>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="cabinet__aside">
                        <p class="cabinet__aside-title">МОЙ ЛИЧНЫЙ КАБИНЕТ</p>
                        <ul class="hidden-xs">
                            <li><a href="{{env('APP_URL')}}/user">Личные данные</a></li>
                            <li><a href="{{env('APP_URL')}}/user/mailing">настройка рассылок</a></li>
                            <li><a href="javascript:void(0);" class="active">Мои заказы</a></li>
                            <li><a href="{{env('APP_URL')}}/user/wishlist">мои товары</a></li>
                            <li><a href="{{env('APP_URL')}}/logout">Выйти</a></li>
                        </ul>
                        <div class="visible-xs-block">
                            <select class="chosen-select" name="" id="">
                                <option value="{env('APP_URL')}}/user">Личные данные</option>
                                <option value="{{env('APP_URL')}}/user/mailing">настройка рассылок</option>
                                <option value="" selected="selected">Мои заказы</option>
                                <option value="{{env('APP_URL')}}/user/wishlist">мои товары</option>
                                <option value="{{env('APP_URL')}}/logout">Выйти</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-12">
                    <form action="" class="my-order__form">
                        <select class="chosen-select" name="" id="">
                            <option value="0" selected="selected">Все заказы (15)</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">Заказ № {{ $order->id }}</option>
                            @endforeach
                        </select>
                        <button class="my-order-refresh-btn">Обновить статусы заказов</button>
                    </form>
                    <ul class="my-order__titles">
                        <li>№ заказа</li>
                        <li>Оформлен</li>
                        <li>Товары и сумма</li>
                        <li>Отследить посылку</li>
                        <li>Статус</li>
                    </ul>
                    @foreach($orders as $order)
                        @php
                            $products = $order->getProducts();
                            $delivery_info = $order->getDeliveryInfo();
                        @endphp
                        <div class="my-order__item">
                            <div class="my-order__item-article">
                                {{--@foreach($products as $product)--}}
                                    {{--@if(!is_null($product['product']))--}}
                                        {{--<p>Артикул {{ $product['product']->articul }}</p>--}}
                                        {{--<a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}" target="_blank">Подробнее</a>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                                № {{ $order->id }}
                            </div>
                            <div class="my-order__item-date">{{ date('d.m.Y', strtotime($order->created_at)) }}</div>
                            <div class="my-order__item-total">
                                @foreach($products as $product)
                                    @if(!is_null($product['product']))
                                        <div>
                                            <div class="my-order__item-article">
                                                <p>Артикул {{ $product['product']->articul }}</p>
                                                <a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}" target="_blank">Подробнее</a>
                                            </div>
                                            <div class="my-order__item-date">{{ date('d.m.Y', strtotime($order->created_at)) }}</div>
                                            <p>{{ $product['quantity'] }} товар на <span>{{ $product['price'] }} грн</span></p>
                                        </div>
                                        <a href="{{ $product['product']->url_alias }}" target="_blank">
                                            <img src="{{ $product['product']->image->url('product_list') }}" alt="{{ $product['product']->name }}">
                                        </a>
                                    @else
                                        <div>
                                            <div>
                                                <p>Товар более не доступен</p>
                                            </div>
                                            <div class="my-order__item-date">{{ date('d.m.Y', strtotime($order->created_at)) }}</div>
                                            <p>{{ $product['quantity'] }} товар на <span>{{ $product['price'] }} грн</span></p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="my-order__item-number">
                                <div>
                                    @if(isset($delivery_info['ttn']))
                                    <span>Номер ТТН</span>
                                    <p>{{ $delivery_info['ttn'] }}</p>
                                    <a href="javascript:void(0);" class="ttn_info" data-id="{{ $delivery_info['ttn'] }}">Отследить</a>
                                    @endif
                                </div>
                                <div class="my-order__item-status">
                                    @foreach($orders_statuses as $status)
                                        @if($status->id == $order->status_id)
                                            <p class="{{ $status->status == 'Отменен' ? 'canseled' : 'issued' }}">{{ $status->status }}</p>
                                        @endif
                                    @endforeach
                                    {{--<a href="javascript:void(0);" class="return">Заявка на возврат</a>--}}
                                </div>
                            </div>
                            <div class="my-order__item-status">
                                @foreach($orders_statuses as $status)
                                    @if($status->id == $order->status_id)
                                        <p class="{{ $status->status == 'Отменен' ? 'canseled' : 'issued' }}">{{ $status->status }}</p>
                                    @endif
                                @endforeach
                                {{--<a href="javascript:void(0);" class="return">Заявка на возврат</a>--}}
                            </div>
                        </div>
                    @endforeach

                    {{--<div class="my-order__item">--}}
                        {{--<div class="my-order__item-article">--}}
                            {{--<p>Артикул 450944</p>--}}
                            {{--<a href="">Подробнее</a>--}}
                        {{--</div>--}}
                        {{--<div class="my-order__item-date">01.07.2018</div>--}}
                        {{--<div class="my-order__item-total">--}}
                            {{--<div>--}}
                                {{--<div class="my-order__item-article">--}}
                                    {{--<p>Артикул 450944</p>--}}
                                    {{--<a href="">Подробнее</a>--}}
                                {{--</div>--}}
                                {{--<div class="my-order__item-date">01.07.2018</div>--}}
                                {{--<p>1 товар на <span>9 999 грн</span></p>--}}
                            {{--</div>--}}
                            {{--<img src="../../images/sample-1.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="my-order__item-number">--}}
                            {{--<div>--}}
                                {{--<span>Номер ТТН</span>--}}
                                {{--<p>4509446458379</p>--}}
                                {{--<a href="">Отследить</a>--}}
                            {{--</div>--}}
                            {{--<div class="my-order__item-status">--}}
                                {{--<p class="issued">Выдан</p>--}}
                                {{--<a href="" class="return">Заявка на возврат</a href="">--}}
                                {{--<p class="canseled">Отменен</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="my-order__item-status">--}}
                            {{--<p class="issued">Выдан</p>--}}
                            {{--<a href="" class="return">Заявка на возврат</a href="">--}}
                            {{--<p class="canseled">Отменен</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection