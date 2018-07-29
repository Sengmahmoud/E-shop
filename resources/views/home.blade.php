@extends('master')


@section('cart')
@if(Auth::user())
@if($carid !=null)

    <a class="dropdown-item"  href="../cartview/{{Auth::user()->id}}/{{$carid}}" ><i class="fa fa-search-plus"  ></i> Quick view</a>

    @endif

@endif
@endsection

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
        <div class="col-md-3" style="padding: 2%">
            <div class="thumbnail">
           <div>
                <img src="../images/{{$prod->prod_img}}" width="200" height="200">
           </div>

            <div style="padding: 2%">
                <a class="btn btn-primary" href="../{{$prod->cat_id}}/{{$prod->id}}" >{{$prod->prod_name}}</a>
            </div>
                @if(Auth::user())
                <div style="padding: 2%">

                <form method=" any" action="{{url('cartview/'.Auth::user()->id .'/'.$carid.'/add')}}" >
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$prod->id}}" />

                    <input type="submit" class="btn btn-success" value="add to cart" />
                </form>

                </div>
                @endif
                <h3>{{$prod->prod_price}} $</h3>

            </div>
        </div>

    @endforeach



@stop



