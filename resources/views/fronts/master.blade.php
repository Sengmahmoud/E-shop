<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('fronts/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/style.css')}}" />

    @yield('styles')
</head>

<body>
<!-- HEADER -->
@include('fronts.partials.header',[$categ,$cart_products])

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">@yield('breadcrumb')</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    @yield('container')
    <!-- /container -->
</div>
<!-- /section -->

<!-- FOOTER -->
@include('fronts.partials.footer')

<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('fronts/js/jquery.min.js')}}"></script>
<script src="{{asset('fronts/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronts/js/slick.min.js')}}"></script>
<script src="{{asset('fronts/js/nouislider.min.js')}}"></script>
<script src="{{asset('fronts/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('fronts/js/main.js')}}"></script>
@yield('js')
</body>

</html>
