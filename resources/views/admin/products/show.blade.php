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
                        <p>{{$product->prod_name}}</p>
                        <p>{{$product->prod_price}}</p>
                        <p>{{$product->prod_cat_id}}</p> 
                         <p>{{$product->prod_qunt}}</p>
                        <p><img src="{{asset("images/".$product->prod_img)}}" width="100px" height="100px"></p>
                     

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