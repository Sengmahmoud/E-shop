<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cartproduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{


    public function store($usid, $id,Request $request)
    {
      //$user=User::find($usid);
      // $cart=Cart::find($id);
      $product=Product::where('id',$request->id)->first();

        $cart=auth()
                    ->user()
                    ->cart()
                    ->firstOrCreate(
                        ['user_id'=>auth()->user()->id],
                        ['qnt'=>0]
					);
		
	
        $cart_product = $cart->products()
							->firstOrCreate(
								['prod_id'=>$product->id],
								['prod_id'=>$product->id]
							);
        $cart->qnt=$cart->products()->count();
        $cart->save();
        //$cart->products()->attach($cart);

        return redirect('/home/'.auth()->user()->id);
    }


    public function show($usid,$id)
    {

        //$user=User::find($usid);
//$prods=Cart::where('id',$id)->with('products')->first();
         //   $prods=$user->cart;
		//$prods=Product::all()
		
		$cart_products = auth()->user()->cart->products;
	///	foreach($cart_products as $cat_product){
		//	echo $cat_product->product->prod_name.'<br>';
		//}


		return view('cart',compact('cart_products'));

    }




    public function delete($usid,$id,Cartproduct $prod)
    {
        $prod->delete();
    return redirect('/cartview/'.auth()->user()->id.'/'.$id);
    }

    public function pay($usid,$cartid,Request $request)
    {

        $selectedproducts=$request->product;
    //  dd($selectedproducts);
if($selectedproducts>0) {
    $total = 0;
    foreach ($selectedproducts as $selected) {
        $select = Product::findOrFail($selected);
        if ($select) {
            $total = $total + $select->prod_price;
        }
    }
    //$this->total=$total;
    dd($total);
}
else{
        return Redirect::back();
    }
    }
}
