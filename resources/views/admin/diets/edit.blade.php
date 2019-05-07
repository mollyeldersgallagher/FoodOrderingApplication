@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Diet</h1>
        </div>
    </div>
    @component('components.diets.form', [
        'role' => 'admin',
        'diet' => $diet
    ])
    @endcomponent
</div>
@endsection
