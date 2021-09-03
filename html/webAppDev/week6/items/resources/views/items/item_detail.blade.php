@extends('layouts.master')

@section('title')
  Item List
@endsection

@section('content') 
    <h1>{{$item->summary}}</h1>
    <p>{{$item->details}}</p>
    <a href="{{url("item_delete/$item->id")}}">Delete item</a><br><br><!--this absolute url refers to the file of item_delete.blade.php-->
    <a href="{{url("item_update/$item->id")}}">Update item</a><br><br>
    <a href="{{url("/")}}">Home</a><br>
 
@endsection