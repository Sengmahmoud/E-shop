@extends('master')
@section('content')


<div class= "col-md-12">
	  <table class="table table-dark" >
            <tbody>
            	<span><b>All Categoriess</b></span>

 @foreach($cart_products as $cart)
<form action="{{url('cartview/'.Auth::user()->id.'/'.$cart->cart_id.'/pay')}}" method="post" >
	{{csrf_field()}}
       

        
      

           

            <tr>
                    <td>
                    <img src="{{asset('images/'.$cart->product->prod_img)}}" alt="mo" width="100" height="100">
                    </td>
              <td>
                    <h3 class="product-price">{{$cart->product->prod_price }}</h3>
              </td>
			  <td>
                    <input type="checkbox" name="product[]" value="{{$cart->prod_id}}" >
              </td>
                <td>
                    <h2 class="product-name"><a class="btn btn-primary" href="{{url($cart->product->cat_id.'/'.$cart->prod_id)}}">{{$cart->product->prod_name}}</a></h2>
                </td>
                <td>
                    <a class="btn btn-danger" href="../{{Auth::user()->id}}/{{$cart->cart_id}}/{{$cart->id}}/delete">Delete</a>
                </td>
            </tr>


        @endforeach


           </tbody>
           
        </table>
        	<input class="btn btn-primary" type="submit"  value="PayNow"> 
         </form>
          
       
         </div>
    @stop