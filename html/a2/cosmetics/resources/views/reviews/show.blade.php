@extends('layouts.master')

@section('content')

    <h2>{{$item->name}}</h2>
    <p>Price: {{$item->price}}</p>
    <p>Manufacture: {{$item->manufacture_name}}</p>
    <p>Description: {{$item->description}}</p>
    
@if ($item->URL)
    <p>
    <label> URL:</label>
    <a href="{{$item->URL}}">Check this product</a>
    </p>
@else
    <p>URL: No URL</pp>
@endif
    <p>Reviews: {{$item->content}}</p>
    <p>
        <form method="GET" action= '{{url("item/$item->id/edit")}}'>
            {{csrf_field()}}
            <input type="submit" value="Edit">
        </form>
    <p>

    <p>
        <form method="POST" action= '{{url("item/$item->id")}}'>
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete">
        </form>
    </p>
{{ $reviews->links()}}
@endsection