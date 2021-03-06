@extends('layouts.master')

@section('content')
<h1>Bookings</h1>
  @if ($bookings)
    <table style="width:100%">
      <tr>
        <th>Booking ID</th>
        <th>User ID</th>
        <th>User name</th>
        <th>license number</th>
        <th>Vehicle ID</th>
        <th>Starting date</th>
        <th>Starting time</th>
        <th>Returning date</th>
        <th>Returning time</th>
      </tr>
    @foreach($bookings as $booking)
      <tr>
        <td>{{$booking->id}}</td>
        <td>{{$booking->user_id}}</td>
        <td>{{$booking->user_name}}</td>
        <td>{{$booking->user_license_number}}</td>
        <td>{{$booking->vehicle_id}}</td>
        <td>{{$booking->starting_date}}</td>
        <td>{{$booking->starting_time}}</td>
        <td>{{$booking->returning_date}}</td>
        <td>{{$booking->returning_time}}</td>
      </tr>
    @endforeach
    </table>
  @else
    No item found
  @endif
<a href="{{url("booking_frequency")}}">List vehicles by booking frequency</a><br><br>
<a href="{{url("booking_time_list")}}">List vehicles by the amount of booking time</a><br><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection