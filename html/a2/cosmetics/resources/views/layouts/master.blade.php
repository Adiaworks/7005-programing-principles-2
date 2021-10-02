<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Cosmetics</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .user-detail {
            color: white;
            background-color: transparent;
            text-decoration: none;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="{{url("item")}}" class="navbar-brand d-flex align-items-center"><strong>Cosmetics</strong></a>
                <a href="{{url("review")}}" class="navbar-brand d-flex align-items-center">Reviews</a>
                <a href="{{url("documentation")}}" class="navbar-brand d-flex align-items-center">Documentation</a>

                @auth
                <!--- user is logged in --->
                <div class="user-detail">
                    {{Auth::user()->name}}
                    {{Auth::user()->type}}
                </div>
                <form method="POST" action="{{url('/logout')}}">
                    {{csrf_field()}}
                    <input type="submit" value="Logout">
                </form>
                @else
                <!--- user is not logged in --->
                <div>
                    <a href="{{ route('login') }}"><button>Log in</button></a>
                    <a href="{{ route('register') }}"><button>Register</button></a>
                </div>
                @endauth
            </div>

        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1"><a href="#">Back to top</a></p>
            <p class="mb-1">Find your cosmetics and leave your review!</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>