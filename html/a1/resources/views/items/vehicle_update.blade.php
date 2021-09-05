@extends('layouts.master')

@section('content') 
<h1>Update a vehicle</h1>
<form method="post" action="{{url("update_vehicle_action/$vehicle->id")}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$vehicle->id}}">
<p>
  <label>Rego: </label>
  <textarea name="rego">{{$vehicle->rego}}</textarea>
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
  <label>Odometer: </label>
  <textarea name="odometer">{{$vehicle->odometer}}</textarea>
</p>
<input type="submit" value="Update this vehicle">
</form>
@endsection