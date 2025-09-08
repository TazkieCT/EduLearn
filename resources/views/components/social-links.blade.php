<div class="flex space-x-4">
    @foreach($links as $link)
        <a href="{{ $link['url'] }}" target="_blank" class="hover:text-white transition" aria-label="{{ $link['name'] }}">
            {!! $link['icon'] !!}
        </a>
    @endforeach
</div>
