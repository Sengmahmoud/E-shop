@extends('master')

@section('cat')
    @foreach($cats as $cat)
        <div class="col-md-3">
            <div class="thumbnail">
                <a class="btn btn-primary" href="productstore/{{$cat->id}}">{{$cat->cat_name}}</a>

            </div>
            <br>
        </div>

    @endforeach
    @endsection
@section('content')
    @foreach($prods as $prod)
        <div class="col-md-3">
            <div class="thumbnail">
           <div>
                <img src="../images/{{$prod->prod_img}}" width="200" height="200">
           </div>
                <br>
            <div>
                <a class="btn btn-primary" href="home/{{$prod->cat_id}}/{{$prod->id}}" >{{$prod->prod_name}}</a>
            </div>
                <br>
                <div>
                <form method=" any"action="cartview/add" >
                    <input type="hidden" name="id" value="{{$prod->id}}" />
                    <input type="submit" class="btn btn-success" value="add to cart" />
                </form>
                </div>
                <h3>{{$prod->prod_price}} $</h3>

            </div>
        </div>

    @endforeach



@stop



