@extends('public.layouts.main')
@section('meta')
    <title>Оформление заказа</title>
@endsection
@section('content')

    <section>
        <div class="container-fluid delivery-container" id="order_cart_content">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    {!! Breadcrumbs::render('cart') !!}
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="main-title">Оформление заказа</p>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="basket__step-title">
                        <p class="active">1.Мой заказ</p>
                        <p>2.Оформление заказа</p>
                    </div>
                    <form action="">
                        <div class="basket__items-title hidden-xs">
                            <!-- <p></p> -->
                            <p>Название</p>
                            <p>Цена</p>
                            <p>Количество</p>
                            <p>Стоимость</p>
                        </div>
                        @foreach ($cart->get_products() as $code => $product)
                            @if(is_object($product['product']))
                                <div class="basket__item">
                                    <img src="{{ is_null($product['product']->image) ? '/uploads/no_image.jpg' : $product['product']->image->url('cart') }}" alt="{{ $product['product']->name }}" class="basket__item-img">
                                    <div class="basket__item-info-wrp">
                                        <div class="basket__item-name">
                                            <p>
                                                {{ $product['product']->name }}
                                                @if(!empty($product['variations']))
                                                    (
                                                    @foreach($product['variations'] as $name => $val)
                                                        {{ $name }}: {{ $val }};
                                                    @endforeach
                                                    )
                                                @endif
                                            </p>
                                            <p class="basket__item-article">Артикул {{ $product['product']->articul }}</p>
                                        </div>
                                        <p class="basket__item-price">{{ number_format( round($product['price'], 2), 0, ',', ' ' ) }} грн</p>
                                        <div class="prod-quantity">
                                            <span class="minus"></span>
                                            <input type="text" class="count_field" value="{{ $product['quantity'] }}" size="5" data-prod-id="{{ $code }}"/>
                                            <span class="plus"></span>
                                        </div>
                                        <p class="basket__item-price hidden-xs"><span data-one-price="{{ round($product['price'] * $product['quantity'], 2) }}">{{ number_format( round($product['price'] * $product['quantity'], 2), 0, ',', ' ' ) }}</span> грн</p>
                                    </div>
                                    <button type="button" class="delete mc_item_delete" data-prod-id="{{ $code }}"></button>
                                </div>
                            @endif
                        @endforeach
                        <div class="basket__promocode-wrp">
                            <ul class="basket__promocode">
                                <li class="basket__promocode-title">Баллы и промокоды</li>
                                <li>
                                    <input type="radio" name="promocode" id="promocode1">
                                    <label for="promocode1">Использовать баллы <a href="">(как получить карту)</a></label>
                                    <div class="question-mark hidden-xs">?</div>
                                </li>
                                <li>
                                    <input type="radio" name="promocode" id="promocode2">
                                    <label for="promocode2">У меня есть промо-код</label>
                                    <div class="question-mark hidden-xs">?</div>
                                </li>
                                <li>
                                    <input type="radio" name="promocode" id="promocode3">
                                    <label for="promocode3">У меня есть сертификат</label>
                                    <div class="question-mark hidden-xs">?</div>
                                </li>
                            </ul>
                            <ul class="promocode-input-wrp">
                                <li class="basket__promocode-title">Введите промо-код</li>
                                <li>
                                    <input type="text" class="promocode-input">
                                </li>
                                <li>
                                    <button class="promocode-calc-btn">Пересчитать</button>
                                </li>
                            </ul>
                        </div>
                        <p class="basket__total">Итого сумма: <span>{{ $cart->total_price ? number_format( round($cart->total_price, 2), 0, ',', ' ' ) : '0' }} грн</span> </p>
                        <div class="basket__submit-btn-wrp">
                            <a href="{{env('APP_URL')}}/checkout" class="basket__submit-btn">Далее</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection