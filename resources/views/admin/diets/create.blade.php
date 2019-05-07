@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add A New Diet</h1>
        </div>
    </div>
    @component('components.diets.form', [
        'role' => 'admin',
        'diet' => null
    ])
    @endcomponent
</div>
@endsection
