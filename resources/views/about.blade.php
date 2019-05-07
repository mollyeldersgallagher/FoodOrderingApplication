@extends('layouts.app')

@section('content')
  {{-- about us page, text area with information about the website, with an image down the end being linked from folder in storage --}}
  <div class="container">
    <div class="text-center">
    <h2>About Us!</h2>
    <hr>
  </div>
    <card-body>
    <div class="float-md-right">
    <div class="row">
      <div class="jumbotron">
        <p>At Holy Guacamole we’re hungry to bring you fresh, clean and nutritious food, served quickly. Our mission is to offer you simple and delicious ways to easily add healthy food choices into your busy day.
          Holy Guacamole was born in Ireland through pure love of health and fitness, with a true lack of nutritious food available to people wanting to live a healthy lifestyle on the go.
          With the help of our healthy little mascot, we strive to deliver fresh, cost effective, healthy food, with a smile!</p>

          <p>Join the healthy food revolution and the booming fit lifestyle market, with our, family-friendly, fast-casual quick-service brand.
            With all of the Holy Guacamole flavours created by our skilled team in our central kitchen, consistency of flavour is guaranteed.
            Using our unique software, every aspect of the business, from ordering through to labour management, costing and stock control, can be easily monitored wherever you are.</p>
      </div>
      <div>
        <img src="storage/images/avo.png">
      </div>
      </div>
    </div>
  </div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">


                      <div class="card d-flex justify-content-center">
                      <div class ="card-header  text-white bg-success">Choose your Diet</div>
                      <div class ="card-body d-flex justify-content-center">
                          <img src="storage/images/avo.png">
                    </div>
                    </div>
                    <hr/>
                  <div class ="card d-flex justify-content-center">
                    <div class ="card-header  text-white bg-success">Choose your Option</div>
                    <div class ="card-body d-flex justify-content-center">

                  </div>
                  </div>



                  <form id="form-menu" method="post" action="{{ route('foods.select') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="diet-id" name="diet_id" value="">
                    <input type="hidden" id="option-id" name="option_id" value="">
                  </form>

                </div>

        <div class="col-md-6">

        </div>
    </div>
</div>
@endsection --}}
