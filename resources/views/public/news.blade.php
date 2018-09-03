@extends('public.layouts.main')
@section('meta')
    <title>Публикации | Мир дубленок и кожи</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    <ul class="breadcrambs">
                        <li><a href="{{env('APP_URL')}}" target="_blank">Главная →</a></li>
                        <li><a href="#" target="_blank">Публикации</a></li>
                    </ul>
                </div>
                <div class="col-sm-col-xs-12">
                    <p class="main-title">Публикации</p>
                </div>
                <ul class="pagination col-sm-12 hidden-xs">
                    @include('public.layouts.pagination', ['paginator' => $items])
                </ul>
                @foreach($items as $i => $article)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="acticle-slider__item">
                            <div class="acticle-slider__item-img">
                                <a href="{{env('APP_URL')}}/{{ $slug }}/{!!$article->url_alias !!}">
                                    <img src="{!! $article->image->url('blog_list') !!}" alt="{!! $article->title !!}">
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
                                <a href="{{env('APP_URL')}}/{{ $slug }}/{!!$article->url_alias !!}">
                                    <p class="acticle-slider__item-btn">Подробнее →</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <ul class="pagination col-sm-12 col-xs-12">
                    @include('public.layouts.pagination', ['paginator' => $items])
                </ul>
            </div>
        </div>
    </section>
@endsection