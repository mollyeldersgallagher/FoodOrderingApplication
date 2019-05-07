@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Foods</h1>
            <p><a href="{{ route('admin.foods.create') }}" class="btn btn-primary">Add</a>

              <div class="table-responsive">
                  <table class="table">
                    <thread>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Allergies</th>
                        <th>Ingredients</th>
                        <th>Action</th>
                      </tr>
                    </thread>
                    <tbody>

                @foreach ($foods as $food)
                <tr>
                  <td> <img src="{{ asset('storage/'.$food->image )}}" width="150"/></td>
                  <td>{{ $food->name }}</td>
                  <td>{{ $food->description }}</td>
                  <td> &euro;{{ number_format($food->cost,2)}}</td>
                  <td>{{ $food->allergies }}</td>
                  <td>{{ $food->ingredients }}</td>
                  <td>
                  <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.foods.edit', $food) }}">Edit</a>
                  <a class="btn btn-outline-secondary btn-block mt-auto mb-1" href="{{ route('admin.foods.show', $food->id) }}"> View </a>
                  <form action="{{ route('admin.foods.destroy', $food)}}" method="POST">
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
</div>
@endsection
