@extends('public.layouts.main')
@section('meta')
    <title>Брендовая обувь от интерент магазина - tyfli.com</title>
    <meta name="description" content="Брендовая обувь, купить брендовую обувь в интернет магазине - tyfli.com . У нас самый большой выбор женской и мужской обуви разных брендов высокого качества."/>
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('brand') !!}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 no-padding hidden-xs">
                    <div class="path-underline"></div>
                    <div class="brand-link-wrp">
                        <a href="/page/drop-shipping" class="brand-link">Drop Shipping</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 margin">
                            <h1 class="title">Бренды</h1>
                        </div>
                        @foreach($brands as $brand)
                            @if(is_file(public_path().'/images/brands/'.$brand->value.'.png'))
                            <a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">
                                <div class="col-md-4 col-xs-6 brand-item">
                                    {{--@if(is_file(public_path().'/images/brands/'.$brand->value.'.png'))--}}
                                        <img src="/images/brands/{{ $brand->value }}.png" alt="{{ $brand->name }}">
                                    {{--@else--}}
                                        {{--{{ $brand->name }}--}}
                                    {{--@endif--}}
                                </div>
                            </a>
                            @endif
                        @endforeach
                        @include('public.layouts.banner')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection