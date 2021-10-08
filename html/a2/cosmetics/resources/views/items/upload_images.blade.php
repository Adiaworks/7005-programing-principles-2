@extends('layouts.master')

@section('title')
    Upload images
@endsection

@section('content')
<h2>Upload your images here</h2><br>
    <form method="POST" action='{{url("item/store_images/$item->id")}}' enctype="multipart/form-data">
        {{csrf_field()}} 
        <div class="custom-file">
            <input type="file" name="images[]" class="custom-file-input" id="images" multiple="multiple">
        </div>
        <p>
            <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
        </p>
        <br><div>
        <input type="submit" value="Upload"> 
        </div>
    </form>
@endsection