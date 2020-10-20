@extends('app')

@section('content')

<div class="d-flex justify-content-center">
  <h2>Select country and years.</h2>
  <br>
</div>
<div class="d-flex justify-content-center">
    <form method="POST" action="/getholiday">
      @csrf
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <select name="country" id="country" class="custom-select mr-sm-2">
        @foreach($response as $country)
        <option value="{{$country['countryCode']}}">{{$country['fullName']}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-auto my-1">
      <select name="year" id="year" class="custom-select mr-sm-2">
        @foreach($years as $year)
        <option value="{{$year}}">{{$year}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</form>

@yield('content')

@endsection
