@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>Foods {{ $option->name}}  {{ $diet->name}}</h1>
        </div>
    </div>
<div class="row">
    <div class="col-md-6">
      <div class="card">


        <div class="card-header text-white bg-success">Foods {{ $option->name}}  {{ $diet->name}}</div>

        <div class="card-body">

        <!-- componennts allow us to create a file we can reference and call,
        the reason behind this minamises the dupliacaction of code -->
        <!-- We pass different variables into components -->
        @component('components.foods.list', [
            'foods' => $foods,
            'role' => (Auth::user()) ? Auth::user()->getRoleName() : "guest",
            'option' => $option,
            'diet' => $diet
        ])
        @endcomponent
      </div>
    </div>
    </div>


    <div class="col-md-6">
      @component('components.foods.basket', [
          'basket' => $basket
      ])
      @endcomponent
    </div>

  </div>
</div>
@endsection
