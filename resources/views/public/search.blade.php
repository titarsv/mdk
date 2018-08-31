@extends('public.layouts.main')
@section('meta')
    <title>Поиск: {{ $search_text }}</title>
    <meta name="description" content="Поиск по запросу: {{ $search_text }}">
    <meta name="keywords" content="{{ $search_text }}">
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    {!! Breadcrumbs::render('search') !!}
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="category-title">Поиск: {{ $search_text }}</p>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @if(empty($products))
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <span>Нет таких товаров...</span>
                            </div>
                        @else
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                @foreach($products as $key => $product)
                                    @include('public.layouts.product', ['product' => $product, 'slide' => false])
                                @endforeach
                            </div>
                        @endif
                    </div>
                    @if(!empty($products))
                        <div class="visible-xs-block">
                            <ul class="pagination">
                                @include('public.layouts.pagination', ['paginator' => $products])
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection