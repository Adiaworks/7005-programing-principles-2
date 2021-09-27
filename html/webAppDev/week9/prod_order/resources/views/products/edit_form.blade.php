@extends('layouts.master')

@section('title')
    Product Edit
@endsection

@section('content')
    <form method="POST" action='{{url("product/$product->id")}}'> <!--goes to the update function in the controller -->
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <p>
            <label>Name </label>
            <input type="text" name="name" value="{{old('name')}}">
        </p>
        <div class="alert">
            {{$errors->first('name')}}
        </div>
        
        <p>
            <label>Price </label>
            <input type="text" name="price" value="{{old('price')}}">
            <div class="alert">
                {{$errors->first('price')}}
            </div>
        </p>
        <p><select name="manufacturer">
        @foreach ($manufacturers as $manufacturer)
            @if($manufacturer->id === $product->munufacturer_id)
                <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
            @else
                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
            @endif
        @endforeach
        </select>
        <input type="submit" value="Update"> 
    </form>
@endsection