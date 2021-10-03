@extends('layouts.master')

@section('title')
    Item Edit
@endsection

@section('content')
    <form method="POST" action='{{url("item/$item->id")}}'> <!--goes to the update function in the controller -->
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <br>
        <p>
            <label>Name </label>
            <input type="text" name="name" value="{{$item->name}}">
            <div class="alert">
                {{$errors->first('name')}}
            </div>
        </p>
        
        <p>
            <label>Price </label>
            <input type="text" name="price" value="{{$item->price}}">
            <div class="alert">
                {{$errors->first('price')}}
            </div>
        </p>
        
        <p>
            <label>Manufacture </label>
            <input type="text" name="manufacture_name" value="{{$item->manufacture_name}}">
            <div class="alert">
                {{$errors->first('manufacture_name')}}
            </div>
        </p>
        
        <p>
            <label>Description </label>
            <input type="text" name="description" value="{{$item->description}}">
            <div class="alert">
                {{$errors->first('description')}}
            </div>
        </p>

        <p>
            <label>URL </label>
            <input type="text" name="URL" value="{{$item->URL}}">
            <div class="alert">
                {{$errors->first('URL')}}
            </div>
        </p>

        <p>
            <label>Images </label>
            <input type="file" name="image" value="{{$item->image}}">
            <div class="alert">
                {{$errors->first('image')}}
            </div>
        </p>

        <p>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </p>

        <input type="submit" value="Update"> 
    </form>
@endsection