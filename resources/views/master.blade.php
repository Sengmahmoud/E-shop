<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script  href="{{asset('js/bootstrap.min.js')}}"></script>
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
    <div class="container">
        <h1 >Shop</h1>
        <p>surf online</p>
        <div align="right">
            <a class="btn btn-danger"  href="{{asset('cartview')}}"><i class="fa fa-search-plus"  ></i> Quick view</a>
        </div>
        <div align="left">
            @yield('cat')
        </div>
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
