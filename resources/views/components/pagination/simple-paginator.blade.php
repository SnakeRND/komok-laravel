@if ($paginator && $paginator->lastPage() != 1)
    <ul class="pagination" id="pagination">
        @if (!request()->has('page') || request()->query('page') <= 1)
            <li class="pagination-previous disabled">Назад</li>
        @else
            <li class="pagination-previous">
                <a
                    href="{{ request()->fullUrlWithQuery(['page' => (request()->query('page')-1)]) . '#pagination' }}"
                    title=""
                    aria-label="Предыдущая страница"
                >
                    Назад
                </a>
            </li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $page)
            @if (request()->query('page') == $page)
                <li class="current">
                    <span class="show-for-sr">Вы на странице</span> {{ $page }}
                </li>
            @else
                @if (request()->has('page'))
                    <li class="pagination">
                        <a href="{{ request()->fullUrlWithQuery(['page' => $page]) . '#pagination'}}" title="" aria-label="Страница {{ $page }}">
                            {{ $page }}
                        </a>
                    </li>
                @else
                    @if ($page <= 1)
                        <li class="current">
                            <span class="show-for-sr">Вы на странице</span> {{ $page }}
                        </li>
                    @else
                        <li class="pagination">
                            <a href="{{ request()->fullUrlWithQuery(['page' => $page]) . '#pagination'}}" title="" aria-label="Страница {{ $page }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endif
            @endif
        @endforeach
        @if ($paginator->lastPage() == 1 || request()->query('page') == $paginator->lastPage())
            <li class="pagination-next disabled">Дальше</li>
        @else
            <li class="pagination-next">
                @php
                    $incr = request()->has('page') ? 1 : 2
                @endphp
                <a
                    href="{{ request()->fullUrlWithQuery(['page' => (request()->query('page')+$incr)]) . '#pagination' }}"
                    title=""
                    aria-label="Следующая страница"
                >
                    Дальше
                </a>
            </li>
        @endif
    </ul>
@endif
