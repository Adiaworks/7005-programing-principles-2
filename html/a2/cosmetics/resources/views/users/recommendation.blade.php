@extends('layouts.master')

@section('title')
Recommendation
@endsection

@section('content')
<p>
    Recommendation
</p>
<div class="album py-5 bg-light">
    <div class="container">
        <div>
            <p>Popular Items in following:</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @if (count($items) != 0)

            @foreach ($items as $item)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header">
                        {{$item->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Price: {{$item->price}}</p>
                        <p class="card-text">Manufacture: {{$item->manufacture_name}}</p>
                        <p class="card-text">Description: {{$item->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p><b>Recommendation: </b>Please follow some people firstly.</p>
            @endif

        </div>

        <div>
            <p>Popular Users in following:</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @if (count($users) != 0)

            @foreach ($users as $user)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header">
                        {{$user->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Email: {{$user->email}}</p>
                        <p class="card-text">User type: {{$user->type}}</p>
                    </div>
                    @auth
                    @if ((Auth::user()->following) === '')
                    @if(($user->id) != (Auth::user()->id))
                    <form method="POST" style="text-align:center;" action='{{url("user/follow/$user->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Follow this user">
                    </form>
                    @endif
                    @else
                    @if (str_contains(Auth::user()->following, $user->id))
                    <form method="POST" style="text-align:center;" action='{{url("user/unfollow/$user->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Unfollow this user">
                    </form>
                    @elseif (($user->id) != (Auth::user()->id))
                    <form method="POST" style="text-align:center;" action='{{url("user/follow/$user->id")}}'>
                        {{csrf_field()}}
                        <input type="submit" value="Follow this user">
                    </form>
                    @endif
                    @endif
                    @endauth
                </div>
            </div>
            @endforeach
            @else
            <p><b>Recommendation: </b>Please follow some people firstly.</p>
            @endif

        </div>
    </div>
</div>
@endsection