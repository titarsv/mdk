@extends('public.layouts.main')

@section('meta')
    <title>Личные данные</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
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
                    <p class="main-title">Настройки рассылок</p>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="cabinet__aside">
                        <p class="cabinet__aside-title">МОЙ ЛИЧНЫЙ КАБИНЕТ</p>
                        <ul class="hidden-xs">
                            <li><a href="{{env('APP_URL')}}/user">Личные данные</a></li>
                            <li><a href="javascript:void(0);" class="active">настройка рассылок</a></li>
                            <li><a href="{{env('APP_URL')}}/user/history">Мои заказы</a></li>
                            <li><a href="{{env('APP_URL')}}/user/wishlist">мои товары</a></li>
                            <li><a href="{{env('APP_URL')}}/logout">Выйти</a></li>
                        </ul>
                        <div class="visible-xs-block">
                            <select class="chosen-select" name="" id="">
                                <option value="{{env('APP_URL')}}/user">Личные данные</option>
                                <option value="" selected="selected">настройка рассылок</option>
                                <option value="{{env('APP_URL')}}/user/history">Мои заказы</option>
                                <option value="{{env('APP_URL')}}/user/wishlist">мои товары</option>
                                <option value="{{env('APP_URL')}}/logout">Выйти</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-12">
                    <form action="">
                        <div class="cabinet__input-wrp">
                            <p class="label">Выберите тип рассылки</p>
                            <div class="mailing-inputs">
                                <input type="radio" name="mailing-type" id="male">
                                <label for="male">Мужская</label>
                                <input type="radio" name="mailing-type" id="female">
                                <label for="female">Женская</label>
                                <input type="radio" name="mailing-type" id="general">
                                <label for="general">Общая</label>
                            </div>
                        </div>
                        <div class="cabinet__input-wrp mailing-phone">
                            <p class="label">SMS на телефон</p>
                            <div class="cabinet__numbers-wrp">
                                <div class="cabinet-numbers">
                                    @if(is_object($user->user_data) && is_array($user->user_data->phones()))
                                        @foreach($user->user_data->phones() as $phone)
                                            <div class="cabinet-number">
                                                <input type="hidden" name="phones[]" value="{{ $phone }}">
                                                <p>{{ $phone }}</p>
                                                <span class="cabinet-number-bell"></span><p>Подключить рассылку</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <p class="cabinet__add-number">Добавить еще один</p>
                            </div>
                        </div>
                        <div class="cabinet__input-wrp mailing-phone">
                            <p class="label">E-mail</p>
                            <div class="cabinet__numbers-wrp">
                                <div class="cabinet-numbers">
                                    <div class="cabinet-number">
                                        <p>ivanovivanivanych@gmail.com</p>
                                        <span class="cabinet-number-close"></span><p>Отменить рассылку</p>
                                    </div>
                                </div>
                                <p class="cabinet__add-email">Добавить адрес</p>
                            </div>
                        </div>
                        <div class="cabinet__btn-wrp">
                            <button type="submit" class="cabinet__btn">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection