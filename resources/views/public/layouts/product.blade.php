@php
    $labels = $product->labels();
    $brand = $product->brand();
    $sizes = $product->sizes->sortBy('attribute_value_id')->values()->all();
    if($product->wishlist !== null){
        $in_wish = $product->wishlist->count();
    }else{
        $in_wish = $product->in_wish();
    }

    $colors = [];
    if($product->colors->count()) {
        foreach ($product->related as $prod) {
            if ($prod->colors->count())
                $colors[$prod->id] = ['color' => $prod->colors->first()->value, 'slug' => $prod->url_alias, 'image' => $prod->image->url('product_list')];
        }
        if(!empty($colors)){
            sort($colors);
            $colors = array_merge([$product->id => ['color' => $product->colors->first()->value, 'slug' => $product->url_alias, 'image' => $product->image->url('product_list')]], $colors);
        }else{
            foreach ($product->colors as $color){
                $colors[] = ['color' => $color->value, 'slug' => $product->url_alias, 'image' => $product->image->url('product_list')];
            }
        }
    }
@endphp

<div class="item slider__item product-card">
    <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">
        <div class="product-card__img-slider product-card__img-slider{{ $product->id }} slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand", "asNavFor": ".product-card__colors-slider{{ $product->id }}", "arrows": false}'>
            @if(!empty($colors))
                @foreach($colors as $color)
                    <div class="product-card__img-slider-item">
                        <img src="{{ $color['image'] }}" alt="{{ $product->name }}">
                        @if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))
                            <div class="slider__item-img-label new">
                                {{ $labels[$product->label] }}
                            </div>
                        @elseif(!empty($product->old_price))
                            <div class="slider__item-img-label sale">
                                -{{ ceil((($product->old_price - $product->price)/ $product->old_price) * 100) }}%<br>sale
                            </div>
                        @else
                            <div class="slider__item-img-label" style="visibility: hidden;"></div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="product-card__img-slider-item">
                    <img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}">
                    @if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))
                        <div class="slider__item-img-label new">
                            {{ $labels[$product->label] }}
                        </div>
                    @elseif(!empty($product->old_price))
                        <div class="slider__item-img-label sale">
                            -{{ ceil((($product->old_price - $product->price)/ $product->old_price) * 100) }}%<br>sale
                        </div>
                    @else
                        <div class="slider__item-img-label" style="visibility: hidden;"></div>
                    @endif
                </div>
            @endif
        </div>
    </a>
    {{--<div class="color-slider-wrp underline">--}}
        {{--<div class="product-card__colors-slider product-card__colors-slider{{ $product->id }} slick-slider" data-slick='{"slidesToShow": 7, "lazyLoad": "ondemand", "focusOnSelect": true, "asNavFor": ".product-card__img-slider{{ $product->id }}","responsive":[{"breakpoint":1450,"settings":{"slidesToShow": 6}}, {"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":991,"settings":{"slidesToShow": 4}}, {"breakpoint":768,"settings":{"slidesToShow": 3}}, {"breakpoint":480,"settings":{"slidesToShow": 1}}]}'>--}}
            {{--@foreach($colors as $key => $item)--}}
                {{--<div data-id="{{ $key }}" title="{{ $item['color']->name }}" class="product-card__colors-item" style="background-color: {{ $item['color']->value }}"></div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="underline">
        <bitton class="product-card__like"></bitton>
    </div>
    <p class="product-card__title">{{ $product->name }}</p>
    @if($product->old_price)
        <div class="product-card__price-wrp">
            <span class="new-price">{{ number_format($product->price, 2, '.', ' ') }} грн</span>
            <span class="old-price">{{ number_format($product->old_price, 2, '.', ' ') }}</span>
        </div>
    @else
        <p class="product-card__price">{{ number_format($product->price, 2, '.', ' ') }} грн</p>
    @endif
    <div class="product-card__btn">
        <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><p class="product-card__btn-more">Подробнее</p></a>
        <button class="product-card__btn-buy popup-btn" data-mfp-src="#oneClick_{{ $product->id }}">Купить в 1 клик</button>
    </div>
    <div class="hidden">
        <div id="oneClick_{{ $product->id }}" class="view-popup">
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
    </div>
</div>

{{--<div class="homepage-product-card-img-wrp">--}}
    {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"--}}
    {{--@if(!empty($colors))--}}
        {{--style="background-image: url({{ $colors[0]['image'] }});"--}}
    {{--@endif--}}
    {{-->--}}
        {{--@if(!empty($colors))--}}
        {{--<div class="slick-slider product-cart-slider-{{ $product->id }}" data-slick='{"arrows":false, "fade":true, "cssEase":"linear"}'>--}}
            {{--@foreach($colors as $color)--}}
                {{--<img src="{{ $color['image'] }}" alt="{{ $product->name }}" class="homepage-product-card-img">--}}
            {{--@endforeach--}}
        {{--</div>--}}
        {{--@else--}}
            {{--<img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="homepage-product-card-img">--}}
        {{--@endif--}}
    {{--</a>--}}
    {{--@if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))--}}
        {{--<p class="homepage-product-card-new">{{ $labels[$product->label] }}</p>--}}
    {{--@elseif(!empty($product->old_price))--}}
        {{--<p class="homepage-product-card-new product-discount">-{{ ceil((($product->old_price - $product->price)/ $product->old_price) * 100) }}%</p>--}}
    {{--@else--}}
        {{--<p class="homepage-product-card-new" style="visibility: hidden;"></p>--}}
    {{--@endif--}}
    {{--<div class="prod-card-wish{{ $in_wish ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0 }}">--}}
        {{--<i class="homepage-product-card-like product-card-like">&#xE801</i>--}}
        {{--<i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>--}}
    {{--</div>--}}
{{--</div>--}}

{{--@if(!isset($slide) || !$slide)--}}
{{--<div class="hover-prod-card hidden-sm hidden-xs">--}}
    {{--<div>--}}
        {{--<div class="homepage-product-card-img-wrp">--}}
            {{--<div class="homepage-product-card-img-hover">--}}
                {{--@if(!empty($colors))--}}
                    {{--<div class="slick-slider product-cart-slider-{{ $product->id }}" data-slick='{"arrows":false, "fade":true, "cssEase":"linear"}'>--}}
                        {{--@foreach($colors as $color)--}}
                            {{--<a href="{{env('APP_URL')}}/product/{{ $color['slug'] }}">--}}
                                {{--<img src="{{ $color['image'] }}" alt="{{ $product->name }}" class="homepage-product-card-img">--}}
                            {{--</a>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--@else--}}
                    {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">--}}
                        {{--<img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="homepage-product-card-img">--}}
                    {{--</a>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--@if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))--}}
                {{--<p class="homepage-product-card-new">{{ $labels[$product->label] }}</p>--}}
            {{--@elseif(!empty($product->old_price))--}}
                {{--<p class="homepage-product-card-new product-discount">-{{ ceil((($product->old_price - $product->price)/ $product->old_price) * 100) }}%</p>--}}
            {{--@else--}}
                {{--<p class="homepage-product-card-new" style="visibility: hidden;"></p>--}}
            {{--@endif--}}
            {{--<div class="prod-card-wish{{ $in_wish ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0}}">--}}
                {{--<i class="homepage-product-card-like product-card-like">&#xE801</i>--}}
                {{--<i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="one-click-btn-wrp">--}}
            {{--<div class="hover-pro-card-btn-container">--}}
                {{--<a class="js-toggle-one-click-btn" data-toggle=".one-click-form"><p class="hover-pro-card-btn">Купить в 1 клик</p></a>--}}
                {{--<button class="hover-pro-card-cart-btn btn_buy" data-prod-id="{{ $product->id }}"><img src="/images/homepage-icons/cart icon.svg" alt="cart icon"></button>--}}
            {{--</div>--}}
            {{--<form action="" class="one-click-form unactive ajax_form"--}}
                  {{--data-error-title="Ошибка отправки!"--}}
                  {{--data-error-message="Попробуйте отправить заявку через некоторое время."--}}
                  {{--data-success-title="Спасибо за заявку!"--}}
                  {{--data-success-message="Наш менеджер свяжется с вами в ближайшее время.">--}}
                {{--<input type="hidden" name="form" value="Быстрый заказ" data-title="Форма">--}}
                {{--<input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">--}}
                {{--<input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">--}}
                {{--<input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">--}}
                {{--<input type="text" name="name" id="" class="one-click-form-input hover-one-click-form-input" placeholder="имя" data-title="Имя">--}}
                {{--<input type="text" name="phone" id="" class="one-click-form-input hover-one-click-form-input" placeholder="тел." data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер" data-title="Телефон">--}}
                {{--<input type="submit" value="Отправить" class="send-btn one-click-form-btn hover-one-click-form-btn">--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="homepage-product-card-text-wrp">--}}
            {{--<div class="homepage-product-card-text">--}}
                {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><span>{{ $product->name }}</span></a>--}}
                {{--<p>Код товара: <span>{{ $product->articul }}</span></p>--}}
                {{--@if($brand)--}}
                    {{--<a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">--}}
                        {{--<p>Бренд: <span>{{ $brand->name }}</span></p>--}}
                    {{--</a>--}}
                {{--@else--}}
                    {{--<p>&nbsp;</p>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div class="color-and-price-wrp">--}}
                {{--<div class="homepage-product-card-color">--}}
                    {{--@foreach($colors as $key => $item)--}}
                        {{--<a href="{{env('APP_URL')}}/product/{{ $item['slug'] }}" data-id="{{ $key }}" title="{{ $item['color']->name }}" class="color-sample" style="background-color: {{ $item['color']->value }}"></a>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="homepage-product-card-price">--}}
                    {{--<p>{{ round($product->price, 2) }}<span> грн</span></p>--}}
                    {{--@if(!empty($product->old_price))--}}
                        {{--<span class="old-price">{{ round($product->old_price, 2) }}</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="hover-prod-size">--}}
            {{--@foreach($sizes as $size)--}}
                {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}#{{  $size->value->id }}">--}}
                    {{--<div class="hover-prod-size-item"><p>{{ $size->value->name }}</p></div>--}}
                {{--</a>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="homepage-product-card-text-wrp">--}}
    {{--<div class="homepage-product-card-text">--}}
        {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><span>{{ $product->name }}</span></a>--}}
        {{--<p>Код товара: <span>{{ $product->articul }}</span></p>--}}
        {{--@if($brand)--}}
            {{--<a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">--}}
                {{--<p>Бренд: <span>{{ $brand->name }}</span></p>--}}
            {{--</a>--}}
        {{--@else--}}
            {{--<p>&nbsp;</p>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<div class="color-and-price-wrp">--}}
        {{--<div class="homepage-product-card-color">--}}
            {{--@foreach($colors as $key => $item)--}}
                {{--<a href="{{env('APP_URL')}}/product/{{ $item['slug'] }}" title="{{ $item['color']->name }}" data-id="{{ $key }}" class="color-sample" style="background-color: {{ $item['color']->value }}"></a>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="homepage-product-card-price">--}}
            {{--<p>{{ round($product->price, 2) }}<span> грн</span></p>--}}
            {{--@if(!empty($product->old_price))--}}
                {{--<span class="old-price">{{ round($product->old_price, 2) }}</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}