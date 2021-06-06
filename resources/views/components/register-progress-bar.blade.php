@props(['items', 'itemsMax'])

<div class="auth__progress-bar">
    @for ($i = 0; $i < $itemsMax; $i++) @if ($i <$items) <a href="{{$i === 0 ? '/register' : '/register/step' . $i + 1 }}">
        <div class="active"></div>
        </a>


        @else
        <a href="/register/step{{ $i + 1 }}">
            <div></div>
        </a>
        @endif
        @endfor

</div>