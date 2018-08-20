@extends('master')
@section('content')
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Are you sure that you want to delete all products in {{$id->cat_name}} category</h3>
        </div>
        <div class="panel-body">
             <a class="btn btn-danger" href="{{url('admin/categorystore/'.$id->id)}}/deleteAll">Delete All</a>
            <a class="btn btn-primary" href="{{url('admin/categorystore')}}">Back</a>


        </div>


    </div>
    @stop