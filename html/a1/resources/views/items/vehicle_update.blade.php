@extends('layouts.master')

@section('content') 
  <h1>Update a vehicle</h1>

  <form method="post" action="{{url("update_vehicle_action/$vehicle->id")}}">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$vehicle->id}}">
    <div class="mb-3">
      <label for="rego" class="form-label">Rego:</label>
      <input type="text" class="form-control" id="rego" name="rego" value="{{$vehicle->rego}}" >
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model:</label>
      <input type="text" class="form-control" id="model" name="model" value="{{$vehicle->model}}" >
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year:</label>
      <input type="text" class="form-control" id="year" name="year" value="{{$vehicle->year}}" >
    </div>
    <div class="mb-3">
      <label for="odometer" class="form-label">Odometer:</label>
      <input type="text" class="form-control" id="odometer" name="odometer" value="{{$vehicle->odometer}}" >
    </div>
    <input type="submit" class="btn btn-primary" value="Update this vehicle">
  </form>
@endsection