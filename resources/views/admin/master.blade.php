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

  

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('fronts/css/font-awesome.min.css')}}">


<link type="text/css" rel="stylesheet" href="{{asset('fronts/css/backend.css')}}" />
</head>
<body>
@include('admin.inti')

<div class="section">

    <!-- container -->
    @yield('container')
    <!-- /container -->
</div>

<script src="{{asset('fronts/js/jquery.min.js')}}"></script>
<script src="{{asset('fronts/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronts/js/slick.min.js')}}"></script>
<script src="{{asset('fronts/js/nouislider.min.js')}}"></script>
<script src="{{asset('fronts/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('fronts/js/main.js')}}"></script>
<script src="{{asset('fronts/js/backend.js')}}"></script>
@yield('js')
</body>

</html>
