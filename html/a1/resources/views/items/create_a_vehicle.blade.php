@extends('layouts.master')

  @section('content')
  <h1>Create a vehicle</h1>
  <form method="post" action="{{url("create_vehicle_action")}}">
    {{csrf_field()}}
    <p>
      <label>Rego</label>
      <input type="text" name="rego" >
    </p>
    <p>
      <label>Model</label>
      <input type="text" name="model" >
    </p>
    <p>
      <label>Year</label>
      <input type="text" name="year" >
    </p>
    <p>
      <label>Odometer</label>
      <textarea type="text" name="odometer"></textarea>
    </p>
    <input type="submit" value="Create">
  </form>
  @endsection