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
                    <p class="main-title">Личные данные</p>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="cabinet__aside">
                        <p class="cabinet__aside-title">МОЙ ЛИЧНЫЙ КАБИНЕТ</p>
                        <ul class="hidden-xs">
                            <li><a href="javascript:void(0);" class="active">Личные данные</a></li>
                            <li><a href="{{env('APP_URL')}}/user/mailing">настройка рассылок</a></li>
                            <li><a href="{{env('APP_URL')}}/user/history">Мои заказы</a></li>
                            <li><a href="{{env('APP_URL')}}/user/wishlist">мои товары</a></li>
                            <li><a href="{{env('APP_URL')}}/logout">Выйти</a></li>
                        </ul>
                        <div class="visible-xs-block">
                            <select class="chosen-select">
                                <option value="" selected="selected">Личные данные</option>
                                <option value="{{env('APP_URL')}}/user/mailing">настройка рассылок</option>
                                <option value="{{env('APP_URL')}}/user/history">Мои заказы</option>
                                <option value="{{env('APP_URL')}}/user/wishlist">мои товары</option>
                                <option value="{{env('APP_URL')}}/logout">Выйти</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-12">
                    <form action="" class="private-info-form">
                        <div class="cabinet__input-wrp">
                            <p class="label">Дисконтная карта</p>
                            <p class="card-number">0001 827</p>
                        </div>
                        <div class="cabinet__input-wrp">
                            <p class="label">Бонусные баллы</p>
                            <p class="card-points">1 200</p>
                        </div>
                        <div class="cabinet__card-features">
                            <button class="cabinet__card-refresh" type="button">Обновить</button>
                            <button class="cabinet__card-info" type="button">Как списать баллы</button>
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="fio" class="label">ФИО</label>
                            <input type="text" name="fio" id="fio" value="{{ $user->first_name }}">
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="email" class="label">E-mail</label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Дата рождения</label>
                            <div class="cabinet__birthday">
                                @if(is_object($user->user_data))
                                    <input type="text" name="Y" value="{{ date('Y', strtotime($user->user_data->user_birth)) }}">
                                    <input type="text" name="m" value="{{ date('m', strtotime($user->user_data->user_birth)) }}">
                                    <input type="text" name="d" value="{{ date('d', strtotime($user->user_data->user_birth)) }}">
                                @else
                                    <input type="text" name="Y" placeholder="год">
                                    <input type="text" name="m" placeholder="месяц">
                                    <input type="text" name="d" placeholder="день">
                                @endif
                            </div>
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Ник</label>
                            <input type="text" name="login" value="{{ is_object($user->user_data) ? $user->user_data->login : '' }}">
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Телефон</label>
                            <div class="cabinet__numbers-wrp">
                                <div class="cabinet-numbers">
                                    @if(is_object($user->user_data) && is_array($user->user_data->phones()))
                                        @foreach($user->user_data->phones() as $phone)
                                            <div class="cabinet-number">
                                                <input type="hidden" name="phones[]" value="{{ $phone }}">
                                                <p>{{ $phone }}</p>
                                                <span class="cabinet-number-bell"></span>
                                                <span class="cabinet-number-close"></span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <p class="cabinet__add-number">Добавить еще один</p>
                            </div>
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Адрес доставки</label>
                            <div class="cabinet__address-wrp">
                                <div class="cabinet-address">
                                    @if(is_object($user->user_data) && is_array($user->user_data->addresses()))
                                        @foreach($user->user_data->addresses() as $address)
                                            <div class="cabinet-address">
                                                <input type="hidden" name="addresses[]" value="{{ $address }}">
                                                <p>{{ $address }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="cabinet__info">Нет адреса</div>
                                    @endif
                                </div>
                                <p class="cabinet__add-address">Добавить адрес</p>
                            </div>
                        </div>
                        <div class="cabinet__btn-wrp">
                            <button type="submit" class="cabinet__btn">Сохранить изменения</button>
                        </div>
                    </form>

                    <form action="" class="password-form">
                        <p class="password-form-title">Смена пароля для логина</p>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Старый пароль</label>
                            <input type="password" name="old_pass">
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Новый пароль</label>
                            <input type="password" name="pass">
                        </div>
                        <div class="cabinet__input-wrp">
                            <label for="" class="label">Новый пароль (еще раз)</label>
                            <input type="password" name="repass">
                        </div>
                        <div class="cabinet__btn-wrp">
                            <button type="submit" class="cabinet__btn">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    {{--<main>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="aside-filter-menu-item">--}}
                                {{--<div class="aside-filter-menu-item-title aside-block">--}}
                                    {{--<a href="{{env('APP_URL')}}/user/history"><p>История покупок</p></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="aside-filter-menu-item">--}}
                                {{--<div class="aside-filter-menu-item-title aside-block">--}}
                                    {{--<a href="{{env('APP_URL')}}/user/wishlist"><p>Список желаний</p></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="aside-filter-menu-item">--}}
                                {{--<div class="aside-filter-menu-item-title aside-block">--}}
                                    {{--<a href="javascript:void(0);" class="active-aside-link"><p>Личный кабинет</p></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-9 col-sm-8 col-xs-12 profile-grid-container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="visible-xs-block col-xs-12">--}}
                            {{--<div>--}}
                                {{--<select name="site-section-select" id="redirect_select" class="chosen-select site-section-select">--}}
                                    {{--<option value="{{env('APP_URL')}}/user/history">История покупок</option>--}}
                                    {{--<option value="{{env('APP_URL')}}/user/wishlist">Список желаний</option>--}}
                                    {{--<option selected="selected" value="">Личный кабинет</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-12 col-xs-12 margin">--}}
                            {{--<h5 class="title">Мои данные--}}
                                {{--<a href="" class="edit-profile">--}}
                                    {{--<img src="/images/homepage-icons/edit icon.svg" alt="">--}}
                                {{--</a>--}}
                            {{--</h5>--}}
                            {{--<div class="profile-data-wrp">--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Имя Фамилия</h5>--}}
                                    {{--<span class="user-name">{{ $user->first_name }} {{ $user->last_name }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Телефон</h5>--}}
                                    {{--<span>{{ is_object($user->user_data) ? $user->user_data->phone : '' }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Почта</h5>--}}
                                    {{--<span>{{ $user->email }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Дата Рождения</h5>--}}
                                    {{--<input type="text" value="{{ is_object($user->user_data) ? $user->user_data->user_birth : '' }}" class="birthday-input" disabled placeholder="__/__/____">--}}
                                    {{--<p>Мы дарим подарки к Вашему празднику</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<form  class="profile-edit-data-wrp unactive">--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Имя Фамилия</h5>--}}
                                    {{--<input type="text" name="fio" value="{{ $user->first_name }} {{ $user->last_name }}" class="profile-edit-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Телефон</h5>--}}
                                    {{--<input type="text" name="phone" value="{{ is_object($user->user_data) ? $user->user_data->phone : '' }}" id="phone" class="profile-edit-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Почта</h5>--}}
                                    {{--<input type="text" name="email" value="{{ $user->email }}" class="profile-edit-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Дата Рождения</h5>--}}
                                    {{--<input type="text" name="user-birth" class="birthday-input" placeholder="__/__/____">--}}
                                    {{--<p>Мы дарим подарки к Вашему празднику</p>--}}
                                {{--</div>--}}
                            {{--</form>--}}

                            {{--<form>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Пароль</h5>--}}
                                    {{--<a href="" class="user-password">--}}
                                        {{--<p>Сменить пароль</p>--}}
                                    {{--</a>--}}
                                    {{--<div class="password-edit unactive">--}}
                                        {{--<input type="password" name="pass" class="profile-edit-data-input" placeholder="Введите пароль">--}}
                                        {{--<input type="password" name="repass" class="profile-edit-data-input" placeholder="Повторите пароль">--}}
                                        {{--<input type="button" value="Изменить" class="password-btn">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}

                            {{--<h5 class="title">Управление моими подписками</h5>--}}
                            {{--<div class="profile-subscr-wrp profile-margin">--}}
                                {{--<div class="profile-subscr-item">--}}
                                    {{--<input type="radio" name="subscr-type" value="1" id="subscr-email" class="radio"{{ is_object($user->user_data) ? ($user->user_data->subscribe == 1 ? ' checked' : '') : '' }}>--}}
                                    {{--<span class="radio-custom"></span>--}}
                                    {{--<label for="subscr-email">по email</label>--}}
                                {{--</div>--}}
                                {{--<div class="profile-subscr-item">--}}
                                    {{--<input type="radio" name="subscr-type" value="2" id="subscr-sms" class="radio"{{ is_object($user->user_data) ? ($user->user_data->subscribe == 2 ? ' checked' : '') : '' }}>--}}
                                    {{--<span class="radio-custom"></span>--}}
                                    {{--<label for="subscr-sms">по sms</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-12 col-xs-12 margin">--}}
                            {{--<h5 class="title">Дисконтная программа</h5>--}}
                            {{--<div class="profile-discount-wrp profile-margin">--}}
                                {{--@if(key($user->sales) > $user->ordersTotal())--}}
                                    {{--<p>У Вас нет скидки</p>--}}
                                    {{--<span>Общая сумма Ваших покупок меньше {{ key($user->sales) }} грн.<br/>--}}
                                    {{--При покупке на общую сумму свыше {{ key($user->sales) }} грн сумма скидки станет {{ $user->sales[key($user->sales)] }}%<br/>--}}
                                    {{--Узнать больше о <a href="/page/bonusnyya-programma" class="default-link-hover">Бонусной программе</a></span>--}}
                                {{--@else--}}
                                    {{--<p>Ваша скидка составляет {{ $user->sale() }}%</p>--}}
                                    {{--<span>Общая сумма Ваших покупок {{ $user->ordersTotal() }} грн.<br/>--}}
                                    {{--@if(!empty($user->nextSale()))--}}
                                        {{--@php--}}
                                            {{--$next_sale = $user->nextSale();--}}
                                        {{--@endphp--}}
                                        {{--При покупке на общую сумму свыше {{ $next_sale[0] }} грн сумма скидки станет {{ $next_sale[1] }}%<br/>--}}
                                    {{--@endif--}}
                                    {{--Узнать больше о <a href="{{env('APP_URL')}}/page/bonusnyya-programma" class="default-link-hover">Бонусной программе</a></span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-12 col-xs-12 margin">--}}
                            {{--<h5 class="title">Адрес доставки</h5>--}}
                            {{--<form class="profile-address-wrp">--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Город</h5>--}}
                                    {{--<input type="text" name="city" value="{{ isset($address->city) ? $address->city : '' }}" class="profile-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Индекс</h5>--}}
                                    {{--<input type="text" name="post_code" value="{{ isset($address->post_code) ? $address->post_code : '' }}" class="profile-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Улица</h5>--}}
                                    {{--<input type="text" name="street" value="{{ isset($address->street) ? $address->street : '' }}" class="profile-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Дом</h5>--}}
                                    {{--<input type="text" name="house" value="{{ isset($address->house) ? $address->house : '' }}" class="profile-data-input">--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Квартира</h5>--}}
                                    {{--<input type="text" name="flat" value="{{ isset($address->flat) ? $address->flat : '' }}" class="profile-data-input">--}}
                                {{--</div>--}}
                                {{--<br>--}}
                                {{--<h5 class="title">Отделение Новой Почты</h5>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Область</h5>--}}
                                    {{--<select name="npregion" id="region" onchange="newpostUpdate('region', jQuery(this).val());">--}}
                                        {{--@foreach($regions as $region)--}}
                                            {{--<option value="{{ $region->id }}"{{ isset($address->npregion) && $address->npregion == $region->id ? ' selected' : '' }}>{{ $region->name_ru }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Населённый пункт</h5>--}}
                                    {{--<select name="npcity" id="checkout-step__city" onchange="newpostUpdate('city', jQuery(this).val());" disabled="disabled">--}}
                                        {{--@forelse($cities as $city)--}}
                                            {{--<option value="{{ $city->id }}"{{ isset($address->npcity) && $address->npcity == $city->id ? ' selected' : '' }}>{{ $city->name_ru }}</option>--}}
                                        {{--@empty--}}
                                            {{--<option value="">Выберите область</option>--}}
                                        {{--@endforelse--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<h5 class="data-name">Отделение</h5>--}}
                                    {{--<select name="npdepartment" id="checkout-step__warehouse" disabled="disabled">--}}
                                        {{--@forelse($departments as $department)--}}
                                            {{--<option value="{{ $department->id }}"{{ isset($address->npdepartment) && $address->npdepartment == $department->id ? ' selected' : '' }}>{{ $department->address_ru }}</option>--}}
                                        {{--@empty--}}
                                            {{--<option value="">Выберите населённый пункт</option>--}}
                                        {{--@endforelse--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="profile-data-item">--}}
                                    {{--<button type="button" class="profile-address-btn">Изменить</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</main>--}}
@endsection