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
                         <a href="{{url('admin/categorystore/addform')}}">Create</a>
                       <table class="table table-bordered table-responsive">
                           <tr>
                               <th>name</th>
                               <th>action</th>
                           </tr>
                           @foreach($cats as $category)
                            <tr>
                                <th>{{$category->cat_name}}</th>
                                <th>
                                    <a href="{{url('category/'.$category->id)}}" class="btn btn-primary" ><span class="fa fa-eye"></span></a>
                                    <a href="{{url('admin/categorystore/'.$category->id.'/upform')}}" class="btn btn-warning" ><span class="fa fa-edit"></span></a>
                                    <a href="{{url('admin/categorystore/'.$category->id.'/delete')}}" class="btn btn-danger ">Delete</a>
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






































