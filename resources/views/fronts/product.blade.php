@extends('fronts.master')
@section('style')

@endsection
@section('title')
    Product
@endsection
@section('breadcrumb')
    Product
@endsection
@section('container')
<div class="container">
    <!-- row -->
    <div class="row">


        <!-- MAIN -->
        <div id="main" class="">


            <!-- STORE -->
            <div id="">
                <!-- row -->
                <div class="row">
                    @foreach($products as $product)
                    <!-- Product Single -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-20%</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="{{asset('fronts/img/'.$product->image)}}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">{{$product->price}} <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">{{$product->name}}</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <a href="{{route('cart.store',$product->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->

                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /STORE -->

            <!-- store bottom filter -->

            <!-- /store bottom filter -->
        </div>
        <!-- /MAIN -->
    </div>
    <!-- /row -->
</div>
@stop
@section('js')

@endsection