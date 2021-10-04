@extends('layouts.master')

@section('title')
    Item Create
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
    <form method="POST" action='{{url("item")}}' enctype="multipart/form-data"> <!--goes to the store function in the controller via product route -->
        {{csrf_field()}}
        <br>
        <p>
            <label>Name </label><input type="text" name="name" value="{{old('name')}}"> <!--once error exists, it will direct back to this form and retrieve the value user input -->
        </p>
        
        <p>
            <label>Price </label><input type="text" name="price"value="{{old('price')}}">
        </p>
        
        <p>
            <label>Manufacture </label><input type="text" name="manufacture_name"value="{{old('manufacture_name')}}">
        </p>
        
        <p>
            <label>Description </label>
            <input type="text" name="description"value="{{old('description')}}">
        </p>   
        
        <p>
            <label>URL </label>
            <input type="text" name="URL"value="{{old('URL')}}">
        </p>

        <p>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </p>

        <div class="custom-file">
                <input type="file" name="images[]" class="custom-file-input" id="images" multiple="multiple">
        </div>
        
        <br><div>
        <input type="submit" value="Create"> 
        </div>

    </form>
@endsection