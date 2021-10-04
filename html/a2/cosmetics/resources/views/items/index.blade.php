@extends('layouts.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@if ($items)
@foreach($items as $item)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{url(explode(',',$item->image)[0])}}" width="100%" height="300px" style="object-fit: cover" alt="cosmetic images" role="img">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c" />                   
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

@endsection