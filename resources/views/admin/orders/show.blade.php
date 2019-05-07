@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Details</div>

                <div class="card-body">
                    <table>
                      <tbody>
                        <tr>
                            <td>Date</td>
                            <td>{{ $order->recieved_on }}</td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>{{ $order->customer->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{ $order->total() }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $order->status }}</td>
                        </tr>

                      </tbody>
                    </table>
                    <hr/>
                    <table>
                      <thread>
                        <tr>
                          <th>Food Item</th>
                          <th>Description</th>
                          <th>type</th>
                          <th>ingredients</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thread>
                      <tbody>
                          @foreach ($order->foods as $food)
                          <tr>
                              <td>{{ $food->name }}</td>
                              <td>{{ $food->description }}</td>
                              <td>{{ $food->type }}</td>
                              <td>{{ $food->ingredients }}</td>
                              <td>{{ $food->pivot->quantity }}</td>
                              <td>{{ number_format($food->cost * $food->pivot->quantity, 2) }}</td>
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
