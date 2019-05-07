@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Diets</h1>
            <p><a href="{{ route('admin.diets.create') }}" class="btn btn-primary">Add New Diet</a>
              <table class="table table-hover">
                  <thead>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach($diets as $diet)
                        <tr>
                            <td><img src="{{ asset('storage/'. $diet->image)}}" width="20%" /></td>
                            <td><h5 class="card-title">{{ $diet->name }}</h5></td>
                            <td>
                                <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.diets.edit', $diet) }}">Edit</a>
                                <form action="{{ route('admin.diets.destroy', $diet)}}" method="POST">
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
