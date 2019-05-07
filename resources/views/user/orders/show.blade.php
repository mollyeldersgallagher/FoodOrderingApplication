@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order details</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Date</td>
                                <td>{{ $order->received_on }}</td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>{{ $order->customer->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Credit card</td>
                                <td>{{ $order->credit_card->number }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>&euro;{{ number_format($order->total(),2) }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->foods as $food)
                            <tr>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->description }}</td>
                                <td>{{ $food->diet->name }}</td>
                                <td>&euro;{{ number_format($food->cost,2) }}</td>
                                <td>{{ $food->pivot->quantity }}</td>
                                <td>&euro;{{ number_format($food->cost * $food->pivot->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
