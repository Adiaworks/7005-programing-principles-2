@extends('layouts.master')

@section('content')
<h1>Users</h1>
  @if ($users)
    <ul>
    @foreach($users as $user)
      <li> {{$user->id}} {{$user->name}} {{$user->age}} {{$user->license_number}} {{$user->license_type}} 
      </a>&nbsp;  <a href="{{url("user_delete/$user->id")}}">Delete</a>&nbsp;  <a href="{{url("user_update/$user->id")}}">Update</a><br></li>
    @endforeach
    </ul>
  @else
    No item found
  @endif
<a href="{{url("create_a_user/$user->id")}}">Create a user</a><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection