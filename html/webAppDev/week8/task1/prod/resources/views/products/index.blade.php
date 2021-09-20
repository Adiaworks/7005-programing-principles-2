@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
<form method="GET" action= '{{url("product/$product->id")}}'>
<ul>
    @foreach ($products as $product)
        <a href="product/{{$product->id}}"><li>{{$product->name}}</li></a>
    @endforeach
</ul>
</form>
@endsection