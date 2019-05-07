@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shopping basket checkout</div>

                <div class="card-body">
                  <!-- checking if the basket is empty -->
                    @if ($basket->isEmpty())
                    <p>There are no items in your shopping basket</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                              <th>Option</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- looping though all the items in the basket and refering to each single item -->
                            @foreach ($basket->getItems() as $item)
                            <tr>
                                <td>{{ $item->getFood()->name }}</td>
                                <td>{{ $item->getFood()->description }}</td>
                                <td>&euro;{{ number_format($item->getFood()->cost, 2) }}</td>
                                <td>{{ $item->getQuantity() }}</td>
                                <td>{{ $item->getOption()->name }}</td>
                                <td>  &euro; {{number_format($item->getTotalPrice(), 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total price:  &euro; {{ number_format($basket->getTotalPrice(),2) }}</p>
                    <hr />
                    <form method="POST" action="{{ route('basket.pay') }}">
                        <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                        {{ ($errors->has('credit_card_id')) ? $errors->first('credit_card_id') : "" }}
                        <!-- using the relationship between user and customer to access the credit cards assosiated
                        with each customer -->
                        @if ($user->customer->credit_cards->count() > 0)
                            <p>Select credit card to use</p>
                            @foreach ($user->customer->credit_cards as $card)
                            <div class="radio">
                                <label>
                                    <input type="radio" class="" name="credit_card_id" value="{{ $card->id }}" />
                                    {{ $card->name }} / {{ $card->number }}
                                </label>
                            </div>
                            @endforeach
                        @endif
                        <div class="radio">
                            <label>
                                <input type="radio" class="" name="credit_card_id" value="0" />
                                Enter the details for a new credit card
                            </label>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" class="form-control" name="name" value="{{ old('name') }}" /></td>
                                        <td>{{ ($errors->has('name')) ? $errors->first('name') : "" }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td><input type="text" class="form-control" name="number" value="{{ old('number') }}" /></td>
                                        <td>{{ ($errors->has('number')) ? $errors->first('number') : "" }}</td>
                                    </tr>
                                    <tr>
                                        <td>Expiry</td>
                                        <td><input type="text" class="form-control" name="expiry" value="{{ old('expiry') }}" /></td>
                                        <td>{{ ($errors->has('expiry')) ? $errors->first('expiry') : "" }}</td>
                                    </tr>
                                    <tr>
                                        <td>CVV</td>
                                        <td><input type="text" class="form-control" name="cvv" value="{{ old('cvv') }}" /></td>
                                        <td>{{ ($errors->has('cvv')) ? $errors->first('cvv') : "" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p><button class="btn btn-primary" type="submit">Pay</button></p>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
