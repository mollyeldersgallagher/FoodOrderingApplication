@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('user.orders.index') }}">Orders</a>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Address</th>
                                <td>{{ $user->customer->address }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $user->customer->phone }}</td>
                            </tr>

                            <tr>
                                <th>Credit cards</th>
                                <td>
                                    @if (count($user->customer->credit_cards) > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Expiry</th>
                                                <th>CVV</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->customer->credit_cards as $card)
                                            <tr>
                                                <td>{{ $card->name }}</td>
                                                <td>{{ $card->number }}</td>
                                                <td>{{ $card->expiry }}</td>
                                                <td>{{ $card->cvv }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
