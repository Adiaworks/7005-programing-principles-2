@extends('layouts.master')

@section('content') 
<h1>Booking detail</h1>
<p>ID: {{$booking->id}}</p>
<p>User id: {{$booking->user_id}}</p>
<p>User name: {{$booking->user_name}}</p> 
<p>User license_number: {{$booking->user_license_number}}</p> 
<p>Starting date: {{$booking->starting_date}}</p>
<p>Starting time: {{$booking->starting_time}}</p>
<p>Returning date: {{$booking->returning_date}}</p>
<p>Returning time: {{$booking->returning_time}}</p>
<a href="{{url("booking_frequency")}}">List vehicles by booking numbers</a><br><br>
<a href="{{url("booking_time")}}">List vehicles by the amount of booking time</a><br><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection