@extends('layouts.master')

@section('content')
<h1>Booking time list in a descending order</h1>
  @if ($bookings)
  <table style="width:160%">
      <tr>
        <th>Vehicle id</th>
        <th>Booking time</th>
      </tr>
    @foreach($bookings as $booking)
      <tr>
        <td>{{$booking->vehicle_id}}</td>
        <td>{{$booking->difference}}</td>
      </tr>
    @endforeach
  </table>
  @else
    No item found
  @endif
<a href="{{url("booking_list")}}">List all the bookings</a><br><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection