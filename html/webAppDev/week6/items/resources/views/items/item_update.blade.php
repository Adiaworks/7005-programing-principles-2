@extends('layouts.master')

@section('title')
  Update Item
@endsection

@section('content') 
<form method="post" action="{{url("update_item_action/$item->id")}}">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$item->id}}">
<p>
  <label>Summary: </label>
  <textarea name="summary">{{$item->summary}}</textarea>
</p>
<p>
  <label>Details:</label>
  <textarea name="details">{{$item->details}}</textarea>
</p>
<input type="submit" value="Update item">
</form>
@endsection