@if ($paginator->hasPages())
<nav aria-label="Page navigation" class="mt-3 mb-1">
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item prev">
                <a class="page-link" href="#" tabindex="-1">
                    <iconify-icon icon="bx:chevrons-left" class="tf-icon bx" ></iconify-icon>
                </a>
            </li>
        @else
            <li class="page-item prev">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <iconify-icon icon="bx:chevrons-left" class="tf-icon bx" ></iconify-icon>
                </a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">
                    {{ $element }}
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <iconify-icon icon="bx:chevrons-right" class="tf-icon bx" ></iconify-icon>
                </a>
            </li>
        @else
            <li class="page-item next">
                <a class="page-link" href="#">
                    <iconify-icon icon="bx:chevrons-right" class="tf-icon bx" ></iconify-icon>
                </a>
            </li>
        @endif
    </ul>
</nav>
@endif
