@foreach ($diets as $diet)
    @if ($loop->index % 3 == 0)
    <div class="row">
    @endif
    @component('components.diets.card', [
        'diet' => $diet,
        'role' => $role,
    ])
    @endcomponent
    @if ($loop->index % 3 == 2 || $loop->last)
    </div>
    @endif
@endforeach
