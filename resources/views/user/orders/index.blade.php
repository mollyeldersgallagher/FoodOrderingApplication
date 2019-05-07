@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders (User view)</div>

                <div class="card-body">
                    @if ($orders->count() == 0)
                    <p>You have no orders</p>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Credit card</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->received_on }}</td>
                                <td>{{ $order->customer->user->name }}</td>
                                <td>{{ $order->credit_card->number }}</td>
                                <td> &euro;{{ number_format($order->total(), 2) }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{ route('user.orders.show', $order ) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
