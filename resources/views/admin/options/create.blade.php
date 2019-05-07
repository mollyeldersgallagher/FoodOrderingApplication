@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add Options</h1>
        </div>
    </div>
    @component('components.options.form', [
        'role' => 'admin',
        'option' => null

    ])
    @endcomponent
</div>
@endsection
