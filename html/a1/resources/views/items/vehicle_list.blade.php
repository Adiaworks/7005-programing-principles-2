@extends('layouts.master')

@section('content')
<header>Vehicles</header>
  @if ($vehicles)
    <ul>
    @foreach($vehicles as $vehicle)
      <li><a href="{{url("vehicle_detail/$vehicle->id")}}">{{$vehicle->rego}}</a></li>
    @endforeach
    </ul>
  @else
    No item found
  @endif
@endsection