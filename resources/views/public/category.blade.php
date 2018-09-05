@extends('public.layouts.main', ['pagination' => $products, 'root_category' => is_object($category) ? $category->get_root_category() : 0 ])
@section('meta')
    <title>
        @if(empty($category))
            Акции
        @elseif(empty($category->meta_title)))
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

    <meta name=description content="{!! $category->meta_description or '' !!}"/>
    <meta property=og:site_name content="Мир дубленок и кожи">
    <meta property=og:title content="
         @if(empty($category))
            Акции
        @elseif(empty($category->meta_title)))
            {!! $category->name !!}}
        @else
            {!! $category->meta_title !!}
        @endif
            | Мир дубленок и кожи
        @if(!empty($products) && $products->currentPage() > 1) - Страница {!! $products->currentPage() !!}@endif
    "/>
    <meta property=og:url content="https://mdk.ua/">

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
                    <p class="category-title">{{ is_object($category) ? $category->name : 'Акции' }}</p>
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
@endsection