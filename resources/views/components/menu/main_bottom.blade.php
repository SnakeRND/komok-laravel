<div class="cell">
    @foreach($items as $item)
        <a class="footer__link" href="{{ $item->link() }}">{{ $item->title }}</a>
    @endforeach
</div>
