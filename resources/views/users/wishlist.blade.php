@extends('public.layouts.main')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 hidden-xs">
                <ul class="breadcrambs">
                    {!! Breadcrumbs::render('history') !!}
                </ul>
            </div>
            <div class="col-sm-12 col-xs-12">
                <p class="main-title">Мои товары</p>
            </div>
            <div class="col-sm-3 col-xs-12">
                <div class="cabinet__aside">
                    <p class="cabinet__aside-title">МОЙ ЛИЧНЫЙ КАБИНЕТ</p>
                    <ul class="hidden-xs">
                        <li><a href="{{env('APP_URL')}}/user">Личные данные</a></li>
                        <li><a href="{{env('APP_URL')}}/user/mailing">настройка рассылок</a></li>
                        <li><a href="{{env('APP_URL')}}/user/history">Мои заказы</a></li>
                        <li><a href="javascript:void(0);" class="active">мои товары</a></li>
                        <li><a href="{{env('APP_URL')}}/logout">Выйти</a></li>
                    </ul>
                    <div class="visible-xs-block">
                        <select class="chosen-select" name="" id="">
                            <option value="{{env('APP_URL')}}/user">Личные данные</option>
                            <option value="{{env('APP_URL')}}/user/mailing">настройка рассылок</option>
                            <option value="{{env('APP_URL')}}/user/history">Мои заказы</option>
                            <option value="" selected="selected">мои товары</option>
                            <option value="{{env('APP_URL')}}/logout">Выйти</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12">
                <div class="row">
                    @forelse($products as $key => $product)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <p class="product-card-delete wishlist-add active" data-prod-id="{{ $product->product_id}}">Очистить</p>
                            @include('public.layouts.product', ['product' => $product->product])
                        </div>
                    @empty
                        <div class="col-xs-12">
                            <span>Нет избранных товаров...</span>
                        </div>
                    @endforelse
                    {{--<div class="col-md-4 col-sm-6 col-xs-6">--}}
                        {{--<p class="product-card-delete">Очистить</p>--}}
                        {{--<div class="item slider__item product-card my-product-item">--}}
                            {{--<div class="product-card__img-slider-item">--}}
                                {{--<img src="../../images/sample-1.jpg" alt="">--}}
                                {{--<div class="slider__item-img-label new">--}}
                                    {{--new--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="product-card__info underline">--}}
                                {{--<div>--}}
                                    {{--<p>Цвет:</p>--}}
                                    {{--<div class="product-card__colors-item black"></div>--}}
                                {{--</div>--}}
                                {{--<div class="product__select-size-wrp">--}}
                                    {{--<p>Размер:</p>--}}
                                    {{--<div class="size-label">M</div>--}}
                                    {{--<p>Medium size</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<p class="product-card__title hidden-xs">Куртка женская NH-9088</p>--}}
                            {{--<p class="product-card__price hidden-xs">12 899 грн</p>--}}
                            {{--<div class="product-card__btn my-product-btn">--}}
                                {{--<a href=""><p class="product-card__btn-more">Подробнее</p></a>--}}
                                {{--<button class="product-card__btn-buy">Купить в 1 клик</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection