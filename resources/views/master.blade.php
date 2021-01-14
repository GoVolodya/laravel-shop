<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ URL::asset('/storage/favicon.ico') }}" type="image/x-icon"/>
    <title>Shop @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS links -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JS links -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    {{-- PC menu --}}
    <nav class="d-none d-sm-none d-md-block navbar navbar-dark bg-success sticky-top">
        <div class="container-fluid d-flex justify-content-between">
            <a href="{{route('main')}}" class="navbar-brand">Shop</a>
            <ul class="nav navbar-nav flex-row align-items-center justify-content-end">
                    <li class="mx-3"><a href="{{route('main')}}" class="h4 mb-0 text-light text-decoration-none">Main</a></li>
                    <li class="mx-3"><a href="{{route('categories')}}" class="h4 mb-0 text-light text-decoration-none">Categories</a></li>
                    <li class="mx-3"><a href="{{route('cart')}}" class="h4 mb-0 text-light text-decoration-none">Cart</a></li>
                    @auth
                    <li class="mx-3"><a href="{{route('profile')}}" class="h4 mb-0 text-light text-decoration-none">{{Auth::user()->name}}</a></li>
                    @if (Auth::user()->admin)
                        <li class="mx-3"><a href="{{ route('admin') }}" class="h4 mb-0 text-light text-decoration-none">Admin</a></li>
                    @endif
                    <li class="mx-3">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-secondary">
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="mx-1"><a href="{{route('login')}}" class="btn btn-light">Login</a></li>
                    <li class="mx-1"><a href="{{route('register')}}" class="btn btn-primary">Register</a></li>
                    @endguest
            </ul>
        </div>
    </nav>
    {{-- Mobile menu --}}
    <nav class="d-block d-sm-block d-md-none d-lg-none d-xl-none navbar navbar-dark bg-success sticky-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{route('main')}}" class="navbar-brand">Shop</a>
            </div>
            <button class="navbar-toggler collapsed bg-dark" type="button" data-toggle="collapse" data-target="#navdropdown" aria-controls="navdropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navdropdown">
                <ul class="nav navbar-nav align-items-center">
                    <li class="my-3"><a href="{{route('main')}}" class="h4 mb-0 text-light text-decoration-none">Main</a></li>
                    <li class="my-3"><a href="{{route('categories')}}" class="h4 mb-0 text-light text-decoration-none">Categories</a></li>
                    <li class="my-3"><a href="{{route('cart')}}" class="h4 mb-0 text-light text-decoration-none">Cart</a></li>
                    @auth
                    <li class="my-3"><a href="{{route('profile')}}" class="h4 mb-0 text-light text-decoration-none">{{Auth::user()->name}}</a></li>
                    @if (Auth::user()->admin)
                        <li class="my-3"><a href="{{ route('admin') }}" class="h4 mb-0 text-light text-decoration-none">Admin</a></li>
                    @endif
                    <li class="my-3">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-secondary">
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="my-3"><a href="{{route('login')}}" class="btn btn-light">Login</a></li>
                    <li class="my-3"><a href="{{route('register')}}" class="btn btn-primary">Register</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>   
    <div class="container-xl">
        @if (session()->has('success'))
            <div class="row my-4 d-flex justify-content-center">
                <p class="h2 mb-0 text-success text-center">{{ session()->get('success') }}</p>
            </div>
        @endif
        @yield('content')
        <div class="row mt-4 d-flex justify-content-center">
            Made by Isaiev Volodya &copy;
        </div>
    </div>   
</body>
</html>