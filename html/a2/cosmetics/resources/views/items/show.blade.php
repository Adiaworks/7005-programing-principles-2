@extends('layouts.master')

@section('content')

    <h2>{{$item->name}}</h2>
    @if ($item->image != "")
        @foreach(explode(',', $item->image) as $image)
            <img src="{{url($image)}}" style="object-fit: cover" width="30%" height="300px" alt="cosmetic images" role="img">
        @endforeach
    @endif
    
    <p><b>Price: </b>{{$item->price}}</p>
    <p><b>Manufacture: </b>{{$item->manufacture_name}}</p>
    <p><b>Description: </b>{{$item->description}}</p>
       
    @if ($item->URL)
        <p>
        <label><b>URL:</b></label>
        <a href="{{$item->URL}}">Check this product</a>
        </p>
    @else
        <p><b>URL: </b> No URL</pp>
    @endif
    
    <p>
        <label><b> Reviews:</b></label>
    </p>
    @foreach($reviews as $review)
        <div class="card">
            <div class="container">
                <p>Rating: {{$review->rating}}</p>
                <p>Review: {{$review->content}}</p>
                <p>Created by: {{$review->user->name}} {{$review->created_at}}</p>
                @auth 
                <div class="line-up">
                    
                    @if ($review->like === NULL) 
                        <form method="POST" action= '{{url("review/like/$review->id")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Like({{(count(explode(',', $review->like))-1)}})">
                        </form>
                    @else
                        <form method="POST" action= '{{url("review/like/$review->id")}}'>
                            {{csrf_field()}}
                            <input type="submit" value="Like({{count(explode(',', $review->like))}})">
                        </form>
                    @endif

                    @if ($review->dislike === NULL)
                        <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Dislike({{(count(explode(',', $review->dislike))-1)}})">
                        </form>
                    @else
                        <form method="POST" action= '{{url("review/dislike/$review->id")}}'>
                            {{csrf_field()}} 
                            <input type="submit" value="Dislike({{count(explode(',', $review->dislike))}})">
                        </form>
                    @endif

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
                            <input type="submit" value="Update">
                        </form>

                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    
                    @endif
                </div>
                @endauth
            </div>
        </div><br>
    @endforeach

    <div id="outer">  
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