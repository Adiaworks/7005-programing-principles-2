@extends('layouts.master')

  @section('content')
  <h1>Book a vehicle</h1>
  <form method="post" action="{{url("booking_action")}}">
    {{csrf_field()}}
    <p>
      <label>Your user id</label>
      <select name="user_id" id="user_id">
        @if ($users)
          @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->id}}</option>
          @endforeach
        @else
          No item found
        @endif
      </select>
    </p>
    <p>
      <label>Your user name</label>
      <select name="user_name" id="user_name">
        @if ($users)
          @foreach($users as $user)
            <option value="{{$user->name}}">{{$user->name}}</option>
          @endforeach
        @else
          No item found
        @endif
      </select>
    </p>
    <p>
      <label>Your license number</label>
      <select name="license_number" id="license_number">
        @if ($users)
          @foreach($users as $user)
            <option value="{{$user->license_number}}">{{$user->license_number}}</option>
          @endforeach
        @else
          No item found
        @endif
      </select>
    </p>
    <p>
      <label>Vehicle rego</label>
      <select name="vehicle_rego" id="vehicle_rego">
        @if ($vehicles)
          @foreach($vehicles as $vehicle)
            <option value="{{$vehicle->rego}}">{{$vehicle->rego}}</option>
          @endforeach
        @else
          No item found
        @endif
      </select>
    </p>
    <p>
      <label>Starting date</label>
      <input type="date" id="starting_date" name="starting_date">
    </p>
    <p>
      <label>Starting time</label>
      <input type="time" id="starting_time" name="starting_time">
    </p>
    <p>
      <label>Returning date</label>
      <input type="date" id="returning_date" name="returning_date">
    </p>    
    <p>
      <label>Returning time</label>
      <input type="time" id="returning_time" name="returning_time">
    </p>
    <input type="submit" value="Book"><br><br>
  </form>
  <a href="{{url("booking_frequency")}}">List vehicles by booking frequency</a><br><br>
  <a href="{{url("booking_time_list")}}">List vehicles by the amount of booking time</a><br><br>
  <a href="{{url("booking_list")}}">List all the bookings</a><br><br>
  <a href="{{url("list_vehicles")}}">Home</a>
  @endsection