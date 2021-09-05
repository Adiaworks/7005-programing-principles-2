@extends('layouts.master')

@section('title')
  Delete a vehicle
@endsection

@section('content') 
  <h1>Vehicle deleted</h1>
  <a href="{{url("list_vehicles")}}">List vehicles</a>
@endsection