@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>
                food details
                <form class="form-inline float-right" action="{{ route('admin.foods.destroy', $food)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-outline-secondary mr-2" href="{{ route('admin.foods.edit', $food) }}">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </form>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.foods.detail', [
            'food' => $food,
            'option' => $option
            ]
            @endcomponent
        </div>
    </div>
</div>
@endsection
