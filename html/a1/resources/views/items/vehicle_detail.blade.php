@extends('layouts.master')

@section('content') 
<h1>Vehicles</h1>
<p>Rego: {{$vehicle->rego}}</p>
<p>ID: {{$vehicle->id}}</p>
<p>Model: {{$vehicle->model}}</p> 
<p>Year: {{$vehicle->year}}</p> 
<p>Odometer: {{$vehicle->odometer}}</p>
<a href="{{url("vehicle_delete/$vehicle->id")}}">Delete vehicle</a><br><br><!--this absolute url refers to the file of item_delete.blade.php-->
<a href="{{url("vehicle_update/$vehicle->id")}}">Update vehicle</a><br><br>
<a href="{{url("vehicle_add/$vehicle->id")}}">Create a vehicle</a><br><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection