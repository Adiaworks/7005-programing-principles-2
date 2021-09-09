@extends('layouts.master')

@section('content')
<h1>Vehicles</h1>
  @if ($vehicles)
    <ul>
    @foreach($vehicles as $vehicle)
      <li><a href="{{url("vehicle_detail/$vehicle->id")}}">{{$vehicle->rego}}</a></li>
    @endforeach
    </ul>
  @else
    No item found
  @endif
<a href="{{url("create_a_vehicle/$vehicle->id")}}">Create a vehicle</a><br><br>
@endsection