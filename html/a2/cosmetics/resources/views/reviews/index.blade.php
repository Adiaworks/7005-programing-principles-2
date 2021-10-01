@extends('layouts.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@if ($items)
@foreach($items as $item)
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Images</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text"><a href="{{url("item/$item->id")}}">{{$item->name}}</a></p>
                    </div>
                </div>
            </div>
@endforeach
@else
    <h1>No item found</h1>
@endif
        </div>
    </div>
</div>
<p>
    <form method="GET" action= '{{url("item/create")}}'>
        {{csrf_field()}} 
        <input type="submit" value="Create">
    </form>
</p>
@endsection