@extends('master')
@section('content')

        <span><b>All Categoriess</b></span>

        <table class="table table-dark">
            <tbody>
            @foreach($carts as $cart)

            <tr>
                    <td>
                    <img src="../images/{{$cart->products->prod_img}}" alt="mo" width="100" height="100">
                    </td>
              <td>
                    <h3 class="product-price">{{$cart->products->prod_price * $cart->qnt}}</h3>
              </td>
                <td>
                    <h2 class="product-name"><a href="#">{{$cart->products->prod_name}}</a></h2>
                </td>
                <td>
                    <a class="btn-btn-danger" href="cartview/{{$cart->id}}/delete">Delete</a>
                </td>
            </tr>


        @endforeach



            </tbody>
        </table>
    @stop