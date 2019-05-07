@foreach ($options as $option)
    @if ($loop->index % 2 == 0)
    <div class="list-food">
    @endif
    @component('components.options.card', [
        'option' => $option,
        'role' => $role,
    ])
    @endcomponent
    @if ($loop->index % 2 == 1 || $loop->last)
    </div>
    @endif
@endforeach
