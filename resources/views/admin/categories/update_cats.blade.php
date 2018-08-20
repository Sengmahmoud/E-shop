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
                        <form  action="{{url('admin/categorystore/'.$id->id.'/update')}}"  method="post">

                            {{ csrf_field() }}

                           

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="cat_name"  class="form-control" value="{{ $id->cat_name }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Edit Category</button>
                            </div>

                        </form>
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














