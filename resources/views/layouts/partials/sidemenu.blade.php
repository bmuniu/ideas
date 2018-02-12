<div class="list-group">
    @if (count($menu))
        @foreach($menu as $item)

            <a href="{{ url($item->url) }}" class="list-group-item {{ ($item->url == $active_route->uri) ? 'active' : '' }}">
                <i class="fa {{ $item->icon }}"></i> {{ $item->name }}</a>

        @endforeach
    @endif
</div>