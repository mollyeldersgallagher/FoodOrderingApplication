@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Option</h1>
        </div>
    </div>
    @component('components.options.form', [
        'role' => 'admin',
        'option' => $option
    ])
    @endcomponent
</div>
@endsection
