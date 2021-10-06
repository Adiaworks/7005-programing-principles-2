@extends('layouts.master')

@section('content')

    <h2>{{$user->name}}</h2>
    <p>{{$user->type}}</p>
    @if ($user->following != NULL)
        <p>
        <a href='{{url("user/following_list/",Auth::user()->id)}}'>Following list </a>
        </p>
    @else
        <p><b>Following: </b> No following now</p>
    @endif

@endsection