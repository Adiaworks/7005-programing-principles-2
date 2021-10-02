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
    <form method="POST" action='{{url("review")}}'> <!--goes to the store function in the controller via product route -->
        {{csrf_field()}}
        {{ method_field('POST') }}
        <br>
        <p>
            <label>Rating </label><select name="rating">
            <option value="{{old('rating')}}">1 </option>
            <option value="{{old('rating')}}">2 </option>
            <option value="{{old('rating')}}">3 </option>
            <option value="{{old('rating')}}">4 </option>
            <option value="{{old('rating')}}">5 </option>
            </select>
        </p>
        
        <p>
            <label>Content </label><input type="text" name="content"value="{{old('content')}}">
        </p>
        
        <p>
            <label>Item </label><select name="item">
            @foreach ($items as $item)
            <option value="{{old('item')}}">{{$item->name}}</option>
            @endforeach
            </select>
        </p>
        
        <p> 
            <label>User </label><select name="user">
            @foreach ($users as $user)
            <option value="{{old('user')}}">{{$user->name}}</option>
            @endforeach
            </select>
        </p>   
        
        <input type="submit" value="Create"> 
    </form>
@endsection