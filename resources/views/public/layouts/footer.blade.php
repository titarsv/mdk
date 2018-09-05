<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <p class="footer__title">Контакты</p>
                <div class="footer__contact">
                    <div class="footer__contact-phones">
                        <img src="/images/icons/2.png" alt="">
                        <ul class="footer__contact-list footer-list">
                            <li>(050) 162 08 88</li>
                            <li>(067) 800 10 77</li>
                            <li>(044) 333 71 09</li>
                        </ul>
                    </div>
                    <ul class="footer__contact-mail footer-list">
                        <li><img src="/images/icons/7.png" alt=""><a href="mailto:mailmdk@gmail.com">mailmdk@gmail.com</a></li>
                        <li><img src="/images/icons/8.png" alt=""><a href="{{env('APP_URL')}}/page/contact">Напишите нам</a></li>
                    </ul>
                </div>
                <ul class="footer__contact-address footer-list">
                    <li><img src="/images/icons/6.png"></li>
                    <li><a href="{{env('APP_URL')}}/page/contact">ВСЕ МАГАЗИНЫ</a></li>
                </ul>
            </div>
            <div class="col-md-offset-1 col-md-3 col-sm-3 side-border left">
                <p class="footer__title">Сервис</p>
                <div class="footer__contact">
                    <ul class="footer__links">
                        <li><a href="{{env('APP_URL')}}/page/dostavka-i-oplata">Доставка и оплата</a></li>
                        <li><a href="{{env('APP_URL')}}/page/predlozheniya-ot-privatbanka">Рассрочка</a></li>
                        <li><a href="{{env('APP_URL')}}/page/hochu-videt-v-magazine">Хочу видеть в магазине</a></li>
                    </ul>
                    <ul class="footer__links">
                        <li><a href="{{env('APP_URL')}}/page/obmen">Обмен</a></li>
                        <li><a href="https://novaposhta.ua/ru" target="_blank" rel="nofollow">Отследить посылку</a></li>
                    </ul>
                </div>
            </div>
            @if($user_logged)
                <div class="col-md-2 col-sm-2 footer-vertical-align side-border">
                    <p class="footer__title">Кабинет</p>
                    <ul class="footer__links">
                        <li><a href="{{env('APP_URL')}}/user">Личные данные</a></li>
                        <li><a href="{{env('APP_URL')}}/user/mailing">Настройка рассылок</a></li>
                        <li><a href="{{env('APP_URL')}}/user/history">Мои заказы</a></li>
                        <li><a href="{{env('APP_URL')}}/user/wishlist">Мои товары</a></li>
                    </ul>
                </div>
            @endif

            <div class="col-md-2 col-sm-2 footer-vertical-align side-border">
                <p class="footer__title">Информация</p>
                <ul class="footer__links">
                    <li><a href="{{env('APP_URL')}}/page/o-magazine">О магазине</a></li>
                    <li><a href="{{env('APP_URL')}}/news">Публикации</a></li>
                    <li><a href="{{env('APP_URL')}}/page/contact">Контакты</a></li>
                </ul>
            </div>
        </div>
        <div class="row footer-row">
            <div class="col-md-5 col-sm-4">
                <ul class="footer__social">
                    <li><img src="/images/icons/9.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/10.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/11.png" alt="" srcset=""></li>
                    <li><img src="/images/icons/12.png" alt="" srcset=""></li>
                </ul>
            </div>
            <div class="col-md-offset-2 col-md-3 col-sm-offset-1 col-sm-4">
                <ul class="footer-delivery-list footer-list">
                    <li><img src="/images/icons/13.png" alt=""></li>
                    <li> Бесплатная доставка:</li>
                    <li><img src="/images/icons/np.png" alt=""></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3">
                <ul class="footer-pay-list">
                    <li>
                        <img src="/images/icons/mc.png" alt="">
                    </li>
                    <li>
                        <img src="/images/icons/visa.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>



{{--<footer class="footer">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4 col-sm-5">--}}
                {{--<p class="footer__title">Контакты</p>--}}
                {{--<div class="footer__contact">--}}
                    {{--<div class="footer__contact-phones">--}}
                        {{--<img src="/images/icons/2.png" alt="">--}}
                        {{--<ul class="footer__contact-list footer-list">--}}
                            {{--<li>(050) 162 08 88</li>--}}
                            {{--<li>(067) 800 10 77</li>--}}
                            {{--<li>(044) 333 71 09</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<ul class="footer__contact-mail footer-list">--}}
                        {{--<li><img src="/images/icons/7.png" alt="">mailmdk@gmail.com</li>--}}
                        {{--<li><img src="/images/icons/8.png" alt=""><a href="">Напишите нам</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<ul class="footer__contact-address footer-list">--}}
                    {{--<li><img src="/images/icons/6.png"></li>--}}
                    {{--<li>ТЦ «Дафи», 2 эт., ул. Героев Труда, 9</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-md-offset-1 col-md-3 col-sm-3">--}}
                {{--<p class="footer__title">Помощь</p>--}}
                {{--<ul class="footer__links">--}}
                    {{--<li><a href="{{env('APP_URL')}}/page/o-magazine">О магазине</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/page/dostavka-i-oplata">Доставка и оплата</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/page/obmen">Обмен</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/page/hochu-videt-v-magazine">Хочу видеть в магазине</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/page/predlozheniya-ot-privatbanka">Рассрочка</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/news">Публикации</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--@if($user_logged)--}}
            {{--<div class="col-md-2 col-sm-2">--}}
                {{--<p class="footer__title">Мой кабинет</p>--}}
                {{--<ul class="footer__links">--}}
                    {{--<li><a href="{{env('APP_URL')}}/user">Личный Кабинет</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/user/history">История заказов</a></li>--}}
                    {{--<li><a href="{{env('APP_URL')}}/user/wishlist">Избранное</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--<div class="col-md-2 col-sm-2">--}}
                {{--<p class="footer__title">Партнерам</p>--}}
                {{--<ul class="footer__links">--}}
                    {{--<li><a href="javascript:void(0);">Оптовый сайт</a></li>--}}
                    {{--<li><a href="javascript:void(0);">Дропшиппинг</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row footer-row">--}}
            {{--<div class="col-md-5 col-sm-4">--}}
                {{--<ul class="footer__social">--}}
                    {{--<li><img src="/images/icons/9.png" alt="" srcset=""></li>--}}
                    {{--<li><img src="/images/icons/10.png" alt="" srcset=""></li>--}}
                    {{--<li><img src="/images/icons/11.png" alt="" srcset=""></li>--}}
                    {{--<li><img src="/images/icons/12.png" alt="" srcset=""></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-md-offset-2 col-md-3 col-sm-offset-1 col-sm-4">--}}
                {{--<ul class="footer-delivery-list footer-list">--}}
                    {{--<li><img src="/images/icons/13.png" alt=""></li>--}}
                    {{--<li> Бесплатная доставка:</li>--}}
                    {{--<li><img src="/images/icons/np.png" alt=""></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-3">--}}
                {{--<ul class="footer-pay-list">--}}
                    {{--<li>--}}
                        {{--<img src="/images/icons/mc.png" alt="">--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<img src="/images/icons/visa.png" alt="">--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}

{{--@if(!empty($settings->main_phone_2))--}}
{{--<li><a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $settings->main_phone_2) }}">{{ $settings->main_phone_2 }}</a></li>--}}
{{--@endif--}}
{{--@if(!empty($settings->other_phones))--}}
    {{--@foreach($settings->other_phones as $phone)--}}
        {{--<li><a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}">{{ $phone }}</a></li>--}}
    {{--@endforeach--}}
{{--@endif--}}
