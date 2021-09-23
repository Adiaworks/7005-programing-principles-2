@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')

<ul>
    @foreach ($products as $product)
        <a href="product/{{$product->id}}"><li>{{$product->name}}</li></a>
    @endforeach
</ul>
<form method="GET" action= '{{url("product/create")}}'>
        {{csrf_field()}} 
        <input type="submit" value="Create">
</form>
@endsection