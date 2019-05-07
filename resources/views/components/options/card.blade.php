<div class="card card-food">
    @if ($role == 'admin')
    <a href="{{ route('admin.options.show', $option->id) }}">
    @elseif ($role == 'guest' || $role == 'user')
    <a href="{{ route('options.show', $option->id) }}">
    @endif

    </a>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $option->name }}</h5>
        <img src="{{ asset($option->image)}}" class="img-fluid" /><br/>
        <p>{{ $option->cost }}</p>
        @if ($role == 'admin')
        <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.options.edit', $option) }}">Edit</a>
        <form action="{{ route('admin.options.destroy', $option)}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger btn-block">Delete</button>
        </form>

        @endif
    </div>
</div>
