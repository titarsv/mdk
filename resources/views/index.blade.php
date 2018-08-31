@extends('public.layouts.main')
@section('meta')
    <title>{!! $settings->meta_title !!}</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('content')
    <section class="section-1">
        <div class="container-fluid no-padding">
            <div class="header-slider slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand"}'>
                <div class="header-slider__item">
                    <div class="row">
                        <div class="col-md-6 col-sm-5 hidden-xs"></div>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="header-slider__item-wrp">
                                <p class="header-slider__item-title">Лучшие цены на шубы</p>
                                <p class="header-slider__item-subtitle">всего от <span>5 999 грн</span></p>
                                <a href="">
                                    <p class="header-slider__item-btn">Подробнее</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="header-slider__item-page"><span>1</span>/2</p>
                </div>

                <div class="header-slider__item">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <div class="header-slider__item-wrp">
                                <p class="header-slider__item-title">Лучшие цены на шубы</p>
                                <p class="header-slider__item-subtitle">всего от <span>5 999 грн</span></p>
                                <a href="">
                                    <p class="header-slider__item-btn">Подробнее</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="header-slider__item-page"><span>2</span>/2</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2">
        <div class="section-title-wrp">
            <p class="section-title title-label new">Новинки</p>
        </div>
        <div class="container-fluid owl-carousel-wrp">
            <div class="news-slider owl-carousel owl-theme underline">
                <div class="item slider__item product-card">
                    <div class="product-card__img-slider product-card__img-slider1 slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand", "asNavFor": ".product-card__colors-slider1", "arrows": false}'>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                    </div>
                    <div class="color-slider-wrp underline">
                        <div class="product-card__colors-slider product-card__colors-slider1 slick-slider" data-slick='{"slidesToShow": 8, "lazyLoad": "ondemand", "asNavFor": ".product-card__img-slider1","focusOnSelect": true,"responsive":[{"breakpoint":1300,"settings":{"slidesToShow": 6}},{"breakpoint":768,"settings":{"slidesToShow": 3}}]}'>
                            <div class="product-card__colors-item black"></div>
                            <div class="product-card__colors-item dark-grey"></div>
                            <div class="product-card__colors-item grey"></div>
                            <div class="product-card__colors-item light-grey"></div>
                            <div class="product-card__colors-item peach"></div>
                            <div class="product-card__colors-item brawn"></div>
                            <div class="product-card__colors-item skin"></div>
                            <div class="product-card__colors-item light-skin"></div>
                            <div class="product-card__colors-item red"></div>
                        </div>
                    </div>
                    <p class="product-card__title">Куртка женская NH-9088</p>
                    <p class="product-card__price">12 899 грн</p>
                    <div class="product-card__btn">
                        <a href=""><p class="product-card__btn-more">Подробнее</p></a>
                        <button class="product-card__btn-buy popup-btn" data-mfp-src="#oneClick">Купить в 1 клик</button>
                    </div>
                </div>

                <div class="item slider__item product-card">
                    <div class="product-card__img-slider product-card__img-slider2 slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand", "asNavFor": ".product-card__colors-slider2", "arrows": false}'>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-1.jpg" alt="">
                            <div class="slider__item-img-label new">
                                new
                            </div>
                        </div>
                    </div>
                    <div class="color-slider-wrp underline">
                        <div class="product-card__colors-slider product-card__colors-slider2 slick-slider" data-slick='{"slidesToShow": 8, "lazyLoad": "ondemand", "asNavFor": ".product-card__img-slider2","focusOnSelect": true,"responsive":[{"breakpoint":1300,"settings":{"slidesToShow": 6}}, {"breakpoint":768,"settings":{"slidesToShow": 3}}]}'>
                            <div class="product-card__colors-item black"></div>
                            <div class="product-card__colors-item dark-grey"></div>
                            <div class="product-card__colors-item grey"></div>
                            <div class="product-card__colors-item light-grey"></div>
                            <div class="product-card__colors-item peach"></div>
                            <div class="product-card__colors-item brawn"></div>
                            <div class="product-card__colors-item skin"></div>
                            <div class="product-card__colors-item light-skin"></div>
                            <div class="product-card__colors-item red"></div>
                        </div>
                    </div>
                    <p class="product-card__title">Куртка женская NH-9088</p>
                    <p class="product-card__price">12 899 грн</p>
                    <div class="product-card__btn">
                        <a href=""><p class="product-card__btn-more">Подробнее</p></a>
                        <button class="product-card__btn-buy popup-btn" data-mfp-src="#oneClick">Купить в 1 клик</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section  class="section-3">
        <div class="container">
            <ul class="features-list">
                <div class="row">
                    <li class="features-list__item col-md-4 col-sm-6 col-xs-12">
                        <div>
                            <p class="features-list__item-title">Рассрочка 0%</p>
                            <img src="/images/img-1.png" class="features-list__item-img" alt="">
                            <p class="features-list__item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip</p>
                            <a href="">
                                <p class="features-list__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </li>
                    <li class="features-list__item col-md-4 col-sm-6 col-xs-12">
                        <div>
                            <p class="features-list__item-title">Химчистка</p>
                            <img src="/images/img-2.png" class="features-list__item-img" alt="">
                            <p class="features-list__item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip</p>
                            <a href="">
                                <p class="features-list__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </li>
                    <li class="features-list__item col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12">
                        <div>
                            <p class="features-list__item-title">Доставка</p>
                            <img src="/images/img-3.png" class="features-list__item-img" alt="">
                            <p class="features-list__item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip</p>
                            <a href="">
                                <p class="features-list__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </section>

    <section class="section-4">
        <div class="section-title-wrp">
            <p class="section-title title-label sale">Cкидки</p>
        </div>
        <div class="container-fluid owl-carousel-wrp">
            <div class="news-slider owl-carousel owl-theme">
                <div class="item slider__item product-card">
                    <div class="product-card__img-slider slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand", "arrows": false}'>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-2.jpg" alt="">
                            <div class="slider__item-img-label sale">
                                -20%</br>sale
                            </div>
                        </div>
                        <div class="product-card__img-slider-item">
                            <img src="/images/sample-2.jpg" alt="">
                            <div class="slider__item-img-label sale">
                                -20%</br>sale
                            </div>
                        </div>
                    </div>
                    <div class="product-card__colors-slider slick-slider underline" data-slick='{"slidesToShow": 3, "lazyLoad": "ondemand", "centerMode": true", focusOnSelect": true}'>
                        <div class="product-card__colors-item black"></div>
                        <div class="product-card__colors-item dark-grey"></div>
                        <div class="product-card__colors-item grey"></div>
                    </div>
                    <p class="product-card__title">Куртка женская NH-9088</p>
                    <div class="product-card__price-wrp">
                        <span class="old-price">7 799</span>
                        <span class="new-price">6 629 грн</span>
                    </div>
                    <div class="product-card__btn">
                        <a href=""><p class="product-card__btn-more">Подробнее</p></a>
                        <button class="product-card__btn-buy">Купить в 1 клик</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-5 underline">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="" class="collection-banner__photo">
                            <img src="/images/man.jpg" alt="">
                        </a>
                        <a href="">
                            <p class="collection-banner__title">
                                мужская коллекция
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="" class="collection-banner__photo">
                            <img src="/images/woman.jpg" alt="">
                        </a>
                        <a href="">
                            <p class="collection-banner__title">
                                женская коллекция
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="" class="collection-banner__photo">
                            <img src="/images/accessorize.jpg" alt="">
                        </a>
                        <a href="">
                            <p class="collection-banner__title">
                                мужские аксессуары
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="" class="collection-banner__photo">
                            <img src="/images/bag.jpg" alt="">
                        </a>
                        <a href="">
                            <p class="collection-banner__title">
                                женские аксессуары
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-6 underline">
        <div class="container-fluid">
            <p class="about-title">
                О компании
            </p>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <img src="/images/about.jpg" class="about-img" alt="">
                </div>
                <div class="col-md-6 col-sm-6">
                    <p class="about-text-title">Компания «Мир дубленок и кожи» рада приветствовать  новых и постоянных покупателей!</p>
                    <p class="about-text">
                        Мы занимаем прочную лидерскую позицию на отечественном рынке в течение  21 года. Магазины сети «Мир дубленок и кожи»
                        работают в Киеве, Харькове, Житомире, Краматорске – в этих города можно купить высококачественные изделия из натуральной
                        кожи и меха от ведущих, проверенных производителей.
                    </p>
                    <p class="about-text">
                        В ассортименте сети представлены дубленки, демисезонные и утепленные куртки из натуральной кожи для женщин и мужчин,
                        парки и стильные аксессуары – перчатки, шапки, шарфы. Мы работаем только с проверенными турецкими производителями:
                        CFR, SIMONTO, KHANPACE, VITALLIDANIELS, L’ADRIANO и др.
                    </p>
                    <p class="about-text">
                        Разнообразие моделей женской и мужской верхней одежды, расцветок и фактурпозволяет создать модный лук, удовлетворяющий
                        даже самым взыскательным требованиям наших покупателей. Ансамбль можно дополнить эксклюзивной сумочкой, клатчем или
                        рюкзаком, шарфом и перчатками, а, при помощи оригинальных аксессуаров, создать уникальный, завершенный модный
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-7 underline">
        <div class="container-fluid">
            <p class="acticle-title">
                Статьи
            </p>
            <div class="article-slider-wrp">
                <div class="acticle-slider slick-slider" data-slick='{"slidesToShow": 3, "lazyLoad": "ondemand", "responsive":[{"breakpoint":1200,"settings":{"slidesToShow": 2}}, {"breakpoint":768,"settings":{"slidesToShow": 1, "arrows": false}}]}'>
                    <div class="acticle-slider__item">
                        <div class="acticle-slider__item-img">
                            <img src="/images/article.jpg" alt="">
                        </div>
                        <div class="acticle-slider__item-text-wrp">
                            <p class="acticle-slider__item-date">
                                06.06.2018
                            </p>
                            <p class="acticle-slider__item-title">
                                Правила ухода за кожаными изделиями и аксессуарами
                            </p>
                            <p class="acticle-slider__item-text">
                                При правильном уходе любое изделие из кожи (кошелек, ремень или блокнот)
                                может прослужить ни один десяток лет и сохраниться  при этом в хорошем
                                состоянии. Уход за кожаными изделиями не требует особых усилий, нужно
                                просто запомнить несколько советов и анти-советов.
                            </p>
                            <a href="">
                                <p class="acticle-slider__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </div>
                    <div class="acticle-slider__item">
                        <div class="acticle-slider__item-img">
                            <img src="/images/article.jpg" alt="">
                        </div>
                        <div class="acticle-slider__item-text-wrp">
                            <p class="acticle-slider__item-date">
                                06.06.2018
                            </p>
                            <p class="acticle-slider__item-title">
                                Правила ухода за кожаными изделиями и аксессуарами
                            </p>
                            <p class="acticle-slider__item-text">
                                При правильном уходе любое изделие из кожи (кошелек, ремень или блокнот)
                                может прослужить ни один десяток лет и сохраниться  при этом в хорошем
                                состоянии. Уход за кожаными изделиями не требует особых усилий, нужно
                                просто запомнить несколько советов и анти-советов.
                            </p>
                            <a href="">
                                <p class="acticle-slider__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </div>
                    <div class="acticle-slider__item">
                        <div class="acticle-slider__item-img">
                            <img src="/images/article.jpg" alt="">
                        </div>
                        <div class="acticle-slider__item-text-wrp">
                            <p class="acticle-slider__item-date">
                                06.06.2018
                            </p>
                            <p class="acticle-slider__item-title">
                                Правила ухода за кожаными изделиями и аксессуарами
                            </p>
                            <p class="acticle-slider__item-text">
                                При правильном уходе любое изделие из кожи (кошелек, ремень или блокнот)
                                может прослужить ни один десяток лет и сохраниться  при этом в хорошем
                                состоянии. Уход за кожаными изделиями не требует особых усилий, нужно
                                просто запомнить несколько советов и анти-советов.
                            </p>
                            <a href="">
                                <p class="acticle-slider__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </div>
                    <div class="acticle-slider__item">
                        <div class="acticle-slider__item-img">
                            <img src="/images/article.jpg" alt="">
                        </div>
                        <div class="acticle-slider__item-text-wrp">
                            <p class="acticle-slider__item-date">
                                06.06.2018
                            </p>
                            <p class="acticle-slider__item-title">
                                Правила ухода за кожаными изделиями и аксессуарами
                            </p>
                            <p class="acticle-slider__item-text">
                                При правильном уходе любое изделие из кожи (кошелек, ремень или блокнот)
                                может прослужить ни один десяток лет и сохраниться  при этом в хорошем
                                состоянии. Уход за кожаными изделиями не требует особых усилий, нужно
                                просто запомнить несколько советов и анти-советов.
                            </p>
                            <a href="">
                                <p class="acticle-slider__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@if($slideshow->count())--}}
        {{--<div class="header-slider-wrp">--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="row">--}}
                    {{--<div class="js-slider slick-slider header-slider" data-slick='{"slidesToShow": 1, "dots": true, "responsive": [{"breakpoint":768,"settings":{"slidesToShow": 1, "dots": false}}]}'>--}}
                        {{--@foreach($slideshow as $slide)--}}
                            {{--@if($slide->status)--}}
                                {{--<div>--}}
                                    {{--<div class="slider-item-1" style="background-image: url('{{ $slide->image->url() }}')">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="com-md-12 slider-title">--}}
                                                {{--<h2>{{ $slide->data()->slide_title }}</h2>--}}
                                                {{--<h3>{{ $slide->data()->slide_description }}</h3>--}}
                                            {{--</div>--}}
                                            {{--<div class="com-md-12 slider-btn-wrp">--}}
                                                {{--<a href="{{ $slide->link }}" class="slider-btn">--}}
                                                    {{--<p>{{ $slide->data()->button_text }}</p>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<section class="brand-navigation">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row index-brand-wrp">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<h3 class="section-title">--}}
                        {{--Популярные бренды--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 col-xs-12">--}}
                    {{--<div class="js-slider slick-slider slider-brands"--}}
                         {{--data-slick='{"slidesToShow": 6, "responsive":[{"breakpoint":1200,"settings":{"slidesToShow": 4}},{"breakpoint":768,"settings":{"slidesToShow": 3, "arrows": false}},{"breakpoint":480,"settings":{"slidesToShow": 2, "arrows": false}}]}'>--}}
                        {{--@foreach($brands as $brand)--}}
                            {{--<div class="slider-brand-item">--}}
                                {{--<a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">--}}
                                    {{--<p>{{ $brand->name }}</p>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 all-brands-link">--}}
                        {{--<a href="{{env('APP_URL')}}/brands">--}}
                            {{--<p>Все бренды</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section class="main-content">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row main-content-wrp">--}}
                {{--<a href="{{ $banners[0]->link }}">--}}
                    {{--<div class="col-md-6 col-sm-5 col-xs-12">--}}
                        {{--<div class="new-post new-for-her"--}}
                            {{--@if(!empty($banners[0]->image))--}}
                                {{--style="background-image: url('{{ $banners[0]->image->url() }}');"--}}
                            {{--@endif--}}
                        {{-->--}}
                            {{--<div>--}}
                                {{--<h4>{{ json_decode($banners[0]->slide_data)->slide_title }}</h4>--}}
                                {{--<p>{{ json_decode($banners[0]->slide_data)->button_text }}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="col-md-6 col-sm-7 col-xs-12">--}}
                    {{--<div class="slick-prod-wrap">--}}
                        {{--<div class="slick-slider slick-prod popular-slider"--}}
                             {{--data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>--}}
                            {{--@foreach($women_new_prod as $prod)--}}
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

        {{--<div class="container-fluid">--}}
            {{--<div class="row main-content-wrp">--}}
                {{--<div class="col-md-6 col-md-push-6 col-sm-5 col-sm-push-7 col-xs-12">--}}
                    {{--<a href="{{ $banners[1]->link }}">--}}
                        {{--<div class="new-post new-for-him"--}}
                             {{--@if(!empty($banners[1]->image))--}}
                             {{--style="background-image: url('{{ $banners[1]->image->url() }}');"--}}
                                {{--@endif--}}
                        {{-->--}}
                            {{--<div>--}}
                                {{--<h4>{{ json_decode($banners[1]->slide_data)->slide_title }}</h4>--}}
                                {{--<p>{{ json_decode($banners[1]->slide_data)->button_text }}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-md-pull-6 col-sm-7 col-sm-pull-5 col-xs-12">--}}
                    {{--<div class="slick-prod-wrap">--}}
                        {{--<div class="slick-slider slick-prod popular-slider"--}}
                             {{--data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>--}}
                            {{--@foreach($men_new_prod as $prod)--}}
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
    {{--</section>--}}
    {{--<section class="sales-banner">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--@include('public.layouts.banner')--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row bag-category-section">--}}
                {{--<div class="col-md-8 col-sm-12 col-xs-12 bag-category-section-img">--}}
                    {{--<a href="{{ $banners[2]->link }}">--}}
                        {{--<div class="bag-category-img"--}}
                             {{--@if(!empty($banners[2]->image))--}}
                             {{--style="background-image: url('{{ $banners[2]->image->url() }}');"--}}
                                {{--@endif--}}
                        {{-->--}}
                            {{--<div>--}}
                                {{--<h4>{{ json_decode($banners[2]->slide_data)->slide_title }}</h4>--}}
                                {{--<p>{{ json_decode($banners[2]->slide_data)->button_text }}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<div class="bag-category-banner">--}}
                        {{--<div class="bag-category-banner-img">--}}
                            {{--<img src="/images/homepage-images/sale-banner-man.png" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="bag-category-banner-title">--}}
                            {{--<p>Обувь</p>--}}
                            {{--<span>БОЛЬШИХ размеров</span>--}}
                        {{--</div>--}}
                        {{--<a href="{{env('APP_URL')}}/catalog/tovary/specpredlozhenija-bolshierazmery"--}}
                           {{--class="sales-banner-btn bag-category-banner-btn">--}}
                            {{--<p>Смотреть</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-12 hidden-xs">--}}
                    {{--@foreach($big_sizes as $prod)--}}
                        {{--<div class="homepage-product-card">--}}
                            {{--@include('public.layouts.product', ['product' => $prod, 'slide' => true])--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section class="inform-card-wrp">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-4 col-xs-12 inform-card">--}}
                    {{--<a href="{{env('APP_URL')}}/page/delivery">--}}
                        {{--<h5>Доставка</h5>--}}
                        {{--<p>Харьков самовывоз из магазинов. В остальные города доставка осуществляется курьерской--}}
                            {{--компанией "Новая почта" по тарифам перевозчика. </p>--}}
                        {{--<img src="/images/homepage-icons/delivery icon.svg" alt="">--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12 inform-card">--}}
                    {{--<a href="">--}}
                        {{--<h5>Бонусная программа</h5>--}}
                        {{--<p>При покупке от 1000 грн консультант по номеру телефона сделает Вам скидку. Узнать больше о--}}
                            {{--системе начислений Бонусной программы</p>--}}
                        {{--<img src="/images/homepage-icons/bonus icon.svg" alt="">--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12 inform-card">--}}
                    {{--<a href="">--}}
                        {{--<h5>Оплата и возврат</h5>--}}
                        {{--<p>Вы можете оплатить покупки наличными при получении.--}}
                            {{--На все модели действует гарантия, и в случае необходимости вы можете ее вернуть.</p>--}}
                        {{--<img src="/images/homepage-icons/payment icon.svg" alt="">--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section class="article-slider-container">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<h3 class="section-title">--}}
                        {{--Новости и Акции--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="social-links">--}}
                        {{--<a href="https://www.instagram.com/tyflicom/"><img src="/images/homepage-icons/instagram icon.svg" alt=""></a>--}}
                        {{--<a href="https://www.facebook.com/tyfli.commarina/"><img src="/images/homepage-icons/facebook icon.svg" alt=""></a>--}}
                        {{--<a href=""><img src="/images/homepage-icons/vkontakte icon.svg" alt=""></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="js-slider slick-slider article-slider"--}}
                         {{--data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint":768,"settings":{"slidesToShow":1}}]}'>--}}
                        {{--@foreach($articles as $article)--}}
                            {{--<div class="article-slider-item">--}}
                                {{--<div class="article-slider-item-img">--}}
                                    {{--<a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">--}}
                                        {{--<img src="{!! $article->image->url('blog_list') !!}" alt="">--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<h5 class="article-slider-item-title">--}}
                                    {{--<a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">{!! $article->title !!}</a>--}}
                                {{--</h5>--}}
                                {{--<span class="article-slider-item-data">--}}
                                        {{--{!! $article->created_at !!}--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<a href="#" class="fixed-up-btn fixed-up-btn-center">--}}
            {{--<i>&#xE809</i>--}}
        {{--</a>--}}

    {{--</section>--}}
    {{--<section class="insta-section">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<h3 class="section-title">--}}
                        {{--Поделись своим образом в Instagram--}}
                    {{--</h3>--}}
                    {{--<p>Ставь хештег <a href="https://www.instagram.com/tyflicom/">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="js-slider slick-slider slider-margins"--}}
                         {{--data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/1.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/2.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/3.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/4.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/5.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/6.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/3.jpg" alt=""></div>--}}
                        {{--<div class="insta-img"><img src="/images/images-instagram/4.jpg" alt=""></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12 col-sm-12 hidden-xs home-page-about-us-text">--}}
                    {{--{!! $settings->about !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection