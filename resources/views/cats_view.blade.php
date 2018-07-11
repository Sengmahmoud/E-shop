@extends('master')
@section('content')

        @foreach($cats as $cat)
        <div class="col-md-3">
            <div class="thumbnail">
                <a class="btn btn-primary" href="productstore/{{$cat->id}}">{{$cat->cat_name}}</a>

            </div>
            <br>
        </div>

        @endforeach

            @foreach($prods as $prod)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{asset('images/'.$prod->prod_img)}}" style="width:200px;height: 200px; border-radius: 12px"/>

                    <a class="btn btn-primary" href="productstore">{{$prod->prod_name}}</a>

                    <form method=" any"action="cartview/add">
                        <input type="hidden" name="id" value="{{$prod->id}}" />
                        <input type="submit" class="btn btn-success" value="add to cart" />
                    </form>
                    <h3>{{$prod->prod_price}} $</h3>
                </div>
            </div>

            @endforeach



@stop



