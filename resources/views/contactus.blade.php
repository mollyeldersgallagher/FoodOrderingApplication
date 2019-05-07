@extends('layouts.app')

@section('content')
  {{-- contact us page, form for contacting website, email and text area fields for user input  --}}
  <div class="container">
    <div class="text-center">
    <h2>Contact Us</h2>
    <hr>
  </div>
  <div class=" jumbotron text-center"><h4>7 Strand Road, Co.Dublin | 01 538 1000 | info@holyguacamole.ie</h4></div>
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Enquiry</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
