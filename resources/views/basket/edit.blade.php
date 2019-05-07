@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit shopping basket</div>

                <div class="card-body">
                    @if ($basket->isEmpty())
                    <p>There are no items in your shopping basket</p>
                    @else
                    <form method="POST" action="{{ route('basket.update') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Item</th>
                                    <th>description</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($basket->getItems() as $item)
                                <tr>
                                  <!-- <input type="hidden" id="option-id" name="option_id" value="{{ $item->getOption()->id }}"> -->
                                    <td>{{ $item->getOption()->name }}</td>
                                    <td>{{ $item->getFood()->name }}</td>
                                    <td>{{ $item->getFood()->description }}</td>
                                    <td>{{ number_format($item->getFood()->cost, 2) }}</td>
                                    <!-- here we have set the name of the input field to the food id anf otion id
                                    so we can explode this string to an array and access the food and option associated with this quantity -->
                                    <td><input type="text" name="quantity[{{ $item->getFood()->id }}-{{ $item->getOption()->id }}]" value="{{ $item->getQuantity() }}" /></td>

                                    <td>{{ number_format($item->getTotalPrice(), 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>Total price: {{ $basket->getTotalPrice() }}</p>
                        <p><button class="btn" type="submit">Update</button></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
