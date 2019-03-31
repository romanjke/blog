{{ Form::open(['route' => $route, 'method' => $method, 'onsubmit' => 'return confirm("Are you sure?")']) }}
    <button type="submit" class="{{ join(' ', $attributes) }}">
    @if ($fa_icon)
        <i class="fa {{ $fa_icon }}"></i>
    @endif
        {{ $text }}
    </button>
{{ Form::close() }}