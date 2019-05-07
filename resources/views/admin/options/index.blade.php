@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Options</h1>
            <p><a href="{{ route('admin.options.create') }}" class="btn btn-primary">Add New Option</a>
              <table class="table table-hover">
                  <thead>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Cost</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach($options as $option)
                        <tr>
                            <td><img src="{{ asset('storage/'. $option->image)}}" width="20%" /></td>
                            <td><h5 class="card-title">{{ $option->name }}</h5></td>
                            <td><h5 class="card-title"> &euro;{{ number_format($option->cost,2) }}</h5></td>
                            <td>
                                <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.options.edit', $option) }}">Edit</a>
                                <form action="{{ route('admin.options.destroy', $option)}}" method="POST">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button class="btn btn-danger btn-block">Delete</button>
                                </form>
                            </td>
                       </tr>
                      @endforeach
                 </tbody>
               </table>
        </div>
    </div>
</div>
@endsection
