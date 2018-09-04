@extends('public.layouts.main', ['pagination' => $products, 'root_category' => $category->get_root_category()])
@section('meta')
    <title>
        @if(empty($category->meta_title)))
            {!! $category->name !!}}
        @else
            {!! $category->meta_title !!}
        @endif
            | Мир дубленок и кожи
        @if(!empty($products) && $products->currentPage() > 1) - Страница {!! $products->currentPage() !!}@endif
    </title>

    @if(empty($products) || $products->currentPage() == 1)
        <meta name="description" content="{!! $category->meta_description or '' !!}">
        <meta name="keywords" content="{!! $category->meta_keywords or '' !!}">
    @endif

    @if(!empty($category->canonical) && empty($_GET['page']))
        <meta name="canonical" content="{!! $category->canonical !!}">
    @endif
    @if(!empty($category->robots))
        <meta name="robots" content="{!! $category->robots !!}">
    @endif
    @if(!empty($products) && $products->currentPage() > 1)
        <link rel="prev" href="{!! $cp->url($products->url($products->currentPage() - 1), $products->currentPage() - 1) !!}">
    @endif
    @if(!empty($products) && $products->currentPage() < $products->lastPage())
        <link rel="next" href="{!! $cp->url($products->url($products->currentPage() + 1), $products->currentPage() + 1) !!}">
    @endif
@endsection

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    {!! Breadcrumbs::render('categories', $category) !!}
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="category-title">{{ $category->name }}</p>
                </div>
                <div class="col-md-2 col-sm-3 hidden-xs">
                    <form action="">
                        <div class="accordion-filters">
                            @foreach($categories as $i => $cat)
                                <div class="filters-wrp">
                                    <h4 class="filters__title">
                                        <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapseFilters{{ $cat->id }}">{{ mb_strtoupper($cat->name) }}</a>
                                        <div class="filters__title-icon{{ $i == 0 ? ' open' : '' }}"></div>
                                    </h4>
                                    <div id="collapseFilters{{ $cat->id }}" class="filters__collapse collapse{{ $i == 0 ? ' in' : '' }}">
                                        <div class="filters__body">
                                            <ul class="filters__links">
                                                @foreach($cat->children as $child)
                                                    <li>
                                                        <a href="{{env('APP_URL')}}/catalog/{{ $child->url_alias }}">{{ $child->name }}</a>
                                                        @if($child->hasChildren())
                                                            <ul class="filters__links">
                                                                @foreach($child->children as $child2)
                                                                    <li><a href="{{env('APP_URL')}}/catalog/{{ $child2->url_alias }}">{{ $child2->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if(!empty($attributes))
                            @foreach($attributes as $key => $attribute)
                                <div class="filters-wrp border filters">
                                    <h4 class="filters__title">
                                        <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapse{{ $key }}">{{ $attribute['name'] }}</a>
                                        <div class="filters__title-icon"></div>
                                    </h4>
                                    <div id="collapse{{ $key }}" class="filters__collapse collapse">
                                        <div class="filters__body">
                                            @php
                                                $attr_values = $attribute['values'];
                                            @endphp
                                            @foreach($attr_values as $i => $attribute_value)
                                                @if(!empty($attribute_value['name']))
                                                    <div class="filters__input-wrp">
                                                        <input type="checkbox"
                                                               name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"
                                                               data-attribute="{{ $key }}"
                                                               data-value="{{ $i }}"
                                                               data-url="/catalog{{ $attribute_value['url'] }}"
                                                               id="product-filter-{!! $key !!}__check-{!! $i !!}"
                                                               class="checkbox-custom"
                                                               @if($attribute_value['checked'])
                                                               checked
                                                               @endif>
                                                        <label class="label-custom" for="product-filter-{!! $key !!}__check-{!! $i !!}">
                                                            <p>{!! $attribute_value['name'] !!}</p>
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="filters-wrp border">
                            <h4 class="filters__title">
                                <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapsePrice">Цена</a>
                                <div class="filters__title-icon"></div>
                            </h4>
                            <div id="collapsePrice" class="filters__collapse collapse">
                                <div class="filters__body">
                                    <fieldset>
                                        <div class="product__price-range" data-value="{{ isset($price[2]) ? $price[2] : $price[0] }};{{ isset($price[3]) ? $price[3] : $price[1] }}" data-max="{{ $price[1] }}" data-min="{{ $price[0] }}"></div>
                                        <div class="product__price-inputs">
                                            <div class="product__price-inputs__inner">
                                                <span> от </span>
                                                <input type="text" name="price_min" class="sliderValue val1" data-index="0" value="{{ isset($price[2]) ? $price[2] : $price[0] }}" />
                                                <span> до </span>
                                                <input type="text" name="price_max" class="sliderValue val2" data-index="1" value="{{ isset($price[3]) ? $price[3] : $price[1] }}" />
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-10 col-sm-9">
                    <div class="row">
                        <div class="products-sorting-wrp col-sm-12 col-xs-12">
                            <div class="visible-xs-block mobile-filters popup-btn" data-mfp-src="#mobile-filters">
                                <p>Фильтры</p>
                            </div>
                            <div class="mfp-hide">
                                <div id="mobile-filters" class="view-popup">
                                    <div class="container">
                                        <div class="mobile-filters-menu">
                                            <form action="">
                                                <p class="mobile-filters-title">ПАРАМЕТРЫ</p>
                                                <div class="accordion-filters">
                                                    @foreach($categories as $i => $cat)
                                                        <div class="filters-wrp">
                                                            <h4 class="filters__title">
                                                                <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapseFilters{{ $cat->id }}">{{ mb_strtoupper($cat->name) }}</a>
                                                                <div class="filters__title-icon{{ $i == 0 ? ' open' : '' }}"></div>
                                                            </h4>
                                                            <div id="collapseFilters{{ $cat->id }}" class="filters__collapse collapse{{ $i == 0 ? ' in' : '' }}">
                                                                <div class="filters__body">
                                                                    <ul class="filters__links">
                                                                        @foreach($cat->children as $child)
                                                                            <li>
                                                                                <a href="{{env('APP_URL')}}/catalog/{{ $child->url_alias }}">{{ $child->name }}</a>
                                                                                @if($child->hasChildren())
                                                                                    <ul class="filters__links">
                                                                                        @foreach($child->children as $child2)
                                                                                            <li><a href="{{env('APP_URL')}}/catalog/{{ $child2->url_alias }}">{{ $child2->name }}</a></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if(!empty($attributes))
                                                    @foreach($attributes as $key => $attribute)
                                                        <div class="filters-wrp border filters">
                                                            <h4 class="filters__title">
                                                                <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapseMin{{ $key }}">{{ $attribute['name'] }}</a>
                                                                <div class="filters__title-icon"></div>
                                                            </h4>
                                                            <div id="collapseMin{{ $key }}" class="filters__collapse collapse">
                                                                <div class="filters__body">
                                                                    @php
                                                                        $attr_values = $attribute['values'];
                                                                    @endphp
                                                                    @foreach($attr_values as $i => $attribute_value)
                                                                        @if(!empty($attribute_value['name']))
                                                                            <div class="filters__input-wrp">
                                                                                <input type="checkbox"
                                                                                       name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"
                                                                                       data-attribute="{{ $key }}"
                                                                                       data-value="{{ $i }}"
                                                                                       data-url="/catalog{{ $attribute_value['url'] }}"
                                                                                       id="product-filter-{!! $key !!}__check-{!! $i !!}"
                                                                                       class="checkbox-custom"
                                                                                       @if($attribute_value['checked'])
                                                                                       checked
                                                                                        @endif>
                                                                                <label class="label-custom" for="product-filter-{!! $key !!}__check-{!! $i !!}">
                                                                                    <p>{!! $attribute_value['name'] !!}</p>
                                                                                </label>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="filters-wrp border">
                                                    <h4 class="filters__title">
                                                        <a data-toggle="collapse" data-parent="#accordion-filters" href="#collapseMinPrice">Цена</a>
                                                        <div class="filters__title-icon"></div>
                                                    </h4>
                                                    <div id="collapseMinPrice" class="filters__collapse collapse">
                                                        <div class="filters__body">
                                                            <fieldset>
                                                                <div class="product__price-range" data-value="{{ isset($price[2]) ? $price[2] : $price[0] }};{{ isset($price[3]) ? $price[3] : $price[1] }}" data-max="{{ $price[1] }}" data-min="{{ $price[0] }}"></div>
                                                                <div class="product__price-inputs">
                                                                    <div class="product__price-inputs__inner">
                                                                        <span> от </span>
                                                                        <input type="text" name="price_min" class="sliderValue val1" data-index="0" value="{{ isset($price[2]) ? $price[2] : $price[0] }}" />
                                                                        <span> до </span>
                                                                        <input type="text" name="price_max" class="sliderValue val2" data-index="1" value="{{ isset($price[3]) ? $price[3] : $price[1] }}" />
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--<button type="reset" class="filters-reset-btn">Очистить</button>--}}
                                                {{--<button type="submit" class="filters-submit-btn">Применить</button>--}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($products))
                                <select name="products-sorting-select chosen-select" class="chosen-select" id="sorting-select">
                                    <option value="date-desc"{{ isset($_GET['order']) && $_GET['order'] == 'name-asc' ? ' selected="selected"' : '' }}>По названию</option>
                                    <option value="price-asc"{{ isset($_GET['order']) && $_GET['order'] == 'price-asc' ? ' selected="selected"' : '' }}>От дешевых к дорогим</option>
                                    <option value="price-desc"{{ isset($_GET['order']) && $_GET['order'] == 'price-desc' ? ' selected="selected"' : '' }}>От дорогих к дешевым</option>
                                </select>
                                <ul class="pagination hidden-xs">
                                    @include('public.layouts.pagination', ['paginator' => $products])
                                </ul>
                            @endif
                        </div>
                        @if(empty($products))
                            <div class="col-md-3 col-sm-4 col-xs-6 col-12">
                                <span>Нет таких товаров...</span>
                            </div>
                        @else
                            @foreach($products as $key => $product)
                                <div class="col-md-3 col-sm-4 col-xs-6 col-12">
                                    @include('public.layouts.product', ['product' => $product, 'slide' => false])
                                </div>
                            @endforeach
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

    {{--<main>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">--}}
                    {{--<div class="row">--}}
                        {{--<button type="button" id="close_filter"></button>--}}
                        {{--<form action="" method="get" id="filters">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="aside-filter-menu-item">--}}
                                    {{--<div class="aside-filter-menu-item-title">--}}
                                        {{--<p>Цена</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="aside-filter-menu-item-filters">--}}
                                        {{--<div>--}}
                                            {{--@foreach($price as $i => $attribute_value)--}}
                                                {{--<div>--}}
                                                    {{--<input type="checkbox"--}}
                                                           {{--class="radio"--}}
                                                           {{--name="price"--}}
                                                           {{--value="{{ $i }}"--}}
                                                           {{--data-attribute="price"--}}
                                                           {{--data-value="{{ $i }}"--}}
                                                           {{--data-url="/catalog{{ $attribute_value['url'] }}"--}}
                                                           {{--id="product-filter-price__check-{!! str_replace(['<', '>', '-'], '', $i) !!}"--}}
                                                           {{--@if($attribute_value['checked'])--}}
                                                           {{--checked--}}
                                                           {{--@endif>--}}
                                                    {{--<span class="radio-custom"></span>--}}
                                                    {{--<label for="product-filter-price__check-{!! str_replace(['<', '>', '-'], '', $i) !!}">{{ $attribute_value['name'] }}</label>--}}
                                                {{--</div>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="aside-filter-menu-item-btn-toggle">--}}
                                        {{--<div></div>--}}
                                        {{--<div></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--@if($category->parent_id != 0 && !empty($attributes))--}}
                                {{--@foreach($attributes as $key => $attribute)--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div class="aside-filter-menu-item">--}}
                                            {{--<div class="aside-filter-menu-item-title">--}}
                                                {{--<p>{{ $attribute['name'] }}</p>--}}
                                            {{--</div>--}}
                                            {{--@if($attribute['name'] == 'Цвет')--}}
                                                {{--<div class="aside-filter-menu-item-filters-color color-filters">--}}
                                                    {{--<div class="form">--}}
                                                        {{--@foreach($attribute['values'] as $i => $attribute_value)--}}
                                                            {{--@if(!empty($attribute_value['value']))--}}
                                                                {{--<div>--}}
                                                                    {{--<input type="checkbox"--}}
                                                                           {{--name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"--}}
                                                                           {{--data-attribute="{{ $key }}"--}}
                                                                           {{--data-value="{{ $i }}"--}}
                                                                           {{--data-url="/catalog{{ $attribute_value['url'] }}"--}}
                                                                           {{--id="product-filter-{!! $key !!}__check-{!! $i !!}"--}}
                                                                           {{--class="checkbox"--}}
                                                                           {{--value=""--}}
                                                                           {{--@if($attribute_value['checked'])--}}
                                                                           {{--checked--}}
                                                                           {{--@endif>--}}
                                                                    {{--<label title="{{ $attribute_value['name'] }}" for="product-filter-{!! $key !!}__check-{!! $i !!}" class="color-sample" style="background-color: {!! $attribute_value['value'] !!}"></label>--}}
                                                                {{--</div>--}}
                                                            {{--@endif--}}
                                                        {{--@endforeach--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div class="aside-filter-menu-item-filters{{ $attribute['name'] == 'Тип' ? '' : ' unactive' }}">--}}
                                                    {{--@php--}}
                                                        {{--$attr_values = $attribute['values'];--}}
                                                    {{--@endphp--}}
                                                    {{--<div{{ count($attr_values) >= 9 ? ' class=overflow-scroll' : '' }}>--}}
                                                        {{--@foreach($attr_values as $i => $attribute_value)--}}
                                                            {{--@if(!empty($attribute_value['name']))--}}
                                                                {{--<div>--}}
                                                                    {{--<input type="checkbox"--}}
                                                                           {{--name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"--}}
                                                                           {{--data-attribute="{{ $key }}"--}}
                                                                           {{--data-value="{{ $i }}"--}}
                                                                           {{--data-url="/catalog{{ $attribute_value['url'] }}"--}}
                                                                           {{--id="product-filter-{!! $key !!}__check-{!! $i !!}"--}}
                                                                           {{--class="checkbox"--}}
                                                                           {{--@if($attribute_value['checked'])--}}
                                                                           {{--checked--}}
                                                                           {{--@endif>--}}
                                                                    {{--<span class="checkbox-custom"></span>--}}
                                                                    {{--<label for="product-filter-{!! $key !!}__check-{!! $i !!}">{!! $attribute_value['name'] !!}</label>--}}
                                                                {{--</div>--}}
                                                            {{--@endif--}}
                                                        {{--@endforeach--}}
                                                    {{--</div>--}}
                                                    {{--@if(count($attr_values) >= 9)--}}
                                                        {{--<a href="#" class="show-more-filters">Показать Больше</a>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="aside-filter-menu-item-btn-toggle{{ $attribute['name'] == 'Тип' ? '' : ' filters-open' }}">--}}
                                                    {{--<div></div>--}}
                                                    {{--<div></div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-9 col-sm-8 col-xs-12 products-grid-container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12 margin" style="display: flex; justify-content: space-between; flex-wrap: wrap;">--}}
                            {{--<h1 class="title">--}}
                                {{--@if(!empty($seo))--}}
                                    {{--{!! $seo->name !!}--}}
                                {{--@else--}}
                                    {{--{!! $category->name or $category['name'] !!}--}}
                                {{--@endif--}}
                            {{--</h1>--}}
                            {{--<fieldset class="col-xs-8 sorting-dropdown chosen-select-prod-grid hidden-xs" style="max-width: 254px;">--}}
                                {{--<select name="sorting-select" class="chosen-select" id="sorting-select" data-chosen-settings='{"disable_search_threshold":10, "width":"100%"}'>--}}
                                    {{--<option value="date-desc"{{ isset($_GET['order']) && $_GET['order'] == 'date-desc' ? ' selected="selected"' : '' }}>От новых к старым</option>--}}
                                    {{--<option value="price-asc"{{ isset($_GET['order']) && $_GET['order'] == 'price-asc' ? ' selected="selected"' : '' }}>От дешевых к дорогим</option>--}}
                                    {{--<option value="price-desc"{{ isset($_GET['order']) && $_GET['order'] == 'price-desc' ? ' selected="selected"' : '' }}>От дорогих к дешевым</option>--}}
                                {{--</select>--}}
                            {{--</fieldset>--}}
                        {{--</div>--}}
                        {{--<div class="visible-xs-inline-block col-xs-12 no-padding">--}}
                            {{--<div class="product-filters-wrp">--}}
                                {{--<div class="row">--}}
                                    {{--<fieldset class="col-xs-8 sorting-dropdown chosen-select-prod-grid">--}}
                                        {{--<select name="sorting-select" class="chosen-select" id="sorting-select" data-chosen-settings='{"disable_search_threshold":10, "width":"100%"}'>--}}
                                            {{--<option value="date-desc"{{ isset($_GET['order']) && $_GET['order'] == 'date-desc' ? ' selected="selected"' : '' }}>От новых к старым</option>--}}
                                            {{--<option value="price-asc"{{ isset($_GET['order']) && $_GET['order'] == 'price-asc' ? ' selected="selected"' : '' }}>От дешевых к дорогим</option>--}}
                                            {{--<option value="price-desc"{{ isset($_GET['order']) && $_GET['order'] == 'price-desc' ? ' selected="selected"' : '' }}>От дорогих к дешевым</option>--}}
                                        {{--</select>--}}
                                    {{--</fieldset>--}}
                                    {{--<div class="col-xs-4 filter-menu">--}}
                                        {{--<i>&#xE80D</i><span> Фильтр</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--@if(empty($products))--}}
                            {{--<div class="col-md-12 margin">--}}
                                {{--<span>Нет таких товаров...</span>--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--@forelse($products as $key => $product)--}}
                                {{--<div class="col-lg-4 col-xs-6">--}}
                                    {{--<div class="grid-product-card card-margin">--}}
                                        {{--@include('public.layouts.product', ['product' => $product, 'slide' => false])--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@if(($key+1)%3 == 0 && ceil(count($products)/6) == ($key+1)/3)--}}
                                    {{--@include('public.layouts.banner')--}}
                                {{--@endif--}}
                            {{--@empty--}}
                                {{--<div class="col-md-12 margin">--}}
                                    {{--<span>Нет таких товаров...</span>--}}
                                {{--</div>--}}
                            {{--@endforelse--}}

                            {{--@if($products->count() < 3)--}}
                                {{--@include('public.layouts.banner')--}}
                            {{--@endif--}}

                            {{--@include('public.layouts.pagination', ['paginator' => $products])--}}
                        {{--@endif--}}

                        {{--<div class="col-sm-12 hidden-xs home-page-about-us-text">--}}
                            {{--@if($products->currentPage() == 1)--}}
                                {{--@if(!empty($seo))--}}
                                    {{--{!! $seo->description !!}--}}
                                {{--@else--}}
                                    {{--<span>О нас</span>--}}
                                    {{--{!! $settings->about !!}--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="visible-xs-inline-block col-xs-12">--}}
                            {{--<p class="sections-links-title">Разделы</p>--}}
                            {{--<ul class="sections-links">--}}
                                {{--<li><a href="{{env('APP_URL')}}/catalog/zhenskaya-obuv">Женская обувь</a> </li>--}}
                                {{--<li><a href="{{env('APP_URL')}}/catalog/muzhskaya-obuv">Мужская обувь</a></li>--}}
                                {{--<li><a href="{{env('APP_URL')}}/catalog/zhenskie-aksessuary">Аксессуары</a></li>--}}
                                {{--<li><a href="{{env('APP_URL')}}/catalog/uhod">Уход</a></li>--}}
                                {{--<li><a href="{{env('APP_URL')}}/brands">Бренды</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</main>--}}
@endsection