@extends('layouts.master')

@section('title')
    Review Create
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
    <form method="POST" action='{{url("review")}}'> <!--goes to the store function in the controller via review route -->
        {{csrf_field()}}
        <br>
        <p>
            <label>Rating (from 1 to 5) </label>
            <input type="numeric" name="rating" value="{{old('rating')}}">
        </p>
        
        <p>
            <label>Content </label><input type="text" name="content"value="{{old('content')}}">
        </p>
        
        <p>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">     
        </p>
        
        <p> 
            <input type="hidden" name="item_id" value="{{$item_id}}">
        </p>   
        
        <input type="submit" value="Create"> 
    </form>
@endsection