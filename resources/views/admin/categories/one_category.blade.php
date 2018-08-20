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
                        <h2>{{$category->cat_name}}</h2>
                        @foreach($category->products as $prod)
                         <div class="col-md-3">
        <div class="thumbnail">
            <img src="/images/{{$prod->prod_img}}" style="width:200px;height: 200px; border-radius: 12px"/>
            <br>
            <a class="btn btn-primary" href="#">{{$prod->prod_name}}</a>
            <a class="btn btn-danger" href="{{url('productstore/'.$prod->id.'/delete')}}">Delete</a>
            <br>
            <h3>{{$prod->prod_price}}</h3>
        </div>
    </div>
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

