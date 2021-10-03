@extends('layouts.master')

@section('title')
    Review Edit
@endsection

@section('content')
    <form method="POST" action="{{url("review/$review->id")}}"> <!--goes to the update function in the controller -->
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <br>
        <p>
            <label>Rating </label>
            <input type="numeric" name="rating" value="{{$review->rating}}">
            <div class="alert">
                {{$errors->first('rating')}}
            </div>
        </p>
        
        <p>
            <label>Content </label>
            <input type="text" name="content"value="{{$review->content}}">
            <div class="alert">
                {{$errors->first('content')}}
            </div>
        </p>
        
        <p>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">  
        </p>
        
        <p>
            <input type="hidden" name="item_id" value="{{$item_id}}"> 
        </p>

        <input type="submit" value="Update"> 
    </form>
@endsection