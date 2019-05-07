<div class="card ">
    <div class="card-header text-white bg-success">Basket <span class="badge badge-secondary ml-2">{{  count($basket->getItems()) }}</span> </div>

    <div class="card-body">
      <!-- calling isEmpty function in the basket constructor, if empty display the following -->
        @if ($basket->isEmpty())
        <p>There are no items in your shopping basket</p>
        @else

        <table class="table">
            <thead>
                <tr>
                    <th>Option</th>
                    <th>Diet</th>
                    <th>Food Item</th>
                    <!-- <th>Description</th> -->
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
                    <!-- <td>{{ $item->getFood()->description }}</td> -->
                    <td>{{ number_format($item->getFood()->cost, 2) }}</td>
                    <td>{{ $item->getQuantity() }}</td>
                    <td style="text-align: right;">{{ number_format($item->getTotalPrice(), 2) }}</td>
                </tr>
                @endforeach
                <tr>
                  <th style="text-align: right;" colspan="5">Total price:</th>
                  <td style="text-align: right;">{{  number_format($basket->getTotalPrice(), 2) }}</td>
                </tr>
            </tbody>
        </table>
        <p>
          <a role="button" class="btn btn-warning" href="{{ route( 'basket.edit' ) }}">Edit basket</a>
          <a role="button" class="btn btn-success" href="{{ route( 'basket.checkout' ) }}">Checkout</a>
        </p>
        @endif
    </div>
  </div>
</div>
