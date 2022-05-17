<div>
    {{-- ubicacion para usar otros paginators a mano: vendor\laravel\framework\src\Illuminate\Pagination\resources\views\simple-bootstrap-5.blade.php --}}
    <div class="d-flex justify-content-center">
        @if ($users->hasPages())
            <nav role="navigation" aria-label="Pagination Navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($users->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">{!! __('X') !!}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="bg-dark page-link text-light" href="{{ $users->previousPageUrl() }}" rel="prev">
                                {!! __('<span class="fa-solid fa-arrow-left"></span> Anterior') !!}
                            </a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($users->hasMorePages())
                        <li class="page-item">
                            <a class="bg-dark page-link text-light" href="{{ $users->nextPageUrl() }}"
                                rel="next">{!! __('Siguiente <span class="fa-solid fa-arrow-right"></span>') !!}</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">{!! __('X') !!}</span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
    {{-- ubicacion para usar otros paginators a mano: vendor\laravel\framework\src\Illuminate\Pagination\resources\views\simple-bootstrap-5.blade.php --}}
</div>
