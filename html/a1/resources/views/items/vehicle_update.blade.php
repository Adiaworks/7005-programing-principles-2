@extends('layouts.master')

@section('content') 
<h1>Update a vehicle</h1>
<form method="post" action="{{url("update_vehicle_action/$vehicle->id")}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$vehicle->id}}">
<p>
  <label for="rego">Rego: </label>
  <input type="text" class="uppercase" id="rego" name="rego" required pattern="[A-Z0-9]{6}" title="Sorry, we don’t cater for personalised number plate. An alphanumeric string of 6 characters is required. Please capitalize your input." value="{{$vehicle->rego}}" >
</p>
<p>
  <label>Model:</label>
  <textarea name="model">{{$vehicle->model}}</textarea>
</p>
<p>
  <label>Year: </label>
  <textarea name="year">{{$vehicle->year}}</textarea>
</p>
<p>
  <label for="odometer">Odometer: </label>
  <input type="text" name="odometer" required pattern="[0-9]+" title="Please input numbers only" value="{{$vehicle->odometer}}">
</p>
<input type="submit" value="Update this vehicle">
</form>
@endsection