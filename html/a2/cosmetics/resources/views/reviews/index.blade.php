@extends('layouts.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@if ($reviews)
    @foreach($reviews as $review)
        <div class="col">
            <div class="card shadow-sm">
                <title>Placeholder</title>
                <div class="card-body">
                    <p class="card-text">Item: {{$review->item->name}}</p> 
                    <p class="card-text">Rating: {{$review->rating}}</p>
                    <p class="card-text">Review: {{$review->content}}</p>
                    <p class="card-text">User: {{$review->user->name}}</p>
                    <p class="card-text">{{$review->review_created_at}}</p> 
                </div>
                @if (str_contains(Auth::user()->following, $review->user_id))
                    <form method="POST" style="text-align:center;" action= '{{url("user/unfollow/", Auth::user()->id)}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Unfollow this user">
                    </form>
                @else
                    <form method="POST" style="text-align:center;" action= '{{url("user/follow/", Auth::user()->id)}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Follow this user">
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@else
    <h1>No review found</h1>
@endif
        </div>
    </div>
</div>

<div id="outer">  
    <div id="inner">{{ $reviews->links()}}</div>
</div>

@endsection