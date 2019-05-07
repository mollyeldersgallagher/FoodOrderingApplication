@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add food</h1>
        </div>
    </div>
    @component('components.foods.form', [
        'role' => 'admin',
        'diets' => $diets,
        'food' => null

    ])
    @endcomponent
</div>
@endsection
