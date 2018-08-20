<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
 public function show()
    {   
        $prods=Product::all();
        //dd($prods);
         $categ=Category::all();
         if (auth()->check())
          {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
       // if(Auth::user())
        //$carts=Cart::where('user_id',Auth::user()->id)->get(['id']);
//dd($prods);
        return view('home',compact('prods','carts','categ','cart_products'));
    }


 public function index()
 {
  $products=Product::all();
 
   $categ=Category::all();
         if (auth()->check())
          {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
  return view('admin.products.index',compact('products','carts','categ','cart_products'));
 }


public function prodshowadmin($id)
 {

  $product=Product::find($id);
 //dd($product);
   $categ=Category::all();
         if (auth()->check())
          {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
  return view('admin.products.show',compact('products','carts','categ','cart_products','product'));
 }

public  function upform(Product $product)
    {
        $categ=Category::all();
       // $product=Product::all();

        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
        return view('admin.products.edit',compact('id','cart_products','categ','product'));
    }
    public function update(Request $request,Product $product)
    {
     
   //$file = $request->file('prod_img');

    //Display File Name
    //$destinationPath = 'images';
    //$file->move($destinationPath,$file->getClientOriginalName());
  $img_name=time().'.'.$request->prod_img->getClientOriginalExtension();
    $product->prod_name=$request->prod_name;
    $product->prod_price=$request->prod_price;
    $product->cat_id=$request->cat_id;
    $product->prod_img=$img_name;
   // $product->prod_img=$file->getClientOriginalName();
    $product->save();
  $request->prod_img->move(public_path('images'),$img_name);
    return redirect('productsIndex');

  }//end of update
    public function prod_show(Category $category,Product $prod_id)
    {
        $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;

        return view('product_view',compact('prod_id','category','categ','cart_products'));
    }

public function showcreate()
{
   $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;

        return view('admin.products.create',compact('prod_id','category','categ','cart_products'));
}


    public function store(Request $request)
    {
       // $cat=Category::find($category);
       /* $prod_name=$request->input('prod_name');
        $file=$request->file('image');
        $destinationPath='images';
        $filename=$file->getClientOriginalName();
        $file->move($destinationPath,$filename);
        $prod=new Product;
        $prod->prod_name=$prod_name;
        $prod->prod_img=$filename;
        $prod->prod_price=$request->prod_price;
        $prod->prod_qunt=$request->prod_qunt;
        $prod->cat_it=$request->cat_id;
        $prod->save();
        return redirect('home');
*/
        $img_name=time().'.'.$request->prod_img->getClientOriginalExtension();
        $name=$request->prod_name;
        $product=new Product;

        $product->prod_name=$name;

        $product->prod_img=$img_name;
        $product->cat_id=$request->cat_id;
        $product->prod_price=$request->prod_price;
        $product->prod_qunt=$request->prod_qunt;
        $product->save();
        $request->prod_img->move(public_path('images'),$img_name);
        return redirect('productsIndex');

    }
    public function delete(Product $prod_id)
    {
        $prod_id->delete();
        return back();
    }

    
}
