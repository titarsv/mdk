<div class="basket__input-wrp">
    <label for="payment">Область:</label>
    <select name="newpost[region]" id="checkout-step__region" class="basket__select chosen-select" onchange="newpostUpdate('region', jQuery(this).val());" data-chosen-settings='{"disable_search_threshold":6, "width":"100%"}'>
        <option value="0">Выберите область</option>
        @foreach($regions as $region)
            <option value="{!! $region->id !!}">{!! $region->name !!}</option>
        @endforeach
    </select>
</div>

<div class="basket__input-wrp">
    <label for="payment">Город:</label>
    <select name="newpost[city]" id="checkout-step__city" class="basket__select chosen-select" onchange="newpostUpdate('city', jQuery(this).val());" data-chosen-settings='{"disable_search_threshold":6, "width":"100%"}'>
        <option value="0">Сначала выберите область!</option>
    </select>
</div>

<div class="basket__input-wrp">
    <label for="payment">Отделение Новой почты:</label>
    <select name="newpost[warehouse]" id="checkout-step__warehouse" class="basket__select chosen-select" data-chosen-settings='{"disable_search_threshold":6, "width":"100%"}'>
        <option value="0">Сначала выберите город!</option>
    </select>
</div>

<div class="basket__input-wrp">
    <label for="payment">Cпособ оплаты:</label>
    <select name="payment" id="payment" class="basket__select chosen-select">
        <option value="" selected>Выберите способ оплаты</option>
        <option value="cod">Наложенный платеж</option>
        <option value="prepayment">Перевод на карту</option>
    </select>
</div>