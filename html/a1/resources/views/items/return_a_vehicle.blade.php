@extends('layouts.master')

  @section('content')
  <h1>Return a vehicle</h1>
  <form method="post" action="{{url("return_vehicle_action")}}">
    {{csrf_field()}}
    <p>
      <label>Distance driven</label>
      <input type="number" name="distance" >
    </p>
    <p>
      <label>Booking id</label>
      <input type="number" name="booking_id" >
    </p>
    <p>
      <label>User name</label>
      <input type="text" name="user_name" >
    </p>
    <p>
      <label>Vehicle id</label>
      <input type="number" name="vehicle_id" >
    </p>
    <input type="submit" value="Submit"><br>
  </form>
  <a href="{{url("list_vehicles")}}">Home</a>
  @endsection