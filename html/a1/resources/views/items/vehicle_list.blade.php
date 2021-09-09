@extends('layouts.master')

@section('content')
  <h1>Vehicles</h1>

  <ul class="list-group">
  @if ($vehicles)
    @foreach($vehicles as $vehicle)
      <li class="list-group-item list-group-item-action"><a href="{{url("vehicle_detail/$vehicle->id")}}">{{$vehicle->rego}}</a></li>
    @endforeach
  @else
    <li class="list-group-item">No item found</li>
  @endif
  </ul>

  <a type="button" class="btn btn-primary" href="{{url("create_a_vehicle/$vehicle->id")}}">Create a vehicle</a>
@endsection