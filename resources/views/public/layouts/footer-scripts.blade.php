<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
            {"src" : "{{ mix("js/app.js") }}", "async" : false}
        ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->

<div class="mfp-hide">
    <div id="logIn-popup" class="view-popup">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12">
                    <div class="logIn-popup__container">
                        <div class="logIn-popup__container-registr">
                            <p class="logIn-popup__container-title">Регистрация</p>
                            <ul>
                                <li>Создавая учетную запись Вы сможете:</li>
                                <li><img src="/images/icons/eye.png" alt=""> Отслеживать статус заказа</li>
                                <li><img src="/images/icons/history.png" alt=""> Посмотреть историю покупок</li>
                                <li><img src="/images/icons/new.png" alt=""> Отслеживать новинки</li>
                            </ul>
                            <a href="{{env('APP_URL')}}/registration" class="regist-btn popup-btn"  data-mfp-src="#registration-popup">Зарегистрироваться</a>
                            <div class="logIn-popup__container-social">
                                <p>или с помощью</p>
                                <a href="{{env('APP_URL')}}/login/facebook"><img src="/images/icons/fb.png" alt="facebook"></a>
                                <a href="{{env('APP_URL')}}/login/google"><img src="/images/icons/gg.png" alt="google"></a>
                            </div>
                        </div>
                        <div class="logIn-popup__container-enter">
                            <p class="logIn-popup__container-title">Вход</p>
                            <form action="/login" class="logIn-form" method="post">
                                {!! csrf_field() !!}
                                <input type="text" name="email" placeholder="Ваш email">
                                <input type="password" name="password" placeholder="Ваш пароль">
                                <button type="submit">Вход</button>
                            </form>
                            <div class="logIn-popup__container-social">
                                <p>или с помощью</p>
                                <a href="{{env('APP_URL')}}/login/facebook"><img src="/images/icons/fb.png" alt="facebook"></a>
                                <a href="{{env('APP_URL')}}/login/google"><img src="/images/icons/gg.png" alt="google"></a>
                            </div>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mfp-hide">
    <div id="registration-popup" class="view-popup">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12">
                    <div class="registration-popup__container">
                        <p class="registration-popup__container-title">Регистрация</p>
                        <p class="registration-popup__container-subtitle">Если Вы уже зарегистрированы, перейдите на страницу <a href="">Вход в систему →</a> </p>
                        <ul>
                            <li><img src="/images/icons/eye.png" alt=""> Отслеживать статус заказа</li>
                            <li><img src="/images/icons/history.png" alt=""> Посмотреть историю покупок</li>
                            <li><img src="/images/icons/new.png" alt=""> Отслеживать новинки</li>
                        </ul>
                        <form action="" class="registration-popup__container-form">
                            <input placeholder="ФИО" type="text" name="name" data-title="Имя"><input type="tel" name="phone" placeholder="Введите номер телефона" data-title="Телефон" data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер"><input placeholder="E-mail" type="email" name="email" data-title="Email" data-validate-required="Обязательное поле" data-validate-email="Неправильный email"><input type="password" placeholder="Пароль"><input type="password" placeholder="Повторите пароль">
                            <button type="submit">Зарегистрироваться</button>
                        </form>
                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mfp-hide">
        <div id="oneClick" class="view-popup">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="oneClick__container">
                            <p class="oneClick__container-title">Оставьте свои контакты<br>
                                и наш менеджер свяжется с Вами<br>
                                для оформления заказа</p>
                            <form action="" class="oneClick__container-form">
                                <input placeholder="Ваше имя" type="text" name="name" data-title="Имя">
                                <input type="tel" name="phone" placeholder="Ваш телефон" data-title="Телефон" data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер">
                                <button type="submit">Отправить</button>
                            </form>
                            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
