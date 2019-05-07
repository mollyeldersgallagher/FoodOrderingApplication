@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>
                Options details
                <form class="form-inline float-right" action="{{ route('admin.options.destroy', $option)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-outline-secondary mr-2" href="{{ route('admin.options.edit', $option) }}">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </form>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.options.detail', [
                'options' => $options
            ])
            @endcomponent
        </div>
    </div>
</div>
@endsection
