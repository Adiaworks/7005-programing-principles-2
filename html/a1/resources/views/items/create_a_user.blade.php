@extends('layouts.master')

  @section('content')
  <h1>Create a user</h1>
  <form method="post" action="{{url("create_user_action")}}">
    {{csrf_field()}}
    <p>
      <label>Name</label>
      <input type="text" name="name">
    </p>
    <p>
      <label>Age</label>
      <input type="text" name="age">
    </p>
    <p>
      <label>License number </label>
      <input type="text" name="license_number">
    </p>
    <p>
      <label>License type</label>
      <input type="text" name="license_type">
    </p>
    <input type="submit" value="Create">
  </form>
  @endsection