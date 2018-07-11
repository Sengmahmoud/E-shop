<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {

     //   $carts=Cart::where('prod_id',$product->id)->get();
       // $p=Product::find($product->id);
        $carts=new Cart ;
        $carts->prod_id=$request->id;
        $carts->qnt=1;
        $carts->save();
        return redirect('home');
    }

    public function show()
    {

        $carts=Cart::all();
        return view('cart',compact('carts'));

    }
    public function delete($id)
    {
      Cart::destroy($id);
        return redirect('cartview');
    }
}
