@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admins Orders</div>

                <div class="card-body">
                  <table class="table table-hover">
                    <thread>
                      <tr>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thread>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <td>{{ $order->received_on}}</td>
                        <td>{{ $order->customer->user->name}}</td>
                        <td>{{ number_format($order->total(),2)}}</td>
                        <td>{{ $order->status }}</td>
                        <td> <a href="{{ route('admin.orders.show', $order)}}">View</a></td>
                        <td>  <form action="{{ route('admin.orders.destroy', $order)}}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button class="btn btn-danger btn-block">Delete</button>
                          </form></td>
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
