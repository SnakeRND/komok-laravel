<div class="footer__soc">
    @foreach($items as $item)
        <a class="footer__soc-link" href="{{ $item->link() }}" target="_blank">{{ $item->title }}</a>
    @endforeach
</div>
