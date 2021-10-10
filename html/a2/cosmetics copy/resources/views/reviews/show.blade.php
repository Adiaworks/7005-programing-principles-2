@extends('layouts.master')

@section('title')
    Review
@endsection

@section('content')

    <h2>{{$review->name}}</h2>
    <p>Content: {{$review->content}}</p>
    <p>User: {{$review->user->name}}</p>
    <p>Created at: {{$review->created_at}}</p>
    
@endsection