@extends('layouts.master')

@section('content')
  <h1>Create a vehicle</h1>

  <form method="post" action="{{url("create_vehicle_action")}}">
    {{csrf_field()}}
    <div class="mb-3">
      <label for="rego" class="form-label">Rego:</label>
      <input type="text" class="form-control" id="rego" name="rego" >
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model:</label>
      <input type="text" class="form-control" id="model" name="model" >
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year:</label>
      <input type="text" class="form-control" id="year" name="year" >
    </div>
    <div class="mb-3">
      <label for="odometer" class="form-label">Odometer:</label>
      <input type="text" class="form-control" id="odometer" name="odometer" >
    </div>
    <input type="submit" class="btn btn-primary" value="Create">
  </form>
  @endsection