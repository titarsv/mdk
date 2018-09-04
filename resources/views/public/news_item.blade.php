@extends('public.layouts.main')
@section('meta')
    <title>{!! $article->meta_title !!}</title>
    <meta name="description" content="{!! $article->meta_description !!}">
    <meta name="keywords" content="{!! $article->meta_keywords !!}">
    @if(!empty($article->robots))
        <meta name="robots" content="{!! $article->robots !!}">
    @endif
@endsection

@section('content')
    <section>
        <div class="container-fluid delivery-container">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    <ul class="breadcrambs">
                        {!! Breadcrumbs::render('news_item', $article) !!}
                    </ul>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="main-title">{{ $article->title }}</p>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="article-body">
                        <img src="{{ $article->image->url() }}" alt="{{ $article->title }}">
                        <p class="acticle-body__date">
                            {!! date('d.m.Y', strtotime($article->created_at)) !!}
                        </p>
                        <div class="acticle-body__text">
                            {!! html_entity_decode($article->text) !!}
                        </div>
                    </div>
                    <div class="article-nav">
                        @if($prev)
                            <a href="{{env('APP_URL')}}/news/{!!$prev->url_alias !!}" class="article-prev">← Предыдущая статья</a>
                        @endif
                        @if($next)
                            <a href="{{env('APP_URL')}}/news/{!!$next->url_alias !!}" class="article-next">Следующая статья →</a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <form class="subscribe__form ajax_form"
                          data-error-title="Ошибка отправки!"
                          data-error-message="Попробуйте подписаться заявку через некоторое время."
                          data-success-title="Спасибо за подписку!"
                          data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                        <p>Подпишитесь на наши новости
                            и получите скидку <span>5%</span>
                            на следующею покупку</p>
                        <input type="email" name="email" placeholder="Ваш e-mail" data-title="Email" data-validate-required="Обязательное поле" data-validate-email="Неправильный email">
                        <button type="submit">Подписаться</button>
                    </form>
                    @if(!empty($random))
                        <p class="article-aside-title">Похожие статьи</p>
                        <div class="acticle-slider__item">
                            <div class="acticle-slider__item-img">
                                <a href="{{env('APP_URL')}}/news/{!!$random->url_alias !!}">
                                    <img src="{!! $random->image->url('blog_list') !!}" alt="{!! $random->title !!}">
                                </a>
                            </div>
                            <div class="acticle-slider__item-text-wrp">
                                <p class="acticle-slider__item-date">
                                    {!! date('d.m.Y', strtotime($random->created_at)) !!}
                                </p>
                                <p class="acticle-slider__item-title">
                                    {!! $random->title !!}
                                </p>
                                <p class="acticle-slider__item-text">
                                    {!! $random->subtitle !!}
                                </p>
                                <a href="{{env('APP_URL')}}/news/{!!$random->url_alias !!}">
                                    <p class="acticle-slider__item-btn">Подробнее →</p>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection