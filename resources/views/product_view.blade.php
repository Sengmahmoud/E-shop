@extends('master')
@section('content')


    <div class="col-md-12 img">
        <img class="img-responsive center-block img-thumbnail"
             src="{{asset('images/'.$prod_id->prod_img)}}" height="450" width="500" alt="No immage"/>
    </div>
    <br>
    <div class="col-md-10 productInfo" align="right">
        <ul class="list-unstyled">
            <li><i class="fa fa-calendar fa-fw"></i><span>Name</span>: {{$prod_id->prod_name}}</li>
            <li><i class="fa fa-money fa-fw"></i> <span>Price</span>:${{$prod_id->prod_price}}</li>
            <li><i class="fa fa-star fa-fw"></i> <span>Quntatity</span>:{{$prod_id->prod_qunt}}</li>
            <li><i class="fa fa-tags fa-fw"></i> <span>Category</span>: <a class="btn btn-primary" href="{{asset('productstore/'.$category->id)}}">{{$category->cat_name}}</a></li>
        </ul>
    </div>


    <div class="col-md-12"  >
        @foreach($prod_id->comments as $comment)
            <p class="comments">{{$comment->body}}</p>
        @endforeach
    </div>
<div class="col-md-12">

    <form method="post" action="{{url('home/'.$prod_id->cat_id.'/'.$prod_id->id.'/store')}}">
        {{csrf_field()}}
        <div class="form-group"  >
            <label >write somesing...</label>
            <textarea type="text" name="body" class="form-control" ></textarea>
        </div>
        <div class="form-group"  >
            <button type="submit" class="btn btn-primary">ADD Comment</button>
        </div>
    </form>
</div>









    @stop