@extends('layouts.master')
@section('content')
    <h1>{{$product->name}}</h1>
    <p>{{$product->price}}</p>
    <p>{{$product->manufacturer->name}}</p>
    @auth <!--- user is logged in --->
        <p><a href=' {{url("product/$product->id/edit")}}'>Edit</a></p>
        <p>
            <form method="GET" action= '{{url("product/create")}}'>
                {{csrf_field()}} 
                <input type="submit" value="Create">
            </form>
            <form method="POST" action= '{{url("product/$product->id")}}'>
                {{csrf_field()}}
                {{ method_field('DELETE') }} <!--html does not support DELETE method, so this line can use hidden html to conduct the delete method -->
                <input type="submit" value="Delete">
            </form>
        </p>
    @endauth
@endsection