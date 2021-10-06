@extends('layouts.master')

@section('content')

    <h2>{{$user->name}}</h2>
    <p>{{$user->type}}</p>
    @if ($user->following != NULL)
        @foreach(explode(',', $user->following) as $user_id)
        {{$user_id}}

        @endforeach

    @else
    <p><b>Following: </b> No following now</p>
    @endif

@endsection