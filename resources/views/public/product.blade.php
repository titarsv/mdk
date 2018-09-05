@extends('public.layouts.main', ['root_category' => $root_category])
@section('meta')
    <title>
        @if(empty($product->meta_title))
            {!! $product->name !!}}
        @else
            {!! $product->meta_title !!}
        @endif
            | Мир дубленок и кожи
    </title>

    @if(empty($product->meta_description))
        <meta name="description" content="Купить {!! $product->name !!}}">
        <meta name=description content="Купить {!! $product->name !!}}"/>
    @else
        <meta name="description" content="{!! $product->meta_description !!}">
        <meta name=description content="{!! $product->meta_description !!}"/>
    @endif

    <meta property=og:site_name content="Мир дубленок и кожи">
    <meta property=og:title content="
        @if(empty($product->meta_title))
        {!! $product->name !!}}
            @else
        {!! $product->meta_title !!}
        @endif
            | Мир дубленок и кожи
    "/>
    <meta property=og:url content="https://mdk.ua/">

    <meta name="keywords" content="{!! $product->meta_keywords !!}">
    @if(!empty($product->robots))
        <meta name="robots" content="{!! $product->robots !!}">
    @endif
@endsection

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    {!! Breadcrumbs::render('product', $product, $product->categories) !!}
                </div>
                <div class="col-lg-7 col-md-6 col-sm-5 col-xs-12">
                    <div class="product__info-sale visible-xs-block">-20% sale</div>
                    <!-- <div class="product__info-new visible-xs-block">new</div> -->
                    <div class="slick-slider product-slider" data-slick='{"slidesToShow": 2, "dots": false, "arrows": true, "responsive":[{"breakpoint": 991,"settings":{"slidesToShow": 2}}, {"breakpoint":480,"settings":{"slidesToShow": 1}}]}'>
                        @forelse($gallery as $image)
                            @if(is_object($image))
                                <div>
                                    <div class="product-slider__item">
                                        <img src="{{ $image->url('product') }}" alt="{{ $product->name }}">
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>
                                <div class="product-slider__item">
                                    @if(empty($product->image))
                                        <img src="/uploads/no_image.jpg" alt="">
                                    @else
                                        <img src="{{ $product->image->url('product') }}" alt="">
                                    @endif
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-xs-12 visible-xs-block">
                    {!! Breadcrumbs::render('product', $product, $product->categories) !!}
                </div>
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="product__info-wrp">
                        <div class="product__info-name-wrp hidden-xs">
                            @if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))
                                <div class="product__info-new">
                                    {{ $labels[$product->label] }}
                                </div>
                            @elseif(!empty($product->old_price))
                                <div class="product__info-sale">
                                    -{{ ceil((($product->old_price - $product->price)/ $product->old_price) * 100) }}% sale
                                </div>
                            @endif
                            <p class="product__info-name">{{ $product->name }}</p>
                            <p class="product__info-article">Артикул товара: {{ $product->articul }}</p>
                        </div>
                        <div class="product__info-price-wrp">
                            @if(!empty($product->old_price))
                            <p class="product__info-price-old">{{ number_format($product->old_price, 2, '.', ' ') }} грн</p>
                            @endif
                            <p class="product__info-price">{{ number_format($product->price, 2, '.', ' ') }} грн</p>
                            @if(!empty($product->old_price))
                            <p class="product__info-price-economy">
                                <img src="/images/icons/econom.png" alt="">
                                <span>Вы экономите {{ number_format($product->old_price - $product->price, 2, '.', ' ') }} грн</span>
                            </p>
                            @endif
                        </div>
                    </div>
                    <form action="" class="product__form">
                        <div class="product__form-container">
                            <p class="product__form-title">Выберите цвет:</p>
                        </div>
                        <div class="product__form-container hidden-xs">
                            @foreach($colors as $key => $item)
                                <label for="prod-color-{{ $key }}" class="product-card__colors-item" style="background-color: {{ $item['color']->value }}" onclick="location='{{env('APP_URL')}}/product/{{ $item['slug'] }}'"></label>
                                <input type="radio" name="prod-color" value="" id="prod-color-{{ $key }}" class="radio"{{ $item['slug'] === $product->url_alias ? ' checked' : '' }}>
                            @endforeach
                        </div>
                        <div class="product__form-container visible-xs-block">
                            <div class="color-label"></div>
                            <select class="product__select-color chosen-select" name="" id="">
                                @foreach($colors as $key => $item)
                                    <option value="{{env('APP_URL')}}/product/{{ $item['slug'] }}" class="select-color-item" {{ $item['slug'] === $product->url_alias ? ' selected="selected"' : '' }}> - {{ $item['color']->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach($variations as $attr_key => $variation)
                            <div class="product__form-container size">
                                <p class="product__form-title">Выберите {{ mb_strtolower($variation['name']) }}:</p>
                                <div class="product__select-size-wrp">
                                    <div class="size-label">{{ $variation['values'][key($variation['values'])]['name'] }}</div>
                                    <select class="product__select-size chosen-select variation-select" name="" id="">
                                        @foreach($variation['values'] as $key => $val)
                                            <option value="{{ $key }}" data-value="{{ $val['name'] }}" {{ $val['stock'] == 0 ? ' disabled="disabled"' : '' }}>{{ $val['name'] }}</option>
                                        @endforeach
                                        {{--<option value="xxs">Small size (39)</option>--}}
                                        {{--<option value="xs">Small size (40)</option>--}}
                                        {{--<option value="s">Small size (42)</option>--}}
                                        {{--<option value="m" selected="selected">Medium size (44-46)</option>--}}
                                        {{--<option value="l">Large size (48-50)</option>--}}
                                        {{--<option value="xl">Large size (52)</option>--}}
                                        {{--<option value="xxl">Large size (54)</option>--}}
                                        {{--<option value="xxl">Large size (56)</option>--}}
                                        {{--<option value="xxxl">Large size (58)</option>--}}
                                    </select>
                                </div>
                            </div>
                            @if($variation['name'] == 'Размер')
                                <a class="product__size-table-link popup-btn" data-mfp-src="#sizeTable" href="">Таблица размеров</a>
                            @endif
                        @endforeach
                        @foreach($variations_prices as $variation => $val)
                            <input class="hidden" type="radio" id="var_{{ $variation }}" name="variation" value="{{ $val['id'] }}" data-price="{{ $val['price'] }}">
                        @endforeach
                        <button type="button" class="btn_buy" data-prod-id="{{ $product->id}}">Купить</button>
                        <a href="javascript:void(0);" class="product__one-click-btn popup-btn" data-mfp-src="#oneClick">
                            <span>Купить в 1 клик</span>
                        </a>
                        <a href="javascript:void(0);" class="product__part-pay-btn popup-btn" data-mfp-src="#partPay">
                            <span>Купить частичной оплатой</span>
                        </a>
                        <a href="javascript:void(0);" class="product__wishlist-btn wishlist-add" data-prod-id="{{ $product->id}}">
                            <span>Добавить в избранное</span>
                        </a>
                        {{--<a href="" class="product__full-descr-btn">--}}
                            {{--<span>Полное описание товара</span>--}}
                        {{--</a>--}}
                    </form>
                    <div class="product__description-wrp">
                        <p class="main-title">Полное описание:</p>

                        <ul class="product__description-tabs nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#characteristics">Характеристики</a></li>
                            <li><a data-toggle="tab" href="#delivery">Доставка</a></li>
                            <li><a data-toggle="tab" href="#garanty">Гарантия</a></li>
                            <li><a data-toggle="tab" href="#pay">Оплата</a></li>
                            <li><a data-toggle="tab" href="#availability">Наличие</a></li>
                        </ul>
                        <div class="product__description-tabs-content tab-content">
                            <div id="characteristics" class="tab-pane fade in active">
                                @foreach($product_attributes as $name => $values)
                                    <p class="product__description-color">
                                        <span class="product__description-name">{{ $name }}:</span>
                                        @foreach($values as $i => $value){{ $i ? ', '.$value['name'] : $value['name'] }}@endforeach
                                    </p>
                                @endforeach
                                {{--<p class="product__description-color black"> <span class="product__description-name">Цвет:</span> черный</p>--}}
                                {{--<p><span class="product__description-name">Cезон:</span> осень</p>--}}
                                {{--<p class="product__description-material suede"><span class="product__description-name">Сырье:</span> jumbo/замш</p>--}}
                                {{--<p> <span class="product__description-name">Производитель:</span> Турция</p>--}}
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div id="delivery" class="tab-pane fade">
                                <p> Доставка</p>
                            </div>
                            <div id="garanty" class="tab-pane fade">
                                <p>Гарантия</p>
                            </div>
                            <div id="pay" class="tab-pane fade">
                                <p>Оплата</p>
                            </div>
                            <div id="availability" class="tab-pane fade">
                                <p>В наличии</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="visible-xs-inline-block col-xs-12">--}}
                    {{--<div class="product-card-text">--}}
                        {{--<h1 class="title">{{ $product->name }}</h1>--}}
                        {{--<p>Код товара: <span>{{ $product->articul }}</span></p>--}}
                        {{--@if(!empty($brand))--}}
                            {{--<a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">--}}
                                {{--<p>Бренд: <span>{{ $brand->name }}</span></p>--}}
                            {{--</a>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="homepage-product-card-price">--}}
                        {{--<p>{{ round($product->price, 2) }}<span> грн</span></p>--}}
                        {{--@if(!empty($product->old_price))--}}
                            {{--<span class="old-price">{{ round($product->old_price, 2) }}</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-5 col-sm-6 col-xs-12">--}}
                    {{--<div class="js-slider slick-slider product-img-slider" data-slick='{"slidesToShow": {{ !empty($gallery) && count($gallery)> 1 ? '2' : '1' }}, "lazyLoad": "ondemand", "vertical": true, "dots": false, "arrows": true, "verticalSwiping": true, "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 1, "vertical": false, "arrows": false, "dots": true, "verticalSwiping": false, "lazyLoad": "ondemand"}}]}'>--}}
                        {{--@forelse($gallery as $image)--}}
                            {{--@if(is_object($image))--}}
                                {{--<div class="product-photo">--}}
                                    {{--<img src="{{ $image->url('product') }}" alt="{{ $product->name }}">--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--@empty--}}
                            {{--<div class="product-photo">--}}
                                {{--@if(empty($product->image))--}}
                                    {{--<img src="/uploads/no_image.jpg" alt="">--}}
                                {{--@else--}}
                                    {{--<img src="{{ $product->image->url('product') }}" alt="">--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--@endforelse--}}
                    {{--</div>--}}
                    {{--<div class="back-link">--}}
                        {{--<a href="#" onclick="window.history.back();" class="default-link-hover">Назад к списку товаров</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-5 col-sm-6 col-xs-12">--}}
                    {{--<form action="" class="product-form">--}}
                        {{--<div class="product-card-text hidden-xs">--}}
                            {{--<h2 class="title">{{ $product->name }}</h2>--}}
                            {{--<p>Код товара: <span>{{ $product->articul }}</span></p>--}}
                            {{--@if($brand)--}}
                                {{--<a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">--}}
                                    {{--<p>Бренд: <span>{{ $brand->name }}</span></p>--}}
                                {{--</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--@if(count($colors) > 1)--}}
                            {{--<div class="prod-color-wrp">--}}
                                {{--@foreach($colors as $key => $item)--}}
                                    {{--<div>--}}
                                        {{--<label for="prod-color-{{ $key }}" class="prod-color" style="background-color: {{ $item['color']->value }}" onclick="location='{{env('APP_URL')}}/product/{{ $item['slug'] }}'"></label>--}}
                                        {{--<input type="radio" name="prod-color" value="" id="prod-color-{{ $key }}" class="radio"{{ $item['slug'] === $product->url_alias ? ' checked' : '' }}>--}}
                                        {{--<span class="radio-custom"></span>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--<div class="prod-price hidden-xs">--}}
                            {{--<p>Цена: <span class="product-price" data-price="{{ round($product->price, 2) }}">{{ round($product->price, 2) }}</span>грн</p>--}}
                            {{--@if(!empty($product->old_price))--}}
                                {{--<span class="old-price">{{ round($product->old_price, 2) }}</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--@foreach($variations as $attr_key => $variation)--}}
                            {{--<div class="prod-size-wrp">--}}
                                {{--@foreach($variation['values'] as $key => $val)--}}
                                    {{--<div class="prod-size-item">--}}
                                        {{--<input type="radio" name="variation-{{ $attr_key }}" value="{{ $key }}" id="prod-size-{{ $key }}" class="radio variation-radio" {{ $val['stock'] == 0 ? ' disabled="disabled"' : '' }}>--}}
                                        {{--<label for="prod-size-{{ $key }}" class="prod-size{{ $val['stock'] == 0 ? ' disabled' : '' }}">{{ $val['name'] }}</label>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                                {{--@if($variation['name'] == 'Размер')--}}
                                    {{--<a href="{{env('APP_URL')}}/page/sizes" class="size-link js-toggle" aria-label="Open Navigation" data-toggle=".size-table-popup">Таблица размеров</a>--}}

                                    {{--<div class="size-table size-table-popup hidden-xs">--}}
                                        {{--<div class="size-tabl-title">--}}
                                            {{--<h5>Таблица размеров</h5>--}}
                                            {{--<img src="/images/homepage-icons/close popup icon.svg" class="size-tabl-popup-close js-toggle" data-toggle=".size-table" alt="">--}}
                                        {{--</div>--}}
                                        {{--@php--}}
                                            {{--$categories = $product->categories;--}}
                                            {{--$table = 'womens';--}}
                                            {{--if(!empty($categories) && $categories->first()->get_root_category()->name == 'Для мужчин'){--}}
                                                {{--$table = 'mens';--}}
                                            {{--}--}}
                                        {{--@endphp--}}
                                        {{--@if($table == 'womens')--}}
                                            {{--<h6>Женская обувь</h6>--}}
                                            {{--<div class="size-tabl__table">--}}
                                                {{--<ul class="size-tabl__table-head">--}}
                                                    {{--<li class="size-tabl__table-cell">Длина стопы, см</li>--}}
                                                    {{--<li class="size-tabl__table-cell">Украина</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">21,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">35</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">22,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">36</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">23,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">37</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">24,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">38</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">25,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">39</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">26</li>--}}
                                                    {{--<li class="size-tabl__table-cell">40</li>--}}
                                                {{--</ul>--}}
                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">26,5</li>--}}
                                                    {{--<li class="size-tabl__table-cell">41</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--@else--}}
                                            {{--<h6>Мужская обувь</h6>--}}
                                            {{--<div class="size-tabl__table">--}}
                                                {{--<ul class="size-tabl__table-head">--}}
                                                    {{--<li class="size-tabl__table-cell">Длина стопы, см</li>--}}
                                                    {{--<li class="size-tabl__table-cell">Украина</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">25</li>--}}
                                                    {{--<li class="size-tabl__table-cell">39</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">26</li>--}}
                                                    {{--<li class="size-tabl__table-cell">40</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">27</li>--}}
                                                    {{--<li class="size-tabl__table-cell">41</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">28</li>--}}
                                                    {{--<li class="size-tabl__table-cell">42</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">29</li>--}}
                                                    {{--<li class="size-tabl__table-cell">43</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">30</li>--}}
                                                    {{--<li class="size-tabl__table-cell">44</li>--}}
                                                {{--</ul>--}}

                                                {{--<ul class="size-tabl__table-row">--}}
                                                    {{--<li class="size-tabl__table-cell">31</li>--}}
                                                    {{--<li class="size-tabl__table-cell">45</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        {{--@foreach($variations_prices as $variation => $val)--}}
                        {{--<input class="hidden" type="radio" id="var_{{ $variation }}" name="variation" value="{{ $val['id'] }}" data-price="{{ $val['price'] }}">--}}
                        {{--@endforeach--}}
                        {{--<div class="prod-btn">--}}
                            {{--<input type="button" value="КУПИТЬ" class="buy-btn btn_buy" data-prod-id="{{ $product->id}}">--}}
                            {{--<div class="append-btn wishlist-add{{ $product->in_wish() ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0}}">--}}
                                {{--<i class="product-card-like">&#xE801</i>--}}
                                {{--<i class="inactive-wishlist-icon fill-wish-heart">&#xE807</i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}

                    {{--<div class="prod-description hidden-xs">--}}
                        {{--{!! $product->description  !!}--}}
                    {{--</div>--}}
                    {{--<ul class="prod-characteristics">--}}
                        {{--@foreach($product_attributes as $name => $attr)--}}
                            {{--@if($name !== 'Бренд')--}}
                                {{--<li>--}}
                                    {{--{{ $name }}:--}}
                                    {{--<p>--}}
                                        {{--@foreach($attr as $val)--}}
                                            {{--{{ $val['name'] }};--}}
                                        {{--@endforeach--}}
                                    {{--</p>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--<div class="one-click-btn-wrp">--}}
                        {{--<a href="javascript:void(0);" class="one-click-btn js-toggle-click-btn"  data-toggle=".one-click-form">--}}
                            {{--<p>Купить в 1 клик</p>--}}
                        {{--</a>--}}
                        {{--<form action="" class="one-click-form unactive ajax_form"--}}
                              {{--data-error-title="Ошибка отправки!"--}}
                              {{--data-error-message="Попробуйте отправить заявку через некоторое время."--}}
                              {{--data-success-title="Спасибо за заявку!"--}}
                              {{--data-success-message="Наш менеджер свяжется с вами в ближайшее время.">--}}
                            {{--<input type="hidden" name="form" value="Быстрый заказ" data-title="Форма">--}}
                            {{--<input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">--}}
                            {{--<input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">--}}
                            {{--<input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">--}}
                            {{--<input type="text" name="name" class="one-click-form-input" placeholder="имя" data-title="Имя"><input type="text" name="phone" class="one-click-form-input" placeholder="тел." data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер" data-title="Телефон"><input type="submit" value="Отправить" class="send-btn one-click-form-btn">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<div class="prod-description visible-xs-block">--}}
                        {{--<p>--}}
                            {{--{!! $product->description  !!}--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<div class="product-accordion-wrp">--}}
                        {{--<div class="product-accordion-item">--}}
                            {{--<div class="aside-filter-menu-item-title">--}}
                                {{--<p>Доставка и возврат</p>--}}
                            {{--</div>--}}
                            {{--<div class="aside-filter-menu-item-btn-toggle filters-open">--}}
                                {{--<div></div>--}}
                                {{--<div></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="product-accordion-text unactive">--}}
                            {{--<ul class="tabs-menu product-accordion-tabs nav nav-tabs margin">--}}
                                {{--<li class="active"><a href="#deliv-ukr" data-toggle="tab">Украина</a></li>--}}
                                {{--<li><a href="#deliv-kh" data-toggle="tab">Харьков</a> </li>--}}
                                {{--<li><a href="#deliv-abroad" data-toggle="tab">За пределы Украины</a></li>--}}
                            {{--</ul>--}}
                            {{--<div class="tabs tab-content jScrollPane">--}}
                                {{--<div class="tab-pane product-tab active" id="deliv-ukr">--}}
                                    {{--<h5>Доставка по Украине</h5>--}}
                                    {{--<p>  Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.--}}
                                        {{--Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.--}}
                                        {{--Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.--}}
                                        {{--Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.--}}
                                        {{--Средняя стоимость доставки составляет от пятидесяти гривен.--}}
                                        {{--Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>--}}
                                {{--</div>--}}
                                {{--<div class="tab-pane product-tab" id="deliv-kh">--}}
                                    {{--<h5>Доставка по Харькову</h5>--}}
                                    {{--<p>Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.--}}
                                        {{--Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.--}}
                                        {{--Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.--}}
                                        {{--Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.--}}
                                        {{--Средняя стоимость доставки составляет от пятидесяти гривен.--}}
                                        {{--Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>--}}
                                {{--</div>--}}
                                {{--<div class="tab-pane product-tab" id="deliv-abroad">--}}
                                    {{--<h5>Доставка за пределы Украины</h5>--}}
                                    {{--<p>Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.--}}
                                        {{--Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.--}}
                                        {{--Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.--}}
                                        {{--Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.--}}
                                        {{--Средняя стоимость доставки составляет от пятидесяти гривен.--}}
                                        {{--Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="product-accordion-wrp">--}}
                        {{--<div class="product-accordion-item">--}}
                            {{--<div class="aside-filter-menu-item-title">--}}
                                {{--<p>Уход за обувью</p>--}}
                            {{--</div>--}}
                            {{--<div class="aside-filter-menu-item-btn-toggle filters-open">--}}
                                {{--<div></div>--}}
                                {{--<div></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="product-accordion-text unactive">--}}
                            {{--<p>Для такого типа обуви подходят следующие товары <a href="" class="default-link-hover">Средство 1</a>  <a href="" class="default-link-hover">Средство 2</a>, а также <a href="" class="default-link-hover">Средство 3</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="product-accordion-wrp">--}}
                        {{--<div class="product-accordion-item">--}}
                            {{--<div class="aside-filter-menu-item-title">--}}
                                {{--<p>Отзывы</p>--}}
                            {{--</div>--}}
                            {{--<div class="aside-filter-menu-item-btn-toggle filters-open">--}}
                                {{--<div></div>--}}
                                {{--<div></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="product-accordion-text unactive">--}}
                            {{--@if(!empty($user))--}}
                            {{--<form action="" class="write-review-container review-form">--}}
                                {{--<input type="hidden" name="product_id" value="{{ $product->id }}">--}}
                                {{--<input type="hidden" name="name" value="{{ $user->first_name  }}">--}}
                                {{--<input type="hidden" name="email" value="{{ $user->email }}">--}}
                                {{--<input type="hidden" name="grade" value="5">--}}
                                {{--<input type="text" name="review" placeholder="Расскажите другим об этой модели">--}}
                                {{--<button type="submit" class="write-review-btn buy-btn">Написать отзыв</button>--}}
                            {{--</form>--}}
                            {{--@else--}}
                            {{--<div class="write-review-container review-form">--}}
                                {{--<input type="text" name="review" placeholder="Расскажите другим об этой модели" disabled>--}}
                                {{--<a href="{{env('APP_URL')}}/login" class="write-review-btn buy-btn">Написать отзыв</a>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--@forelse($product->reviews as $review)--}}
                                {{--<div class="review-container">--}}
                                    {{--<div class="review stars">--}}
                                        {{--@for($i=0;$i<5;$i++)--}}
                                            {{--@if($i < $review->grade)--}}
                                                {{--<i class="stars">&#xE802</i>--}}
                                            {{--@else--}}
                                                {{--<i class="stars">&#xE80B</i>--}}
                                            {{--@endif--}}
                                        {{--@endfor--}}
                                    {{--</div>--}}
                                    {{--<p class="review-text">--}}
                                        {{--{!! $review->review !!}--}}
                                    {{--</p>--}}
                                    {{--<span class="review-info">--}}
                                        {{--@if(!empty($review->user))--}}
                                            {{--{{ $review->user->first_name }}--}}
                                        {{--@else--}}
                                            {{--{{ $review->author }}--}}
                                        {{--@endif--}}
                                        {{--- {!! $review->created_at !!}--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                {{--@if(!empty($review->answer))--}}
                                {{--<div class="answer-container">--}}
                                    {{--<p class="review-text">--}}
                                        {{--{!! $review->answer !!}--}}
                                    {{--</p>--}}
                                    {{--<span class="review-info">Tyfli.com - {!! $review->updated_at !!}</span>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                            {{--@empty--}}
                                {{--<div class="review-container">--}}
                                    {{--<p class="review-text">У этого товара пока нет отзывов! Будьте первым!</p>--}}
                                {{--</div>--}}
                            {{--@endforelse--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="product-social-links">--}}
                        {{--<div class="product-social-links-icons">--}}
                            {{--<a href="https://www.instagram.com/tyflicom/">--}}
                                {{--<i>&#xE804</i>--}}
                            {{--</a>--}}
                            {{--<a href="https://www.facebook.com/tyfli.commarina/">--}}
                                {{--<i>&#xE803</i>--}}
                            {{--</a>--}}
                            {{--<a href="https://www.vkontakte.com">--}}
                                {{--<i>&#xE800</i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<a href="" class="inform-sale-btn js-toggle-click-btn"  data-toggle=".inform-sale-form"><p>Сообщить о снижении цены</p></a>--}}
                        {{--<form class="inform-sale-form unactive ajax_form"--}}
                              {{--data-error-title="Ошибка отправки!"--}}
                              {{--data-error-message="Попробуйте отправить заявку через некоторое время."--}}
                              {{--data-success-title="Спасибо за заявку!"--}}
                              {{--data-success-message="Наш менеджер свяжется с вами в ближайшее время.">--}}
                            {{--<input type="hidden" name="form" value="Сообщить о снижении цены" data-title="Форма">--}}
                            {{--<input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">--}}
                            {{--<input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">--}}
                            {{--<input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">--}}
                            {{--<input type="email" name="email" class="email-input" placeholder="Ваша почта" data-title="Почта" data-validate-required="Обязательное поле" data-validate-email="Неправильный email">--}}
                            {{--<input type="submit" value="Отправить" class="send-btn inform-sale-form-btn">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    {{--<section class="insta-section">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h3 class="section-title">--}}
                        {{--Поделись своим образом в Instagram--}}
                    {{--</h3>--}}
                    {{--<p>Ставь хештег <a href="https://www.instagram.com/tyflicom/">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>--}}
                {{--</div>--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="js-slider slick-slider slider-margins" data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/7.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/8.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/9.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/10.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/11.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/6.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/1.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/5.jpg" alt=""></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    {{--<div class="section">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h3 class="section-title">--}}
                        {{--Популярные товары--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="slick-prod-wrap">--}}
                    {{--<div class="slick-slider slick-prod popular-slider" data-slick='{"slidesToShow":4, "slidesToScroll":4, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>--}}
                        {{--@foreach($popular as $prod)--}}
                            {{--<div>--}}
                                {{--<div class="grid-product-card card-margin">--}}
                                    {{--@include('public.layouts.product', ['product' => $prod, 'slide' => true])--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="mfp-hide">
        <div id="oneClick" class="view-popup">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="oneClick__container">
                            <p class="oneClick__container-title">Оставьте свои контакты<br>
                                и наш менеджер свяжется с Вами<br>
                                для оформления заказа</p>
                            <form action="" class="oneClick__container-form ajax_form"
                                  data-error-title="Ошибка отправки!"
                                  data-error-message="Попробуйте отправить заявку через некоторое время."
                                  data-success-title="Спасибо за заявку!"
                                  data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                                <input type="hidden" name="form" value="Быстрый заказ" data-title="Форма">
                                <input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">
                                <input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">
                                <input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">
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

        <div class="mfp-hide">
            <div id="partPay" class="view-popup">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                            <div class="partPay__container">
                                <form method="post" action="{{env('APP_URL')}}/credit">
                                    {{ csrf_field() }}
                                    <div class="partPay__img">
                                        <img src="/images/mdk-credit.jpg" alt=""><img src="/images/pb-credit.jpg" alt="">
                                    </div>
                                    <div class="partPay__form-wrp">
                                        <div class="partPay__form">
                                            <p class="hidden-xs">Сумма</p>
                                            <fieldset class="partPay__credit-range-wrp">
                                                <div class="partPay__credit-range price-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value="{{ $product->price }}" data-max="{{ $product->price }}" data-min="{{ $product->price }}"></div>
                                                <div class="partPay-inputs__inner">
                                                    <p class="visible-xs-block">Сумма</p>
                                                    <input type="text" class="partPaysliderValue val1" data-index="{{ $product->price }}" value="{{ $product->price }}" />
                                                    <p class="visible-xs-block">Сумма</p>
                                                </div>
                                            </fieldset>
                                            <p class="hidden-xs">Сумма</p>
                                        </div>
                                        <div class="partPay__form">
                                            <p class="hidden-xs">Первый взнос</p>
                                            <fieldset class="partPay__credit-range-wrp">
                                                <div class="partPay__credit-range credit-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value="20" data-max="100" data-min="20"></div>
                                                <div class="partPay-inputs__inner">
                                                    <p class="visible-xs-block">Первый взнос</p>
                                                    <input type="text" class="partPaysliderValue val2" data-index="20" value="20" />
                                                    <p class="visible-xs-block">%</p>
                                                </div>
                                            </fieldset>
                                            <p class="hidden-xs">%</p>
                                        </div>
                                        <div class="partPay__form">
                                            <p class="hidden-xs">Cрок</p>
                                            <fieldset class="partPay__credit-range-wrp">
                                                <div class="partPay__credit-range credit-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value="1" data-max="5" data-min="1"></div>
                                                <div class="partPay-inputs__inner">
                                                    <p class="visible-xs-block">Cрок</p>
                                                    <input type="text" class="partPaysliderValue val3" data-index="1" value="1" />
                                                    <p class="visible-xs-block">Месяцев</p>
                                                </div>
                                            </fieldset>
                                            <p class="hidden-xs">Месяцев</p>
                                        </div>
                                        <div class="partPay__form">
                                            <p class="hidden-xs">Месячный платеж</p>
                                            <fieldset class="partPay__credit-range-wrp">
                                                <div class="partPay__credit-range credit-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value="0" data-max="10000" data-min="1000"></div>
                                                <div class="partPay-inputs__inner">
                                                    <p class="visible-xs-block">Месячный платеж</p>
                                                    <input type="text" class="partPaysliderValue val4" data-index="0" value="0" />
                                                    <p class="visible-xs-block">Сумма</p>
                                                </div>
                                            </fieldset>
                                            <p class="hidden-xs">Сумма</p>
                                        </div>
                                    </div>
                                    <p class="partPay__total-title">Ваша сумма:</p>
                                    <div class="partPay__total">
                                        <p class="partPay__total-date">25.06.2018 ПОНЕДЕЛЬНИК</p>
                                        <div class="partPay__total-item">
                                            <p>Сумма:</p>
                                            <div>
                                                <p>10 000</p>
                                                <span>грн</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item">
                                            <p>Первый взнос:</p>
                                            <div>
                                                <p>0,9</p>
                                                <span>%</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item">
                                            <p>Срок:</p>
                                            <div>
                                                <p>9</p>
                                                <span>мес.</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item sum">
                                            <p>Оплата в месяц:</p>
                                            <span class="partPay__total-item-sum">1 000 грн</span>
                                        </div>
                                        <div class="partPay__total-item sum">
                                            <p>Всего:</p>
                                            <span class="partPay__total-item-sum">10 090 грн</span>
                                        </div>
                                    </div>
                                    <div class="partPay__bnt-wrp">
                                        <button type="submit" class="partPay__btn">Получить кредит</button>
                                        <button class="partPay__promocode-btn">У меня есть промокод</button>
                                    </div>
                                </form>
                                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mfp-hide">
            <div id="sizeTable" class="view-popup">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                            <div class="sizeTable__container-wrp">
                                <p class="main-title">Таблица размеров</p>
                                <div class="sizeTable__container">
                                    <img src="/images/model.jpg" class="hidden-xs" alt="">
                                    <div class="sizeTable__table">
                                        <ul>
                                            <li class="sizeTable__table-row-title">Обхват груди</li>
                                            <li>80</li>
                                            <li>84</li>
                                            <li>88</li>
                                            <li>92</li>
                                            <li>96</li>
                                            <li>100</li>
                                        </ul>
                                        <ul>
                                            <li class="sizeTable__table-row-title">Обхват талии</li>
                                            <li>62</li>
                                            <li>66</li>
                                            <li>70</li>
                                            <li>74</li>
                                            <li>78</li>
                                            <li>82</li>
                                        </ul>
                                        <ul>
                                            <li class="sizeTable__table-row-title">Обхват бедер</li>
                                            <li>86</li>
                                            <li>90</li>
                                            <li>94</li>
                                            <li>98</li>
                                            <li>102</li>
                                            <li>106</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="sizeTable__table-row-letter">
                                    <li></li>
                                    <li class="sizeTable__table-row-title">Европейский размер</li>
                                    <li>32 <sup>(XXS)</sup></li>
                                    <li>34 <sup>(XS)</sup></li>
                                    <li>36 <sup>(S)</sup></li>
                                    <li>38 <sup>(M)</sup></li>
                                    <li>40 <sup>(L)</sup></li>
                                    <li>42 <sup>(XL)</sup></li>
                                </ul>
                                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection