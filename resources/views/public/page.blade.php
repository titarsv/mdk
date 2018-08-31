@extends('public.layouts.main')
@section('meta')
    <title>{!! $content->meta_title !!}</title>
    <meta name="description" content="{!! $content->meta_description !!}">
    <meta name="keywords" content="{!! $content->meta_keywords !!}">
    @if(!empty($content->robots))
        <meta name="robots" content="{!! $content->robots !!}">
    @endif
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    {!! Breadcrumbs::render('html', $content) !!}
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="main-title">{{ $content->name }}</p>
                </div>
                {!! html_entity_decode($content->content) !!}
            </div>
        </div>
    </section>
@endsection