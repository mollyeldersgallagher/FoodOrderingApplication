@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card d-flex justify-content-center">
                      <div class ="card-header  text-white bg-success">Choose your Diet</div>
                      <div class ="card-body d-flex justify-content-center">
                      @foreach ($diets as $diet)
                          <a type="button" href="#" data-diet-id="{{ $diet->id }}" class="btn menu-diet"><img src="{{ asset('storage/'. $diet->image)}}" width="100" /><br/>{{ $diet->name }}</a>
                      @endforeach
                    </div>
                    </div>
                    <hr/>
                  <div class ="card d-flex justify-content-center">
                    <div class ="card-header  text-white bg-success">Choose your Option</div>
                    <div class ="card-body d-flex justify-content-center">
                      @foreach($options as $option)
                        @if ($loop->index % 2 == 0)
                          <div class="row justify-content-center">
                        @endif
                          <a type="button" href="#" data-option-id="{{ $option->id }}" class="btn menu-option"><img src="{{ asset('storage/'. $option->image)}}" width="100" /><br/>{{ $option->name }}</a>
                          @if ($loop->index % 2 == 1 || $loop->last)
                          </div>
                          @endif
                      @endforeach
                  </div>
                  </div>



                  <form id="form-menu" method="post" action="{{ route('foods.select') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="diet-id" name="diet_id" value="">
                    <input type="hidden" id="option-id" name="option_id" value="">
                  </form>

                </div>

        <div class="col-md-6">
          @component('components.foods.basket', [
              'basket' => $basket
          ])
          @endcomponent
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('a.menu-diet').click(function (e) {
            $('a.menu-diet-selected').removeClass('menu-diet-selected');
            $(this).addClass('menu-diet-selected');
            var dietId = $(this).data('dietId');
            $('#diet-id').val(dietId);
            if ($('#diet-id').val() != "" && $('#option-id').val() != "") {
              $('#form-menu').submit();
            }
        });
        $('a.menu-option').click(function (e) {
          $('a.menu-option-selected').removeClass('menu-option-selected');
          $(this).addClass('menu-option-selected');
          var optionId = $(this).data('optionId');
            $('#option-id').val(optionId);
            if ($('#diet-id').val() != "" && $('#option-id').val() != "") {
              $('#form-menu').submit();
            }
        });
    </script>
@endsection
