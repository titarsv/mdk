@if ($paginator->lastPage() > 1)
    {{--@if($paginator->currentPage() < $paginator->lastPage())--}}
        {{--<div class="col-xs-12">--}}
            {{--<a href="{{ $cp->url($paginator->url($paginator->currentPage()+1), $paginator->currentPage()+1) }}" class="show-more-btn margin" id="#more_products">--}}
                {{--<p>Показать еще</p>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--@endif--}}
    @if($paginator->lastPage() <= 11)

        @for ($c=1; $c<=$paginator->lastPage(); $c++)
            <li><a href="{{ $cp->url($paginator->url($c), $c) }}"><p class="{{ ($paginator->currentPage() == $c) ? 'active' : '' }}">{{ $c }}</p></a></li>
        @endfor

    @elseif($paginator->currentPage() < 7)

        @for ($c=1; $c<=10; $c++)
            <li><a href="{{ $cp->url($paginator->url($c), $c) }}"><p class="{{ ($paginator->currentPage() == $c) ? 'active' : '' }}">{{ $c }}</p></a></li>
        @endfor

        @if($paginator->lastPage() >= 20)
            <li><a href="{{ $cp->url($paginator->url(($paginator->lastPage()-10)/2 + 10 - ($paginator->lastPage()-10)%2/2), ($paginator->lastPage()-10)/2 + 10 - ($paginator->lastPage()-10)%2/2) }}"><p class="{{ ($paginator->currentPage() == ($paginator->lastPage()-10)/2 + 10 - ($paginator->lastPage()-10)%2/2) ? 'active' : '' }}">{{ ($paginator->lastPage()-10)/2 + 10 - ($paginator->lastPage()-10)%2/2 }}</p></a></li>
        @endif

        <li><a href="{{ $cp->url($paginator->url($paginator->lastPage()), $paginator->lastPage()) }}"><p class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'active' : '' }}">{{ $paginator->lastPage() }}</p></a></li>

    @elseif($paginator->currentPage() > ($paginator->lastPage()-6))

        <li><a href="{{ $cp->url($paginator->url(1), 1) }}"><p class="{{ ($paginator->currentPage() == 1) ? 'active' : '' }}">{{ 1 }}</p></a></li>

        @if($paginator->lastPage() >= 20)
            <li><a href="{{ $cp->url($paginator->url(($paginator->lastPage()-8)/2 - ($paginator->lastPage()-10)%2/2), ($paginator->lastPage()-8)/2 - ($paginator->lastPage()-10)%2/2) }}"><p class="{{ ($paginator->currentPage() == ($paginator->lastPage()-8)/2 - ($paginator->lastPage()-10)%2/2) ? 'active' : '' }}">{{ ($paginator->lastPage()-8)/2 - ($paginator->lastPage()-10)%2/2 }}</p></a></li>
        @endif

        @for ($c=($paginator->lastPage()-9); $c<=$paginator->lastPage(); $c++)
            <li><a href="{{ $cp->url($paginator->url($c), $c) }}"><p class="{{ ($paginator->currentPage() == $c) ? 'active' : '' }}">{{ $c }}</p></a></li>
        @endfor

    @else

        <li><a href="{{ $cp->url($paginator->url(1), 1) }}"><p class="{{ ($paginator->currentPage() == 1) ? 'active' : '' }}">{{ 1 }}</p></a></li>

        @if($paginator->currentPage() > 10)
            <li><a href="{{ $cp->url($paginator->url(($paginator->currentPage()-3)/2 - ($paginator->currentPage()-3)%2/2), ($paginator->currentPage()-3)/2 - ($paginator->currentPage()-3)%2/2) }}"><p class="{{ ($paginator->currentPage() == ($paginator->currentPage()-3)/2 - ($paginator->currentPage()-3)%2/2) ? 'active' : '' }}">{{ ($paginator->currentPage()-3)/2 - ($paginator->currentPage()-3)%2/2 }}</p></a></li>
        @endif

        @for ($c=($paginator->currentPage()-4); $c<=($paginator->currentPage()+4); $c++)
            <li><a href="{{ $cp->url($paginator->url($c), $c) }}"><p class="{{ ($paginator->currentPage() == $c) ? 'active' : '' }}">{{ $c }}</p></a></li>
        @endfor

        @if($paginator->currentPage() < $paginator->lastPage()-10)
            <li><a href="{{ $cp->url($paginator->url(($paginator->lastPage()-$paginator->currentPage() -4)/2 + $paginator->currentPage() + 4 - ($paginator->lastPage()-$paginator->currentPage() -4)%2/2), ($paginator->lastPage()-$paginator->currentPage() -4)/2 + $paginator->currentPage() + 4 - ($paginator->lastPage()-$paginator->currentPage() -4)%2/2) }}"><p class="{{ ($paginator->currentPage() == (($paginator->lastPage()-$paginator->currentPage() -4)/2 + $paginator->currentPage() + 4 - ($paginator->lastPage()-$paginator->currentPage() -4)%2/2)) ? 'active' : '' }}">{{ ($paginator->lastPage()-$paginator->currentPage() -4)/2 + $paginator->currentPage() + 4 - ($paginator->lastPage()-$paginator->currentPage() -4)%2/2 }}</p></a></li>
        @endif

        <li><a href="{{ $cp->url($paginator->url($paginator->lastPage()), $paginator->lastPage()) }}"><p class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'active' : '' }}">{{ $paginator->lastPage() }}</p></a></li>

    @endif
@endif