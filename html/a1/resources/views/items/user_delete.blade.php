@extends('layouts.master')

@section('title')
  Delete user
@endsection

@section('content') 
  <h1>User deleted</h1>
  <a href="{{url("list_users")}}">List users</a>
@endsection