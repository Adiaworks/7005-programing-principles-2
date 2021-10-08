@extends('layouts.master')

@section('title')
    Show items
@endsection

@section('content')
    <h2>{{$item->name}}</h2>
    
    @if ($item->image != "")
        <!--- check whether the item has images or not --->
        @foreach(explode(',', $item->image) as $image)
            <img src="{{url($image)}}" style="object-fit: cover" width="30%" height="300px" alt="cosmetic images" role="img">
        @endforeach
    @else
        <p>No Images</p>
    @endif
    
    <p><b>Price: </b>{{$item->price}}</p>
    <p><b>Manufacture: </b>{{$item->manufacture_name}}</p>
    <p><b>Description: </b>{{$item->description}}</p>
       
    @if ($item->URL)
        <!--- check whether the item has URL or not --->
        <p>
        <label><b>URL:</b></label>
        <a href="{{$item->URL}}">Check this product</a>
        </p>
    @else
        <p><b>URL: </b> No URL</p>
    @endif
    
    <p>
        <label><b> Reviews:</b></label>
    </p>
    @foreach($reviews as $review)
    <!--- loop through all the reviews and display their content --->
    @auth
    <!--- user is logged in --->
    @if ($review->dislike === NULL && $review->like === NULL)
        <div class="card" style="background-color:white" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                <form method="POST" action= '{{url("review/like/$review->id")}}'>
                    {{csrf_field()}}
                    <input type="submit" value="Like({{(count(explode(',', $review->like))-1)}})">
                    {{$review->like}}
                </form>
                <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                    {{csrf_field()}} 
                    <input type="submit" value="Dislike({{(count(explode(',', $review->dislike))-1)}})">
                    {{$review->dislike}}
                </form>
                    @if (Auth::user()->type === "Moderator")                        
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                
                    @elseif ($review->user->id === Auth::user()->id)
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @elseif ($review->dislike === NULL && $review->like != NULL && ((count(explode(',', $review->dislike))-1) < count(explode(',', $review->like))))
        <div class="card" style="background-color:peachpuff" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                    <form method="POST" action= '{{url("review/like/$review->id")}}'>
                    {{csrf_field()}}
                    <input type="submit" value="Like({{(count(explode(',', $review->like)))}})">
                    {{$review->like}}
                </form>
                <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                    {{csrf_field()}} 
                    <input type="submit" value="Dislike({{(count(explode(',', $review->dislike))-1)}})">
                    {{$review->dislike}}
                </form>
                
                    @if (Auth::user()->type === "Moderator")                        
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                
                    @elseif ($review->user->id === Auth::user()->id)
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @elseif ($review->dislike != NULL && $review->like != NULL && ((count(explode(',', $review->dislike))) < count(explode(',', $review->like))))
        <div class="card" style="background-color:peachpuff" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                    <form method="POST" action= '{{url("review/like/$review->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Like({{(count(explode(',', $review->like)))}})">
                        {{$review->like}}
                    </form>
                    <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                        {{csrf_field()}} 
                        <input type="submit" value="Dislike({{(count(explode(',', $review->dislike)))}})">
                        {{$review->like}}
                    </form>
                    @if (Auth::user()->type === "Moderator")                        
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                
                    @elseif ($review->user->id === Auth::user()->id)
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    @endif
                </div>
            </div> 
        </div> 
    @elseif ($review->dislike != NULL && $review->like != NULL && ((count(explode(',', $review->dislike))) > count(explode(',', $review->like))))
        <div class="card" style="background-color:oldlace" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                <form method="POST" action= '{{url("review/like/$review->id")}}'>
                    {{csrf_field()}}
                    <input type="submit" value="Like({{(count(explode(',', $review->like)))}})">
                    {{$review->like}}
                </form>
                <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                    {{csrf_field()}} 
                    <input type="submit" value="Dislike({{(count(explode(',', $review->dislike)))}})">
                    {{$review->dislike}}
                </form>
                
                    @if (Auth::user()->type === "Moderator")                        
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                
                    @elseif ($review->user->id === Auth::user()->id)
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    @endif
                </div>
            </div> 
        </div>
    @elseif ($review->dislike != NULL && $review->like != NULL && ((count(explode(',', $review->dislike))) == count(explode(',', $review->like))))
        <div class="card" style="background-color:white" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                    <form method="POST" action= '{{url("review/like/$review->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Like({{(count(explode(',', $review->like)))}})">
                        {{$review->like}}
                    </form>
                    <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                        {{csrf_field()}} 
                        <input type="submit" value="Dislike({{(count(explode(',', $review->dislike)))}})">
                        {{$review->dislike}}
                    </form>
                    @if (Auth::user()->type === "Moderator")                        
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                
                    @elseif ($review->user->id === Auth::user()->id)
                    
                        <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Edit">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    @endif
                </div>
            </div> 
        </div>
    @elseif ($review->like === NULL && $review->dislike != NULL && ((count(explode(',', $review->dislike))) > count(explode(',', $review->like))-1))
        <div class="card" style="background-color:oldlace" id="inner">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                <div class="line-up">
                    <form method="POST" action= '{{url("review/like/$review->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Like({{(count(explode(',', $review->like))-1)}})">
                        {{$review->like}}
                    </form>
                    <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                        {{csrf_field()}} 
                        <input type="submit" value="Dislike({{(count(explode(',', $review->dislike)))}})">
                        {{$review->dislike}}
                    </form>
                        @if (Auth::user()->type === "Moderator")                        
                            <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                                {{csrf_field()}}
                                <input type="submit" value="Edit">
                            </form>

                            <form method="POST" action= '{{url("review/$review->id")}}'>
                                {{csrf_field()}} 
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Delete">
                            </form>
                    
                        @elseif ($review->user->id === Auth::user()->id)
                        
                            <form method="GET" action= '{{url("review/$review->id/edit")}}'>
                                {{csrf_field()}} 
                                <input type="submit" value="Edit">
                            </form>

                            <form method="POST" action= '{{url("review/$review->id")}}'>
                                {{csrf_field()}} 
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Delete">
                            </form>
                        @endif
                </div>
                
            </div>
        </div>
    @endif 
    @endauth
    @endforeach

    <br><div id="outer">  
        <div id="inner">{{ $reviews->links()}}</div>
    </div>


    @auth 
    <div id="inner">
        @if (Auth::user()->type === "Moderator")
            <form method="GET" action= '{{url("item/$item->id/edit")}}'>
                {{csrf_field()}}
                <input type="submit" value="Edit this item">
            </form><br>
    
            <form method="POST" action= '{{url("item/$item->id")}}'>
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete this item">
            </form><br>
        @endif
        
        <form method="GET" action= '{{url("item/create")}}'>
            {{csrf_field()}} 
            <input type="submit" value="Create an item">
        </form>

        <form method="GET" action= '{{url("review/create_a_review/$item->id")}}'>
            {{csrf_field()}} 
            <input type="submit" value="Create a review">
        </form>
       
        <form method="GET" action= '{{url("item/upload_images/$item->id")}}'>
            {{csrf_field()}} 
            <input type="submit" value="Upload images">
        </form>
        </div><br>    
    @endauth

@endsection