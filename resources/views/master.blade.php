<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-SHOP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">






    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">

        header{opacity: 0.7; text-align: center}
        footer{
            background-color: transparent;opacity: 0.9;text-align: center }
        .comments{
            border: 2px solid #ccc ;
            padding: 10px;}
    </style>
</head>
<body>
<header calss="jumborton">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @guest
				 <a class="navbar-brand" href="{{ url('/')}}">
                
                    @else
                       <a class="navbar-brand" href="{{asset('home/'.Auth::user()->id) }}">
                            @endguest
                     E-SHOP
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        @yield('cart')
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>



                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



    <div class="row" style="padding: 3%">


            @yield('cat')

    </div>
</header>

<div class="container" style="opacity: 0.9">
    <div class="row">
@yield('content')



</div>
</div>
<footer class="container">
    <a class="btn btn-success" href="{{asset('categorystore')}}"> view categories</a>
    <br>
    &Copy All right Reseved
</footer>
</body>
</html>
