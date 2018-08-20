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
                        <a href="{{url('/createview')}}" class="btn btn-primary">Create</a>
                       <table class="table table-bordered table-responsive">
                           <tr>
                               <th>name</th>
                               <th>price</th>
                               <th>image</th>
                               <th>category</th>
                               <th>action</th>
                           </tr>
                           @foreach($products as $product)
                            <tr>
                                <th>{{$product->prod_name}}</th>
                                <th>{{$product->prod_price}}</th>
                                <th><img src="{{asset("images/".$product->prod_img)}}" width="50px" height="50px"></th>
                            
                                 
                       <th>      {{$product->categories->cat_name}} </th>


                            
                              
                        {{--     <th>--}}<?php
                                     // $category=\App\Category::find($product->cat_id);
                                      //if($category)
                                      	//echo $category->cat_name;
                                   ?>{{--</th>--}}
                                <th>
                                    <a href="{{ url('productsIndex/'.$product->id.'/show') }}" class="btn btn-primary" ><span class="fa fa-eye"></span></a>
                                    <a href="{{url('productsIndex/'.$product->id.'/edit')}}" class="btn btn-warning" ><span class="fa fa-edit"></span></a>
                                    <form action="#" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger">Detete</button>
                                    </form>
                                </th>
                            </tr>
                           @endforeach
                       </table>
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