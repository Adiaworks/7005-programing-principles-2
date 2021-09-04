@extends('layouts.master')

@section('content') 
<h1>Update a user</h1>
<form method="post" action="{{url('update_user_action/$user->id')}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$user->id}}">
<p>
  <label>Name: </label>
  <textarea name="name">{{$user->name}}</textarea>
</p>
<p>
  <label>Age:</label>
  <textarea name="age">{{$user->age}}</textarea>
</p>
<p>
  <label>License_number: </label>
  <textarea name="license_number">{{$user->license_number}}</textarea>
</p>
<p>
  <label>License_type: </label>
  <textarea name="license_type">{{$user->license_type}}</textarea>
</p>
<input type="submit" value="Update this user">
</form>
@endsection