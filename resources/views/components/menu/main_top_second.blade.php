<div class="nav__bottom">
    @foreach($items as $item)
        <a class="nav__bottom-link" href="{{ $item->link() }}">{{ $item->title }}</a>
    @endforeach
</div>
