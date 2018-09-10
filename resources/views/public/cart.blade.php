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
                                    <input type="checkbox" name="promocode" id="promocode1">
                                    <label for="promocode1">Использовать баллы
                                        {{--<a href="">(как получить карту)</a>--}}
                                    </label>
                                    <div class="question-mark hidden-xs">?</div>
                                </li>
                                <li>
                                    <input type="checkbox" name="promocode" id="promocode2">
                                    <label for="promocode2">У меня есть промо-код</label>
                                    <div class="question-mark hidden-xs">?</div>
                                </li>
                                <li style="visibility: hidden">
                                    <input type="checkbox" name="promocode" id="promocode3">
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
                            <a href="javascript:void(0);" class="product__part-pay-btn popup-btn" data-mfp-src="#partPay" style="max-width: 315px; padding: 8px 10px;">
                                <span>Купить частичной оплатой</span>
                            </a>
                            <a href="{{env('APP_URL')}}/checkout" class="basket__submit-btn">Далее</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="mfp-hide">
        <div id="partPay" class="view-popup">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="partPay__container">
                            <form method="post" action="{{env('APP_URL')}}/credit">
                                {{ csrf_field() }}
                                @foreach ($cart->get_products() as $code => $product)
                                    @if(is_object($product['product']))
                                        <input type="hidden" name="product_id[]" value="{{ $code }}">
                                    @endif
                                @endforeach
                                <div class="partPay__img">
                                    <img src="/images/mdk-credit.jpg" alt="" id="mdk_btn">
                                    <img src="/images/pb-credit.jpg" alt="" id="prv_btn">
                                </div>
                                <div id="mdk_credit">
                                    <div class="partPay__form-wrp">
                                        <div class="partPay__form">
                                            <p class="hidden-xs">Сумма</p>
                                            <fieldset class="partPay__credit-range-wrp">
                                                <div class="partPay__credit-range price-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value="{{ round($cart->total_price, 2) }}" data-max="{{ round($cart->total_price, 2) }}" data-min="{{ round($cart->total_price, 2) }}"></div>
                                                <div class="partPay-inputs__inner">
                                                    <p class="visible-xs-block">Сумма</p>
                                                    <input type="text" name="price" class="partPaysliderValue val1" data-index="{{ round($cart->total_price, 2) }}" value="{{ round($cart->total_price, 2) }}" />
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
                                                    <input type="text" name="first_cash" class="partPaysliderValue val2" data-index="20" value="20" />
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
                                                    <input type="text" name="months" class="partPaysliderValue val3" data-index="1" value="1" />
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
                                                    <input type="text" name="for_month" class="partPaysliderValue val4" data-index="0" value="0" />
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
                                                <p>{{ number_format(round($cart->total_price, 2), 2, '.', ' ') }}</p>
                                                <span>грн</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item">
                                            <p>Первый взнос:</p>
                                            <div>
                                                <p>20</p>
                                                <span>%</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item">
                                            <p>Срок:</p>
                                            <div>
                                                <p>1</p>
                                                <span>мес.</span>
                                            </div>
                                        </div>
                                        <div class="partPay__total-item sum">
                                            <p>Оплата в месяц:</p>
                                            <span class="partPay__total-item-sum">1 000 грн</span>
                                        </div>
                                        <div class="partPay__total-item sum">
                                            <p>Всего:</p>
                                            <span class="partPay__total-item-sum">{{ number_format(round($cart->total_price, 2), 2, '.', ' ') }} грн</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="privat_credit" style="display: none">
                                    <iframe src="https://ppcalc.privatbank.ua/pp_calculator/phys" frameborder="0" style="width: 100%; height: 500px;"></iframe>
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
@endsection