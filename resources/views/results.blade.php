@extends('app')

@section('content')
<br>
<div class="d-flex justify-content-end">
<a href="/" class="btn btn-warning">Search again</a>
</div>
<br>
<div class="p-3 mb-2 bg-success text-white"> Total <b>{{$count}}</b> days.

  @if($working['isWorkDay'] == true)
    Today is working day.
   @elseif($holyday['isPublicHoliday'] == true)
      Today is holiday.
     @elseif($working['isWorkDay']  == false)
        Today is free day.
      @endif

The maximum number of freedays: {{$freeDay}}

</div>

<div class="p-3 mb-2 bg-light text-dark">

<h5>January:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 1)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>February:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 2)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-light text-dark">
  <h5>March:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 3)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>April:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 4)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-light text-dark">
  <h5>May:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 5)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>June:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 6)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-light text-dark">
  <h5>July:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 7)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>August:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 8)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-light text-dark">
  <h5>September:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 9)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>October:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 10)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-light text-dark">
  <h5>November:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 11)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>
<div class="p-3 mb-2 bg-white text-dark">
  <h5>December:</h5>
  @foreach($data as $info)
    @if($info['date']['month'] == 12)
      <li>{{$info['name']['1']['text']}}</li>
    @endif
  @endforeach
</div>

@endsection
