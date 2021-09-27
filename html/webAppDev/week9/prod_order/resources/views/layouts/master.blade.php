<!DOCTYPE html>
<html>
<head>
    <link href="https://s5273584.elf.ict.griffith.edu.au/webAppDev/week9/prod/resources/css/wp.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    @auth <!--- user is logged in --->
        {{Auth::user()->name}}
        <form method="POST" action= "{{url('/logout')}}">
           {{csrf_field()}}
           <input type="submit" value="Logout">
        </form>
    @else <!--- user is not logged in --->
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
    @yield('content')
</body>
</html>