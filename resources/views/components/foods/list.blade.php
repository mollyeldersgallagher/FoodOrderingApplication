@foreach ($foods as $food)
    @if ($loop->index % 2 == 0)
    <!-- food list is a class I compiled in sass -->
    <div class="list-food">
    @endif
    @component('components.foods.card', [
        'food' => $food,
        'option' => $option,
        'role' => $role,
    ])
    @endcomponent
    @if ($loop->index % 2 == 1 || $loop->last)
    </div>
    @endif
@endforeach
