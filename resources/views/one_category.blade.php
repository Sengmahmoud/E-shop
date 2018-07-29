@extends('master')
@section('content')
@foreach($category->products as $prod)
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="/images/{{$prod->prod_img}}" style="width:200px;height: 200px; border-radius: 12px"/>
            <br>
            <a class="btn btn-primary" href="#">{{$prod->prod_name}}</a>
            <a class="btn btn-danger" href="{{$prod->id}}/delete">Delete</a>
            <br>
            <h3>{{$prod->prod_price}}</h3>
        </div>
    </div>
@endforeach
@if(Auth::user())
<table class="table">
    <form method="post" action="../productstore/{{$category->id}}/add" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <tr><td>name:</td><td> <input name="prod_name" placeholder="product name" /></td></tr>
        <tr><td>img: </td><td><input type="file" name="prod_img" /></td></tr>


        <tr><td>price:  </td><td><input name="prod_price" placeholder="product price" /></td></tr>
        <tr><td>quantity:  </td><td><input name="prod_qunt" placeholder="product quantity" /></td></tr>
        <tr><td colspan="2"><button type="submit" class="btn btn-success btn-lg">Add</button></td></tr>

    </form>
</table>
    @endif
    @stop