@extends('layouts.master')

@section('title')
    Item Edit
@endsection

@section('content')
    <form method="POST" action='{{url("item/$item->id")}}' enctype="multipart/form-data"> <!--goes to the update function in the controller -->
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

        <div class="custom-file">
            <input type="file" name="images[]" class="custom-file-input" id="images" multiple="multiple" value="{{$item->image}}">
            <label>Images </label>
            <div class="alert">
                {{$errors->first('image')}}
            </div>
        </div>

        <p>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </p>

        <input type="submit" value="Update"> 
    </form>
@endsection