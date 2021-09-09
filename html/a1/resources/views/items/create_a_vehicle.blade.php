@extends('layouts.master')

  @section('content')
  <h1>Create a vehicle</h1>
  <form method="post" action="{{url("create_vehicle_action")}}">
    {{csrf_field()}}
    <p>
      <label for="rego">Rego</label>
      <input type="text" class="uppercase" id="rego" name="rego" required pattern="[A-Z0-9]{6}" title="Sorry, we don’t cater for personalised number plate. An alphanumeric string of 6 characters is required. Please capitalize your input." >
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
      <input type="text" name="odometer" required pattern="[0-9]+" title="Please input numbers only">
    </p>
    <input type="submit" value="Create">
  </form>
  @endsection