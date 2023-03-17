<div class="nav__top">
    @foreach($items as $item)
        <a class="nav__top-link" href="{{ $item->link() }}">{{ $item->title }}</a>
    @endforeach
</div>
