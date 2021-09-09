@extends('layouts.master')

@section('content')
  <div class="card" style="width: 18rem;">
  <div class="card-body">
      <h5 class="card-title">Vehicle Details</h5>
      <p class="card-text">Rego: {{$vehicle->rego}}</p>
      <p class="card-text">ID: {{$vehicle->id}}</p>
      <p class="card-text">Model: {{$vehicle->model}}</p>
      <p class="card-text">Year: {{$vehicle->year}}</p>
      <p class="card-text">Odometer: {{$vehicle->odometer}}</p>
      <a class="card-link" href="{{url("booking_information/$vehicle->id")}}">Booking information of this vehicle</a><br><br>
      <a class="card-link" href="{{url("vehicle_delete/$vehicle->id")}}">Delete vehicle</a><br><br>
      <a class="card-link" href="{{url("vehicle_update/$vehicle->id")}}">Update vehicle</a><br><br>
      <a class="card-link" href="{{url("create_a_vehicle/$vehicle->id")}}">Create a vehicle</a><br><br>
  </div>
  </div>
@endsection