@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Admin Dashboard</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a type="button" class="btn btn-primary" href="{{ route('admin.foods.index')}}">Foods</a>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.orders.index')}}">Orders</a>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.diets.index')}}">Diets</a>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.options.index')}}">Options</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
