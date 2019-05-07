@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>
                food details
                <form class="form-inline float-right" action="{{ route('basket.add')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                    <input type="hidden" name="option_id" value="{{ $option->id }}">
                    <button class="btn btn-success">Add to Basket</button>
                </form>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.foods.detail', [
                'food' => $food
            ])
            @endcomponent
        </div>
    </div>
</div>
@endsection
