@extends('layouts.master')

@section('title')
    User
@endsection

@section('content')

    <h2>Hi {{Auth::user()->name}}!</h2>
    <p>User type: {{Auth::user()->type}}</p>
    
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
            @if (Auth::user()->following != NULL)
                @foreach ($reviews as $review)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                            <p class="card-text">Item: {{$review->item->name}}</p> 
                            <p class="card-text">Rating: {{$review->rating}}</p>
                            <p class="card-text">Review: {{$review->content}}</p>
                            <p class="card-text">User: {{$review->user->name}}</p>
                            <p class="card-text">{{$review->review_created_at}}</p>
                            
                            @if (str_contains($user->following, $review->user_id))
                                <form method="POST" style="text-align:center;" action= '{{url("user/unfollow/$review->user_id")}}'>
                                    {{csrf_field()}}
                                    <input type="submit" value="Unfollow this user">
                                </form>
                            @endif
                            
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p><b>Following: </b> No following now</p>
            @endif
            
            </div>
        </div>
    </div>            

@endsection