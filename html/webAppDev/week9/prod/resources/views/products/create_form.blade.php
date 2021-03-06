@extends('layouts.master')

@section('title')
    Product Create
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert"> 
            <ul>
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
                @endforeach 
            </ul>
        </div>
    @endif
    
    <form method="POST" action='{{url("product")}}'> <!--goes to the store function in the controller via product route -->
        {{csrf_field()}}
        <p><label>Name: </label><input type="text" name="name" value="{{old('name')}}"></p> <!--once error exists, it will direct back to this form and retrieve the value user input -->
        <p><label>Price: </label><input type="text" name="price"value="{{old('price')}}"></p>
        <p><select name="manufacturer">
        @foreach ($manufacturers as $manufacturer)
            @if($manufacturer->id == old('manufacturer'))
                <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
            @else
                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>  
            @endif  
        @endforeach
        </select></p>
        <input type="submit" value="Create"> 
    </form>
@endsection