@extends('layouts.master')

@section('title')
Vehicle list
@endsection

@section('content')
<h1>Vehicles</h1>
  @if ($vehicles)
    <ul>
    @foreach($vehicles as $vehicle)
      <li><a href="{{url("vehicle_list/$vehicle->id")}}">{{$vehicle->rego}}</a></li>
    @endforeach
    </ul>
  @else
    No item found
  @endif
@endsection