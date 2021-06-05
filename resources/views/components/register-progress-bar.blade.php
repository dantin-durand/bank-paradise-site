@props(['items', 'itemsMax'])

<div class="auth__progress-bar">
    @for ($i = 0; $i < $itemsMax; $i++) @if ($i <$items) <div class="active">
</div>
@else
<div></div>
@endif
@endfor

</div>