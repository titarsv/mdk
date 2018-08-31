'use strict';
// Depends
var $ = require('jquery');
var swal = require('sweetalert2');
require('../../../node_modules/jquery.maskedinput/src/jquery.maskedinput');

// Are you ready?
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Выбор вариации
    $('.variation-select').change(function(){
        var result_price = parseFloat($('.product-price').data('price'));
        var hash = '';
        var attrs = [];
        $('.variation-select').each(function(){
            var val = $(this).val();
            if(val != ''){
                attrs.push(val);
            }
        });
        hash = attrs.sort().join('_');

        $('[name="variation"]').prop('checked', false);
        var input = $('#var_'+hash);
        if(hash != '' && input.length){
            input.prop('checked', true);
            location.hash = hash;
            var price = parseFloat(input.data('price'));
            $('.product-price').html(price + ' грн.');
            var result_price = price * parseInt($('.result-price .count_field').val());
            $('.result-product-price').html(result_price + ' грн.');
            $('.result-product-price-wrapper').show();
        }else{
            if($('.variation-select').length == 0){
                var price = parseFloat($('.product-price').data('price'));
                var result_price = price * parseInt($('.result-price .count_field').val());
                $('.result-product-price').html(result_price + ' грн.');
                $('.result-product-price-wrapper').show();
            }else{
                if(window.location.hash !== '')
                    history.pushState("", document.title, window.location.pathname + window.location.search);
                $('.product-price').html($('.product-price').data('price') + ' грн.');
                $('.result-product-price-wrapper').hide();
                if($(this).hasClass('variation-select')){
                    flushNextSelects($(this));
                    $('.result-price .count_field').change();
                }
            }
        }
        hideVariationOptions();
    });

    function flushNextSelects(select){
        var selects = $('.variation-select');
        for(var i=selects.index(select)+1; i<selects.length; i++){
            selects.eq(i).find('option:first-child').prop('selected', true);
        }
    }

    function clearVariations(variations, attrs, attr){
        var new_variations = [];
        for(var v=0; v<variations.length; v++){
            var isset = true;
            if(variations[v].indexOf(attr) < 0){
                isset = false;
            }
            for(var a=0; a<attrs.length; a++){
                if(variations[v].indexOf(attrs[a]) < 0 ){
                    isset = false;
                }
            }
            if(isset){
                new_variations.push(variations[v]);
            }
        }
        return new_variations;
    }

    function hideVariationOptions(){
        var variations = [];
        var current_select;
        $('[name="variation"]').each(function(){
            variations.push($(this).attr('id').replace('var_', ''));
        });
        var selects = $('.variation-select');
        var attrs = [];
        if(selects.length > 1){
            if(selects.eq(0).val() !== '')
                attrs.push(selects.eq(0).val());

            for(var i=1; i<selects.length; i++){
                current_select = selects.eq(i);
                current_select.find('option').each(function(){
                    var opt_var = clearVariations(variations, attrs, $(this).val());
                    if(opt_var.length == 0){
                        $(this).attr('disabled', 'disabled').css('display', 'none');
                        if(current_select.val() == $(this).val()){
                            current_select.find('option:first-child').prop('selected', true);
                        }
                    }else{
                        $(this).prop('disabled', false).css('display', 'block');
                    }
                });
                if(selects.eq(i).val() !== ''){
                    attrs.push(selects.eq(i).val());
                }else{
                    // i++;
                    // while(i<selects.length){
                    //     console.log(selects.eq(i));
                    //     selects.eq(i).find('option').prop('disabled', false).css('display', 'block');
                    //     i++;
                    // }
                    // break;
                }
            }
        }
    }

    var hash_parts = location.hash.replace('#', '').split('_');
    if(hash_parts.length){
        for(var i=0; i<hash_parts.length; i++){
            var option = $('.variation-select option[value="'+hash_parts[i]+'"]');
            option.prop('selected', true);
        }
        $('.variation-select').trigger('change');
    }

    $('.btn_buy').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var qty = $('.result-price .count_field').val();
        var data = {
            action: 'add',
            product_id: $this.data('prod-id'),
            quantity: qty > 1 ? qty : 1
        };

        if($('[name="variation"]').length && $('[name="variation"]:checked').length == 0){
            swal('Ошибка', 'Выберите размер', 'error');
            return false;
        }

        var variation = $('[name="variation"]:checked');
        if(variation.length){
            data['variation'] = variation.val();
        }

        $.post("/cart/update", data, function(cart){
            swal('Товар', 'добавлен в корзину', 'success');
            update_cart_quantity(cart);
        });
    });

    /*
     * Добавление отзывов комментариев
     */
    $('form.review-form, form.answer-form').on('submit', function(e){
        e.preventDefault();
        var $this = $(this);

        $.ajax({
            url: '/review/add',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            beforeSend: function() {
                $this.find('.error-message').fadeOut(300);
                $this.find('button[type="submit"]').html('Отправляем...');
            },
            success: function (response) {
                if(response.error){
                    var html = '';
                    $.each(response.error, function(i, value){
                        html += value + '<br>';
                    });
                    // $('#error-' + response.type + ' > div').html(html);
                    // $('#error-' + response.type).fadeIn(300);

                    swal('Ошибка', html, 'error');

                } else if(response.success) {
                    // $('#error-' + response.type + ' > div').html(response.success);
                    // $('#error-' + response.type).fadeIn(300);

                    swal('Ваш отзыв успешно добавлен!', 'Он появится на сайте после модерации.', 'success');

                    setTimeout(function(){
                        $this.slideUp('slow');
                        $('.review-btn').fadeIn('slow');
                    },2500);
                    $('form.' + response.type + '-form')[0].reset();
                }
                $this.find('button[type="submit"]').html('Оставить отзыв')
            }
        });
    });

    window.sortBy = function(sort){
        var locate = location.search.split('&');
        var new_location = '';

        jQuery.each(locate, function (i, value) {
            var parameters = value.split('=');
            if (parameters[0] != 'sort') {
                new_location += value + '&';
            }
        });

        location.search = new_location + 'sort=' + sort;
    };

    /**
     * Отображение полей в зависимости от выбранного способа доставки
     */
    $('#shipping_method').on('change', function(){
        if($(this).val() != '') {
            var data = {
                delivery: $(this).val()
            };

            $("#shipping").load("/checkout/delivery", data, function (cart) {
                $('#shipping .chosen-select').each(function () {
                    var $this = $(this);
                    var settings = {};
                    if (typeof $this.data('chosen-settings') == 'object') {
                        settings = $this.data('chosen-settings');
                    }
                    $(this).chosen(settings);
                });
            });
        }
    });

    /**
     * Удаление товара из корзины
     */
    $('#order-popup, #order_cart_content, #order_checkout_content').on('click', '.mc_item_delete', function(){
        var $this = $(this);
        update_cart({
            action: 'remove',
            product_id: $this.data('prod-id')
        });
        $(this).parent('.basket__item').slideUp('slow').promise().done(function() {
            $(this).remove();
            if ($('.order-page__item').length != 0) {
                $('.order-page-inner').show();
            }
            else {
                $('.order-page-inner').hide();
                $('.order-page__empty').css('display', 'flex');
            }
        });
    });

    /**
     * Обновление колличества товара в корзине
     */
    $('#order-popup, #order_cart_content, #order_checkout_content').on('input change', '.count_field', function(){
        var $this = $(this);
        update_cart({
            action: 'update',
            product_id: $this.data('prod-id'),
            quantity: $this.val()
        });
    });

    /**
     * Кнопка уменьшения колличества товара в корзине
     */
    $('#order-popup, #order_cart_content, #order_checkout_content').on('click', '.minus', function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    /**
     * Кнопка увеличения колличества товара в корзине
     */
    $('#order-popup, #order_cart_content, #order_checkout_content').on('click', '.plus', function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    /**
     * Обработка оформления заказа
     */
    $('#order-checkout').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var error_div = form.find('.error-message');

        $.ajax({
            url: '/order/create',
            type: 'post',
            data: $(this).serialize(),
            beforeSend: function(){
                $('.checkout-step__body').addClass('checkout-step__body_loader');
                $('.checkout-step__body_second .error-message').fadeOut(300, function(){
                    $('.checkout-step__body_second .error-message__text').html('');
                });
                $('select, input').removeClass('input-error');
            },
            success: function(response) {

                if (response.error) {
                    var html = '';
                    $.each(response.error, function (id, text){
                        var error = id.split('.');
                        $('[name="' + error[0] + '[' + error[1] + ']"').addClass('input-error');
                        html += text + '<br>';
                    });
                    $('.cart-block_checkout .error-message__text').html(html);
                    $('.cart-block_checkout').removeClass('checkout-step__body_loader');
                    $('.cart-block_checkout .error-message').fa
                    deIn(300);
                } else if (response.success) {
                    console.log(response);
                    if (response.success == 'liqpay') {
                        // $('body').prepend(
                        //     '<form method="POST" id="liqpay-form" action="' + response.liqpay.url + '" accept-charset="utf-8">' +
                        //     '<input type="hidden" name="data" value="' + response.liqpay.data + '" />' +
                        //     '<input type="hidden" name="signature" value="' + response.liqpay.signature + '" />' +
                        //     '</form>');
                        // $('#liqpay-form').submit();
                        LiqPayCheckout.init({
                            data: response.liqpay.data,
                            signature:  response.liqpay.signature,
                            embedTo: "#liqpay_checkout",
                            mode: "embed" // embed || popup
                        }).on("liqpay.callback", function(data){
                            console.log(data.status);
                            console.log(data);
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        }).on("liqpay.ready", function(data){
                            $('#liqpay_checkout').css('display', 'block');
                        }).on("liqpay.close", function(data){
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        });
                    } else if (response.success == 'redirect') {
                        window.location = '/checkout/complete?order_id=' + response.order_id;
                    }
                }
            }
        })
    });

    $('.subscribe-form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: '/subscribe',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            success: function(response){
                if (response.email){
                    swal('Подписка', response.email[0], 'error');
                } else if (response.success) {
                    swal('Подписка', response.success, 'success');
                }

                $('.subscribe-form').find('input[type="email"]').val('');
            }
        });
    });

    jQuery('.wishlist-add, .prod-card-wish').on('click', function () {
        var $this = $(this);
        var data = {};
        data['user_id'] = $this.attr('data-user-id');
        data['product_id'] = $this.attr('data-prod-id');
        if ($this.hasClass('active')) {
            data['action'] = 'remove';
        } else {
            data['action'] = 'add';
        }
        $.ajax({
            url: '/wishlist/update', type: 'POST', data: data, dataType: 'JSON',
            success: function (response) {
                if (response.count !== false) {
                    if($this.parents('.grid-product-card').length){
                        $this.parents('.grid-product-card').find('.prod-card-wish').toggleClass('active');
                    }else{
                        $this.toggleClass('active');
                    }
                }
            }
        });
    });

    $('.show-more-filters').click(function(e){
        e.preventDefault();
        $(this).parent().find('.overflow-scroll').css('height', 'auto');
        $(this).hide();
    });

    $('#filters input').change(function(){
        var url = $(this).data('url')
        if(typeof url !== 'undefined' && location.pathname != url){
            location = url;
        }
    });

    $('.hover-prod-card').on('mouseenter, mousemove', function (e) {
        var slider = $(this).find('.slick-slider:not(.slick-initialized)');

        if (slider.length) {
            slider.slick();
        }
        $(this).find('.slick-slider').slick('setPosition');
    });

    $('.homepage-product-card-color a').click(function(e){
        e.preventDefault();
        var i = $(this).data('id');
        var slider = $(this).parents('.grid-product-card').find('.slick-slider');
        slider.slick('slickGoTo', i);
    });

    $('#checkout-btn, #checkout-btn-mob').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/order/create',
            type: 'post',
            data: $(this).parents('form').serialize(),
            beforeSend: function(){

            },
            success: function(response) {
                if (response.error) {
                    var html = '';
                    $.each(response.error, function (id, text){
                        var error = id.split('.');
                        $('[name="' + error[0] + '[' + error[1] + ']"').addClass('input-error');
                        html += text + '<br>';
                        swal({
                            title: 'Ошибка заполнеия!',
                            type: 'error',
                            html: html
                        })
                    });
                } else if (response.success) {
                    if (response.success == 'liqpay') {
                        LiqPayCheckout.init({
                            data: response.liqpay.data,
                            signature:  response.liqpay.signature,
                            embedTo: "#liqpay_checkout",
                            mode: "embed" // embed || popup
                        }).on("liqpay.callback", function(data){
                            console.log(data.status);
                            console.log(data);
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        }).on("liqpay.ready", function(data){
                            $('#liqpay_checkout').css('display', 'block');
                        }).on("liqpay.close", function(data){
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        });
                    } else if (response.success == 'redirect') {
                        swal('Заказ оформлен!', 'Номер заказа: '+response.order_id, 'success');
                        setTimeout(function(){
                            window.location = '/user/history';
                        }, 5000);
                        //window.location = '/checkout/complete?order_id=' + response.order_id;
                    }
                }
            }
        });
    });

    $('#delivery-popup .save').click(function(){
        $('#current-delivery').text($('[for="'+$('#delivery-popup [name="delivery"]:checked').attr('id')+'"]').text());
        $.magnificPopup.close();
    });

    $('#delivery-popup .cancel').click(function(){
        $.magnificPopup.close();
    });

    // $('#delivery-popup [name="delivery"]').change(function(){
    //     $('#current-delivery').text($('[for="'+$(this).attr('id')+'"]').text());
    // });

    $('#pay-popup .save').click(function(){
        $('#current-pay').text($('[for="'+$('#pay-popup [name="payment"]:checked').attr('id')+'"]').text());
        $.magnificPopup.close();
    });

    $('#pay-popup .cancel').click(function(){
        $.magnificPopup.close();
    });
    // $(document).on('click', '.edit-profile.active', function () {
    //     var data = {
    //         fio: $('[name="fio"]').val(),
    //         phone: $('[name="phone"]').val(),
    //         email: $('[name="email"]').val(),
    //         user_birth: $('[name="user-birth"]').val()
    //     };
    //
    //     $.post('/saveUserData', data, function(response){
    //         window.location = window.location;
    //     });
    // })

    $('[name="subscr-type"]').change(function(){
        $.post('/user/updatesubscr', {subscr: $('[name="subscr-type"]:checked').val()}, function(response){
            if(response.success){
                swal('Сохранено', 'Данные успешно сохранениы!', 'success');
            }else{
                swal('Ошибка', 'Не удалось сохранить данные', 'error');
            }
        });
    });
    $('.profile-address-btn').click(function(e){
        e.preventDefault();
        var data = {
            city: $('[name="city"]').val(),
            post_code: $('[name="post_code"]').val(),
            street: $('[name="street"]').val(),
            house: $('[name="house"]').val(),
            flat: $('[name="flat"]').val(),
            npregion: $('[name="npregion"]').val(),
            npcity: $('[name="npcity"]').val(),
            npdepartment: $('[name="npdepartment"]').val()
        };

        $.post('/user/updateaddress', data, function(response){
            if(response.success){
                swal('Сохранено', 'Данные успешно сохранениы!', 'success');
            }else{
                swal('Ошибка', 'Не удалось сохранить данные', 'error');
            }
        });
    });

    $('.sign-up-form').submit(function (e) {
        if($('#email').val() == '' || $('#first_name').val() == '' || $('#phone').val() == '' || $('#password').val() == '' || $('#passwordr').val() == ''){
            e.preventDefault();
        }
    });

    $('.sign-up-form input').on('keyup', function(){
        if($('#email').val() != '' && $('#first_name').val() != '' && $('#phone').val() != '' && $('#password').val() != '' && $('#passwordr').val() != ''){
            $('.registr-btn').css('background-color', '#5F98B9');
        }else{
            $('.registr-btn').css('background-color', '#9DACB4');
        }
    });

    $('.sign-in-form').submit(function (e) {
        if($('#email').val() == '' || $('#pass').val() == ''){
            e.preventDefault();
        }
    });

    $('.sign-in-form input').on('keyup', function(){
        if($('#email').val() != '' && $('#pass').val() != ''){
            $('.registr-btn').css('background-color', '#5F98B9');
        }else{
            $('.registr-btn').css('background-color', '#9DACB4');
        }
    });

    $('#redirect_select').change(function(){
        if(window.location.href != $(this).val()){
            window.location = $(this).val();
        }
    });

    $('#phone').mask('+38 (999) 999-99-99');

    $('.filter-menu').click(function () {
        $('.aside-filter-menu-container').addClass('active');
    });

    $('#close_filter').click(function () {
        $('.aside-filter-menu-container').removeClass('active');
    });

    // Сортировка
    $('#sorting-select').change(function () {
        var s = window.location.search.replace('?', '').split('&');
        var search = {};
        if(s.length){
            for(i=0; i<s.length; i++){
                var p = s[i].split('=');
                if(p[0] != '')
                    search[p[0]] = p[1];
            }
        }

        search['order'] = $(this).val();
        s = '?';
        for (var key in search) {
            s += key + '=' + search[key];
        }

        if(location.href != location.origin + location.pathname + s){
            window.location = location.origin + location.pathname + s;
        }
    });
});

/**
 * Обновление корзины
 * @param data
 */
function update_cart(data){
    $.post("/cart/update",data, function(cart){
        update_cart_quantity(cart);
        if($('#order_cart_content').length){
            $('#order_cart_content').load('/cart #order_cart_content');
        }
    });
}

/**
 * Обновлене счётчика товаров в корзине
 *
 * @param cart
 */
function update_cart_quantity(cart) {
   var quantity = cart.total_quantity;
   if(quantity){
        if($('.header__cart .in-cart').length){
            $('.header__cart .in-cart').text(quantity);
        }else{
            $('.header__cart').append('<li class="in-cart">'+quantity+'</li>');
        }
    }else{
        $('.header__cart .in-cart').remove();
    }
}

/**
 * Загрузка городов и отделений Новой Почты
 * @param id
 * @param value
 */
window.newpostUpdate = function(id, value) {
    if (id == 'city') {
        var data = {
            city_id: value
        };
        var path = '/checkout/warehouses';
        var selector = jQuery('#checkout-step__warehouse');
    } else if (id == 'region') {
        var data = {
            region_id: value
        };
        var path = 'checkout/cities';
        var selector = jQuery('#checkout-step__city');
        $('#checkout-step__warehouse').html('<option value="">Выберите населённый пункт</option>');
    }
    selector.find('option').text('Обновляются данные, ожидайте...');
    selector.attr('disabled', 'disabled');

    jQuery.ajax({
        url: path,
        data: data,
        type: 'post',
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response){
            if (response.error) {

            } else if (response.success) {
                var html = '<option value="0">Сделайте выбор</option>';
                jQuery.each(response.success, function(i, resp){
                    if (id == 'city') {
                        var info = resp.address_ru;
                    } else if (id == 'region') {
                        var info = resp.name_ru;
                    }
                    html += '<option value="' + resp.id + '">' + info + '</option>';
                });
                selector.html(html);
                selector.prop('disabled', false);
                if(selector.hasClass('chosen-select')){
                    selector.trigger("chosen:updated");
                }
            }
        }
    })
};