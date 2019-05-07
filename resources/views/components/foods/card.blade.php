<div class="card card-food">
  
    @if ($role == 'admin')
    <a href="{{ route('admin.foods.show', $food->id) }}">
    @elseif ($role == 'guest' || $role == 'user')
    <a href="{{ route('foods.show', $food->id) }}">
    @endif

    </a>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $food->name }}</h5>
        <img src="{{ asset('storage/'.$food->image)}}" class="img-fluid" /><br/>
        <p class="card-text">{{ $food->description }}</p>
        <p class="card-text">Cost: &euro;{{ number_format($food->cost,2) }}</p>
        <p class="card-text">{{ $food->allergies }}</p>
        <p class="card-text">{{ $food->ingredients }}</p>
        @if ($role == 'admin')
        <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.foods.edit', $food) }}">Edit</a>
        <form action="{{ route('admin.foods.destroy', $food)}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger btn-block">Delete</button>
        </form>
        @elseif ($role == 'guest' || $role == 'user')
        <form class="mt-auto" action="{{ route('basket.add')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="food_id" value="{{ $food->id }}">
            <input type="hidden" name="option_id" value="{{ $option->id }}">
            <button class="btn btn-success btn-block">Add to basket</button>
        </form>
        @endif
    </div>
</div>
