@extends('public.layouts.main')
@section('meta')
    <title>{!! $settings->meta_title !!}</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">

    <meta name=description content="{!! $settings->meta_description !!}"/>
    <meta property=og:site_name content="Мир дубленок и кожи">
    <meta property=og:title content="{!! $settings->meta_title !!}"/>
    <meta property=og:url content="https://mdk.ua/">
@endsection

@section('content')
    @if($slideshow->count())
    <section class="section-1">
        <div class="container-fluid no-padding">
            <div class="header-slider slick-slider" data-slick='{"slidesToShow": 1, "lazyLoad": "ondemand"}'>
               @foreach($slideshow as $i => $slide)
                    @if($slide->status)
                        <div class="header-slider__item" style="background-image: url('{{ $slide->image->url() }}')">
                            <div class="row">
                                <div class="col-md-6 col-sm-5 hidden-xs"></div>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="header-slider__item-wrp">
                                        <p class="header-slider__item-title">{!! $slide->data()->slide_title !!}</p>
                                        <p class="header-slider__item-subtitle">{!! $slide->data()->slide_description !!}</p>
                                        <a href="{{ $slide->link }}">
                                            <p class="header-slider__item-btn">{{ $slide->data()->button_text }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="header-slider__item-page"><span>{{ $i + 1 }}</span>/{{ count($slideshow) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="section-2">
        <div class="section-title-wrp">
            <p class="section-title title-label new">Новинки</p>
        </div>
        <div class="container-fluid owl-carousel-wrp">
            <div class="news-slider owl-carousel owl-theme underline">
                @foreach($new as $product)
                    @include('public.layouts.product', ['product' => $product, 'slide' => false])
                @endforeach
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
                            <a href="{{env('APP_URL')}}/page/predlozheniya-ot-privatbanka">
                                <p class="features-list__item-btn">Подробнее →</p>
                            </a>
                        </div>
                    </li>
                    <li class="features-list__item col-md-4 col-sm-6 col-xs-12">
                        <div>
                            <p class="features-list__item-title">Постгарантийное обслуживание</p>
                            <img src="/images/img-2.png" class="features-list__item-img" alt="">
                            <p class="features-list__item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi</p>
                            <a href="javascript:void(0);">
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
                            <a href="{{env('APP_URL')}}/page/dostavka-i-oplata">
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
                @foreach($sale as $product)
                    @include('public.layouts.product', ['product' => $product, 'slide' => false])
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-5 underline">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="{{env('APP_URL')}}/catalog/verhnyaya-odezhda_2" class="collection-banner__photo">
                            <img src="/images/man.jpg" alt="">
                        </a>
                        <a href="{{env('APP_URL')}}/catalog/verhnyaya-odezhda_2">
                            <p class="collection-banner__title">
                                мужская коллекция
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="{{env('APP_URL')}}/catalog/verhnyaya-odezhda" class="collection-banner__photo">
                            <img src="/images/woman.jpg" alt="">
                        </a>
                        <a href="{{env('APP_URL')}}/catalog/verhnyaya-odezhda">
                            <p class="collection-banner__title">
                                женская коллекция
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="{{env('APP_URL')}}/catalog/aksessuary" class="collection-banner__photo">
                            <img src="/images/accessorize.jpg" alt="">
                        </a>
                        <a href="{{env('APP_URL')}}/catalog/aksessuary">
                            <p class="collection-banner__title">
                                мужские аксессуары
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="collection-banner">
                        <a href="{{env('APP_URL')}}/catalog/aksessuary_3" class="collection-banner__photo">
                            <img src="/images/bag.jpg" alt="">
                        </a>
                        <a href="{{env('APP_URL')}}/catalog/aksessuary_3">
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
                    {!! $settings->about !!}
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
                    @foreach($articles as $article)
                        <div class="acticle-slider__item">
                            <div class="acticle-slider__item-img">
                                <a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">
                                    <img src="{!! $article->image->url('blog_list') !!}" alt="">
                                </a>
                            </div>
                            <div class="acticle-slider__item-text-wrp">
                                <p class="acticle-slider__item-date">
                                    {!! date('d.m.Y', strtotime($article->created_at)) !!}
                                </p>
                                <p class="acticle-slider__item-title">
                                    {!! $article->title !!}
                                </p>
                                <p class="acticle-slider__item-text">
                                    {!! $article->subtitle !!}
                                </p>
                                <a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">
                                    <p class="acticle-slider__item-btn">Подробнее →</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

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
@endsection