@extends('layouts.master')

@section('content') 
<h1>Update a user</h1>
<form method="post" action="{{url("update_user_action/$user->id")}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$user->id}}">
<p>
  <label>Name: </label>
  <input name="name" value="{{$user->name}}">
</p>
<p>
  <label>Age:</label>
  <input name="age" value="{{$user->age}}">
</p>
<p>
  <label>License_number: </label>
  <input name="license_number" value="{{$user->license_number}}">
</p>
<p>
  <label>License_type: </label>
  <input name="license_type" value="{{$user->license_type}}">
</p>
<input type="submit" value="Update this user">
</form>
@endsection