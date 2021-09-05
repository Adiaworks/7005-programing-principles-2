@extends('layouts.master')

@section('content')
<h1>Users</h1>
  @if ($users)
  <table style="width:100%">
      <tr>
        <th>User ID</th>
        <th>User name</th>
        <th>User age</th>
        <th>License number</th>
        <th>License type</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->license_number}}</td>
        <td>{{$user->license_type}}</td>   
        <td><a href="{{url("user_delete/$user->id")}}">Delete</a></td>
        <td><a href="{{url("user_update/$user->id")}}">Update</a></td>
      </tr>
    @endforeach   
  </table>
  @else
    No item found
  @endif
<a href="{{url("create_a_user/$user->id")}}">Create a user</a><br>
<a href="{{url("list_vehicles")}}">Home</a>
@endsection