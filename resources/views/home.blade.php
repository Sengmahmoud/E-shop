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
                    @foreach($prods as $product)
                    <!-- Product Single -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-20%</span>
                                </div>
                                <a href="{{url($product->cat_id.'/'.$product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                <img src="{{asset('images/'.$product->prod_img)}}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">{{$product->prod_price}} <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="../{{$product->cat_id}}/{{$product->id}}">{{$product->prod_name}}</a></h2>
                               @if(Auth::user())
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                   
                                      <form method=" any" action="{{url('cartview/'.Auth::user()->id .'/'.auth()->user()->cart->id.'/add')}}" >
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}" />

                    <input type="submit" class="btn btn-success" value="add to cart" />
                </form>

                                

                                </div>
                                @endif
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