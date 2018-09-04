@section('meta')
    <title>Спасибо за заказ</title>
@endsection

<!DOCTYPE html>
<html lang="ru">
@include('public.layouts.header')
<body>
<header class="header">
    <div class="container-fluid">
        <div class="row header-inform-container thanks-page underline">
            <ul class="header__time-information">
                <li>
                    <a href="{{env('APP_URL')}}"><img src="/images/icons/1.png" alt="MDK"></a>
                </li>
                <li>Время работы колл центра: <span>с 09:00 до 17:00 ПН-ПТ </span></li>
            </ul>
            <div class="">
                <div class="header__logo thanks-page">
                    <a href="{{env('APP_URL')}}"><img src="/images/logo.png" alt="MDK"></a>
                </div>
            </div>
            <div class="header__phone">
                <img src="/images/icons/2.png" alt="">
                <ul>
                    <li><a href="tel:(050) 162 08 88">(050) 162 08 88</a></li>
                    <li><a href="tel:(067) 800 10 77">(067) 800 10 77</a></li>
                    <li><a href="tel:(044) 333 71 09">(044) 333 71 09</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<main id="main-container" style="min-height: calc(100vh - 227px);display: flex;justify-content: center;align-items: center;">
    <section style="width: 100%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <p class="thanks__title">Cпасибо, Ваш заказ принят.
                        <br>Наш менеджер свяжется с Вами</p>
                    <p class="thanks__order-number">Ваш заказ: <span>№ {{ $order->id }}</span></p>
                    <p class="thanks__info">Оплата при получении</p>
                    <p class="thanks__info">Поделится заказом:</p>
                    <ul class="footer__social">
                        <li><img src="/images/icons/9.png" alt="" srcset=""></li>
                        <li><img src="/images/icons/10.png" alt="" srcset=""></li>
                        <li><img src="/images/icons/11.png" alt="" srcset=""></li>
                        <li><img src="/images/icons/12.png" alt="" srcset=""></li>
                    </ul>
                </div>
                <div class="col-sm-7 col-xs-12">
                    @foreach($order->getProducts() as $item)
                        <div class="order-item">
                            <img src="{!! $item['product']->image->url() !!}" class="order-item-img" alt="">
                            <div class="order-item-descr-wrp">
                                <div class="order-item-name">
                                    {!! $item['product']->name !!}
                                    @if(!empty($item['variations']))
                                        (
                                        @foreach($item['variations'] as $name => $val)
                                            {{ $name }}: {{ $val }};
                                        @endforeach
                                        )
                                    @endif
                                </div>
                                <div class="order-item-article">Артикул {!! $item['product']->articul !!}</div>
                                <div class="order-item-descr">
                                    <p class="hidden-xs">Цена:</p>
                                    <p>{{ number_format( round($item['price'], 2), 0, ',', ' ' ) }} грн</p>
                                </div>
                                <div class="order-item-descr">
                                    <p class="hidden-xs">Количество:</p>
                                    <p>{{ $item['quantity'] }}</p>
                                </div>
                                <div class="order-item-descr hidden-xs">
                                    <p>Наличие:</p>
                                    <p>В наличии</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="order-total">
                        <p>Итого сумма:</p>
                        <p>{{ number_format( round($order->total_price, 2), 0, ',', ' ' ) }} грн</p>
                    </div>
                    <a href="{{env('APP_URL')}}" class="thanks-back-btn">На главную</a>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="footer__contact thanks-page">
                    <div class="footer__contact-phones">
                        <img src="/images/icons/2.png" alt="">
                        <ul class="footer__contact-list footer-list">
                            <li>(050) 162 08 88</li>
                            <li>(067) 800 10 77</li>
                            <li>(044) 333 71 09</li>
                        </ul>
                    </div>
                    <ul class="footer__contact-mail footer-list">
                        <li><img src="/images/icons/7.png" alt="">mailmdk@gmail.com</li>
                        <li><img src="/images/icons/8.png" alt=""><a href="">Напишите нам</a></li>
                    </ul>
                </div>
                <ul class="footer__contact-address footer-list">
                    <li><img src="/images/icons/6.png"</li>
                    <li>ВСЕ МАГАЗИНЫ</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3">
                <ul class="footer__social">
                    <li><img src="/images/icons/9.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/10.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/11.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/12.png" alt="" srcset=""></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-4">
                <ul class="footer-delivery-list footer-list thanks-page">
                    <li><img src="/images/icons/13.png" alt=""></li>
                    <li> Бесплатная доставка:</li>
                    <li><img src="/images/icons/np.png" alt=""></li>
                    <li><img src="/images/icons/mc.png" alt=""></li>
                    <li><img src="/images/icons/visa.png" alt=""></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@include('public.layouts.footer-scripts')
</body>
</html>