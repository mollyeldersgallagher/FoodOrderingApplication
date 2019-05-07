@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shopping basket</div>

                <div class="card-body">
                    @if ($basket->isEmpty())
                    <p>There are no items in your shopping basket</p>
                    @else
                    <p>
                      <a type ="button" class="btn" href="{{ route( 'basket.edit' ) }}">Edit basket</a>
                      <a type ="button" class="btn" href="{{ route( 'basket.checkout' ) }}">Checkout</a>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Type</th>
                                <th>Food Item</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th style="text-align: right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($basket->getItems() as $item)
                            <tr>
                                <td>{{ $item->getOption()->name }}</td>
                                <td>{{ $item->getFood()->diet->name }}</td>
                                <td>{{ $item->getFood()->name }}</td>
                                <td>{{ $item->getFood()->description }}</td>
                                <td>{{ number_format($item->getFood()->cost, 2) }}</td>
                                <td>{{ $item->getQuantity() }}</td>
                                <td style="text-align: right;">{{ number_format($item->getTotalPrice(), 2) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                              <th style="text-align: right;" colspan="6">Total price:</th>
                              <td style="text-align: right;">{{  number_format($basket->getTotalPrice(), 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
