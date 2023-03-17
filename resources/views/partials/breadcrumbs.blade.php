@if (count($breadcrumbs))

    <div class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <a class="breadcrumbs__item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            @else
                <span class="breadcrumbs__item breadcrumbs__item_active">{{ $breadcrumb->title }}</span>
            @endif

        @endforeach
    </div>

@endif
