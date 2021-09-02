@extends('layouts.master')

@section('title')
Item List
@endsection

@section('content')
<h1>Items</h1>
  @if ($items)
    <ul>
    @foreach($items as $item)
      <li><a href="{{url("item_detail/$item->id")}}">{{$item->summary}}</a></li>
    @endforeach
    </ul>
    <a href="{{url("add_item/$item->id")}}">Add item</a>
  @else
    No item found
  @endif
@endsection