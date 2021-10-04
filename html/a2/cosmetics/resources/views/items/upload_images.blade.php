@extends('layouts.master')

@section('content')
<form method="POST" action='{{url("item/store_images/$item->id")}}' enctype="multipart/form-data">
    <div class="custom-file">
        <input type="file" name="images[]" class="custom-file-input" id="images" multiple="multiple">
    </div>

    <p>
            <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
    </p>

    <br><div>
        <input type="submit" value="Create"> 
    </div>
</form>
@endsection