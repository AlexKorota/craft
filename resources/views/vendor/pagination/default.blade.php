@if ($paginator->hasPages())
    <div class="pagination-wrapper m-t-10 m-l-20 m-r-20">
        <nav class="pagination is-centered">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous"><span>&laquo;</span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev">&laquo;</a>
        @endif
        <ul class="pagination-list">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pagination-ellipsis"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="pagination-link is-current">{{ $page }}</a>
                        </li>
                    @else
                        <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" rel="next">&raquo;</a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next">&raquo;</a>
        @endif
        </nav>
    </div>
@endif
