@extends('layouts.master')

  @section('content')
  <h1>Create a user</h1>
  <form method="post" action="{{url("create_user_action")}}">
    {{csrf_field()}}
    <p>
      <label>Name</label>
      <input type="text" name="name" required="required" pattern="[A-Za-z0-9]{1,20}">
    </p>
    <p>
      <label>Age</label>
      <input type="number" name="age" min="18" max="98" required="required" pattern="[0-9]{1,2}">
    </p>
    <p>
      <label>License number </label>
      <input type="text" name="license_number" required="required" pattern="[A-Za-z0-9]{8,11}" text="">
    </p>
    <p>
      <label>License type</label>
      <textarea type="text" name="license_type" maxlength="20"></textarea>
    </p>
    <input type="submit" value="Create">
  </form>
  @endsection