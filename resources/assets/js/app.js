
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


'use strict';

// Depends
let $ = require('jquery');
require('./bootstrap');

// Modules
let Forms = require('./components/forms');
let Slider = require('./components/slider');
let Popup = require('./components/popup');
let Fancy_select = require('./components/fancyselect');
let Jscrollpane = require('./components/jscrollpane');
let Fancybox = require('./components/fancybox');
let Chosen = require('./components/chosen');

require('owl.carousel');

require('./components/jquery-ui');

// Are you ready?
$(function() {
  new Forms();
  new Popup();
  new Fancy_select();
  new Jscrollpane();
  new Slider();
  new Fancybox();
  new Chosen();

  // Прокрутка к якорю
  $('.go_to').each(function() {
    var $this = $(this);
    $this.click(function() {
      var scroll_el = $($this.data('destination'));
      if ($(scroll_el).length != 0) {
        $('html, body').animate({
          scrollTop: $(scroll_el).offset().top
        }, 500);
      }
      return false;
    });
  });

  $('.owl-carousel').owlCarousel( {
    items: 4,
    dots: false,
    nav: true,
    margin: 10,
    responsive: {
      1200: {
        items: 4,
      },
      991: {
        items: 3,
      },
      768: {
        items: 2,
      },
      480: {
        items: 1
      },
      0: {
        items: 1,
      }
    }
  });

  $('.burger-menu__wrp').click(function() {
    $('.mobile-menu').removeClass('close');
  });

  $('.mobile-menu__close').click(function() {
    $('.mobile-menu').addClass('close');
  });

  var $toggleElemHover = $('.header__navigation-page-links ul li a');
  $toggleElemHover.hover(function() {
    var toggleImg = $(this).data('toggle');
    $('.header__navigation-page-links-img').css('background-image', 'url(\''+toggleImg+'\')');
  });

  $('.filters__title > a').click( function() {
    $(this).next('div').toggleClass('open');
  });

  $('.chosen-single').addClass('size1');

  $('.product__select-size').change(function() {
    var prodSize = $(this).find('option[value="'+$(this).val()+'"]').data('value');
    $('.size-label').text(prodSize);
  });

  $('.product__select-color').change(function() {
    var prodColor = $(this).val();
    $('.color-label' ).css( 'background', prodColor );
  });

  var price_range = $('.product__price-range');
  if (price_range.length) {
    price_range.slider({
      min: price_range.data('min'),
      max: price_range.data('max'),
      values: price_range.data('value').split(';'),
      range: true,
      slide: function(event, ui) {
        for (var i = 0; i < ui.values.length; ++i) {
          $('input.sliderValue[data-index=' + i + ']').val(ui.values[i]);
        }
      },
      stop: function( event, ui ) {
          var from = ui.values[0];
          var to = ui.values[1];
          var path_parts = location.pathname.split('/');
          var append = false;
          if(typeof path_parts[3] !== 'undefined'){
              var filter = path_parts[3];
              var filter_parts = filter.split('_');
              for(var i=0; i<filter_parts.length; i++){
                  var filter_data = filter_parts[i].split('-');
                  if(filter_data.length == 3 && filter_data[0] == 'price'){
                      filter_parts[i] = 'price-'+from+'-'+to;
                      append = true;
                  }
              }
              if(!append){
                  filter_parts[filter_parts.length] = 'price-'+from+'-'+to;
              }
              path_parts[3] = filter_parts.join('_');
          }else{
              path_parts[3] = 'price-'+from+'-'+to;
          }

          var path = path_parts.join('/');
          location = path;
          //$(this).parents('form').submit();
      }
    });
  }

  var credit_range = $('.partPay__credit-range');
  if (credit_range.length) {
      credit_range.each(function(){
          var $this = $(this);
          $this.slider({
              min: $this.data('min'),
              max: $this.data('max'),
              value: $this.data('value'),
              step: 1,
              range: false,
              animate: 'slow',
              slide: function(event, ui){
                  var inputRange = $(this).parent().find('input.partPaysliderValue').val($(this).slider("values",0));
                  var sliderHandle = $(this).parent().find('.ui-slider .ui-slider-handle').attr('value', $(this).slider("values",0));
              },
              stop: function( event, ui ) {
                  var inputRange = $(this).parent().find('input.partPaysliderValue').val($(this).slider("values",0));
                  var sliderHandle = $(this).parent().find('.ui-slider .ui-slider-handle').attr('value', $(this).slider("values",0));
              },
              create: function( event, ui ) {
                  var inputRange = $(this).parent().find('input.partPaysliderValue').val($(this).slider("values",0));
                  var sliderHandle = $(this).parent().find('.ui-slider .ui-slider-handle').attr('value', $(this).slider("values",0));
              }
          });
      });
  }
  $('input.partPaysliderValue').keyup(function(){
      var inputValue = $(this).val();
      $(price_range).slider('value', inputValue);
  });

  // $('.minus').click(function() {
  //   var $input = $(this).parent().find('input');
  //   var count = parseInt($input.val()) - 1;
  //   count = count < 1 ? 1 : count;
  //   $input.val(count);
  //   $input.change();
  //   return false;
  // });
  // $('.plus').click(function() {
  //   var $input = $(this).parent().find('input');
  //   $input.val(parseInt($input.val()) + 1);
  //   $input.change();
  //   return false;
  // });

  $('.accordion__title').click(function() {
    $(this).toggleClass('open');
  });

  $('.cabinet__add-number').click(function() {
    $(this).prev().append( $( "<input type=\"tel\" name=\"phones[]\" placeholder=\"Телефон\" data-title=\"Телефон\" data-validate-required=\"Обязательное поле\" data-validate-uaphone=\"Неправильный номер\">" ) )
  });
  $('.cabinet__add-address').click(function() {
    $(this).prev().append( $( "<input type=\"text\" name=\"addresses[]\" placeholder=\"г.Харьков, улица Кирова, 23 А, кв.4\" data-title=\"Адрес\">" ) )
  });
  $('.cabinet__add-email').click(function() {
    $(this).prev().append( $( "<input type=\"text\" name=\"mail\" placeholder=\"ivanovivanivanych@gmail.com\" data-title=\"Email\">" ) )
  });

});

require('./custom.js');