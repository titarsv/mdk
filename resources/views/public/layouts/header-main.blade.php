<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="visible-sm-block col-sm-12 hidden-xs">
                <div class="header__logo">
                    @if(Request::path()=='/')
                        <img src="/images/logo1.png" alt="MDK">
                    @else
                        <a href="{{env('APP_URL')}}"><img src="/images/logo1.png" alt="MDK"></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row header-inform-container underline">
            <div class="col-sm-3 col-xs-12">
                <ul class="header__time-information">
                    <li><img src="/images/icons/1.png" alt=""></li>
                    <li>Время работы колл центра: <span>с 09:00 до 17:00 ПН-ПТ </span></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <div class="header__phone">
                    <img src="/images/icons/2.png" alt="">
                    <ul>
                        {{--<a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $settings->main_phone_1) }}">{{ $settings->main_phone_1 }}</a>--}}
                        <li><a href="tel:(050) 162 08 88">(050) 162 08 88</a></li>
                        <li><a href="tel:(067) 800 10 77">(067) 800 10 77</a></li>
                        <li><a href="tel:(044) 333 71 09">(044) 333 71 09</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2 hidden-sm hidden-xs">
                <div class="header__logo">
                    @if(Request::path()=='/')
                        <img src="/images/logo.png" alt="MDK">
                    @else
                        <a href="{{env('APP_URL')}}"><img src="/images/logo.png" alt="MDK"></a>
                    @endif
                </div>
            </div>
            <div class="visible-xs-block col-xs-12">
                <div class="header__logo">
                    @if(Request::path()=='/')
                        <img src="/images/logo.png" alt="MDK">
                    @else
                        <a href="{{env('APP_URL')}}"><img src="/images/logo.png" alt="MDK"></a>
                    @endif
                </div>
            </div>
            <div class="col-md-5 col-sm-6 hidden-xs header-info">
                {!! Form::open(['route' => 'search', 'class' => 'header__searcher', 'method' => 'post']) !!}
                    {!! Form::input('search', 'text', null, ['class' => 'header__searcher-input', 'placeholder' => 'ПОИСК'] ) !!}
                    <button type="submit"></button>
                {!! Form::close()!!}
                @if($user_logged)
                    <a href="{{env('APP_URL')}}/user/wishlist">
                        <ul class="header__like">
                            <li>Избранное</li>
                            <li><img src="/images/icons/heart.png" alt="Избранное"></li>
                            @if(!empty($wishlist) && !empty($wishlist->count()))
                                <li class="in-cart">{{ $wishlist->count() }}</li>
                            @endif
                        </ul>
                    </a>
                    @if (in_array('admin', $user_roles) || in_array('manager', $user_roles))
                        <a href="{{env('APP_URL')}}/admin">
                            <ul class="header__profile">
                                <li>Кабинет</li>
                                <li><img src="/images/icons/4.png" alt="Кабинет"></li>
                            </ul>
                        </a>
                    @else
                        <a href="{{env('APP_URL')}}/user">
                            <ul class="header__profile">
                                <li>Кабинет</li>
                                <li><img src="/images/icons/4.png" alt="Кабинет"></li>
                            </ul>
                        </a>
                    @endif
                @else
                    <a href="#" class="popup-btn" data-mfp-src="#logIn-popup">
                        <ul class="header__profile">
                            <li>Вход</li>
                            <li><img src="/images/icons/4.png" alt="Вход"></li>
                        </ul>
                    </a>
                @endif
                <a href="{{env('APP_URL')}}/cart">
                    <ul class="header__cart">
                        <li>Корзина</li>
                        <li><img src="/images/icons/5.png" alt="Корзина"></li>
                        @if(isset($cart) && $cart->total_quantity)
                            <li class="in-cart">{{ $cart->total_quantity }}</li>
                        @endif
                    </ul>
                </a>
            </div>
            <div class="visible-xs-block col-xs-12">
                <div class="mobile-nav">
                    <div class="burger-menu__wrp">
                        <div class="burger-menu"></div>
                        <p>меню</p>
                    </div>
                    <div class="mobile-nav__enter">
                        @if($user_logged)
                            @if (in_array('admin', $user_roles) || in_array('manager', $user_roles))
                                <a href="{{env('APP_URL')}}/admin">
                                    <ul class="header__profile">
                                        <li>Кабинет</li>
                                        <li><img src="/images/icons/4.png" alt=""></li>
                                    </ul>
                                </a>
                            @else
                                <a href="{{env('APP_URL')}}/user">
                                    <ul class="header__profile">
                                        <li>Кабинет</li>
                                        <li><img src="/images/icons/4.png" alt=""></li>
                                    </ul>
                                </a>
                            @endif
                        @else
                            <a href="#" class="popup-btn" data-mfp-src="#logIn-popup">
                                <ul class="header__profile">
                                    <li>Вход</li>
                                    <li><img src="/images/icons/4.png" alt=""></li>
                                </ul>
                            </a>
                        @endif
                        <a href="{{env('APP_URL')}}/cart">
                            <ul class="header__cart">
                                <li>Корзина</li>
                                <li><img src="/images/icons/5.png" alt=""></li>
                                @if(isset($cart) && $cart->total_quantity)
                                    <li class="in-cart">{{ $cart->total_quantity }}</li>
                                @endif
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu close">
            <div class="mobile-menu__close"></div>
            <div class="panel-group" id="accordion-menu">
                @foreach($categories->where('name', 'Женское')->first()->children as $i => $children)
                    <div>
                        <h4 class="mobile-menu__title accordion__title">
                            <a data-toggle="collapse" data-parent="#accordion-menu" href="#collapsew{{ $i }}">{{ mb_strtoupper($children->name) }} ДЛЯ ЖЕНЩИН</a>
                        </h4>
                        <div id="collapsew{{ $i }}" class="mobile-menu__collapse collapse">
                            <div class="mobile-menu__body">
                                <ul class="mobile-menu__links">
                                    @foreach($children->children as $children2)
                                        <li><a href="{{ $children2->url_alias }}">{{ $children2->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($categories->where('name', 'Мужское')->first()->children as $i => $children)
                    <div>
                        <h4 class="mobile-menu__title accordion__title">
                            <a data-toggle="collapse" data-parent="#accordion-menu" href="#collapsem{{ $i }}">{{ mb_strtoupper($children->name) }} ДЛЯ МУЖЧИН</a>
                        </h4>
                        <div id="collapsem{{ $i }}" class="mobile-menu__collapse collapse">
                            <div class="mobile-menu__body">
                                <ul class="mobile-menu__links">
                                    @foreach($children->children as $children2)
                                        <li><a href="{{ $children2->url_alias }}">{{ $children2->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <h4 class="mobile-menu__title accordion__title">
                        <a data-toggle="collapse" data-parent="#accordion-menu" href="#collapseThree">Другое</a>
                    </h4>
                    <div id="collapseThree" class="mobile-menu__collapse collapse">
                        <!-- Содержимое 3 панели -->
                        <div class="mobile-menu__body">
                            <ul class="mobile-menu__links">
                                @foreach($categories->where('name', 'Другое')->first()->children as $children2)
                                    <li><a href="{{ $children2->url_alias }}">{{ $children2->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row underline">
            <nav class="hidden-xs header__navigation">

                <div class="header__navigation-item">
                    <a href="{{env('APP_URL')}}/catalog/zhenskoe">Женщины</a>
                    <div class="header__navigation-page">
                        <ul class="header__navigation-page-category">
                            @php
                                $cats = $categories->where('name', 'Женское')->first()->children->union($categories->where('name', 'Другое'));
                            @endphp
                            @foreach($cats as $children)
                                <li>
                                    <a href="{{ $children->url_alias }}">{{ mb_strtoupper($children->name) }}</a>
                                    <div class="header__navigation-page-links">
                                        <ul>
                                            @foreach($children->children as $children2)
                                                @php
                                                    $image = $children2->image;
                                                    if($image->id == 1){
                                                        $img = '';
                                                    }else{
                                                        $img = $image->url();
                                                    }
                                                @endphp
                                                <li><a href="{{ $children2->url_alias }}" data-toggle="{{ $img }}">{{ $children2->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @php
                                            $image = $children->image;
                                            if($image->id == 1){
                                                $img = '';
                                            }else{
                                                $img = $image->url();
                                            }
                                        @endphp
                                        <div class="header__navigation-page-links-img" style="background-image: url('{{ $img }}')"></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="header__navigation-item">
                    <a href="{{env('APP_URL')}}/catalog/muzhskoe">Мужчины</a>
                    <div class="header__navigation-page">
                        <ul class="header__navigation-page-category">
                            @php
                                $cats = $categories->where('name', 'Мужское')->first()->children->union($categories->where('name', 'Другое'));
                            @endphp
                            @foreach($cats as $children)
                                <li>
                                    <a href="{{ $children->url_alias }}">{{ mb_strtoupper($children->name) }}</a>
                                    <div class="header__navigation-page-links">
                                        <ul>
                                            @foreach($children->children as $children2)
                                                @php
                                                    $image = $children2->image;
                                                    if($image->id == 1){
                                                        $img = '';
                                                    }else{
                                                        $img = $image->url();
                                                    }
                                                @endphp
                                                <li><a href="{{ $children2->url_alias }}" data-toggle="{{ $img }}">{{ $children2->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @php
                                            $image = $children->image;
                                            if($image->id == 1){
                                                $img = '';
                                            }else{
                                                $img = $image->url();
                                            }
                                        @endphp
                                        <div class="header__navigation-page-links-img" style="background-image: url('{{ $img }}')"></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="header__navigation-item">
                    <a href="#">Распродажа</a>
                </div>

                <div class="header__navigation-item">
                    <a href="#">Акции</a>
                </div>

                <div class="header__navigation-item">
                    <a href="{{env('APP_URL')}}/page/contact">Контакты</a>
                </div>

            </nav>
        </div>
    </div>
</header>
