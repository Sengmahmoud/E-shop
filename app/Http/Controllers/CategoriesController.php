<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CategoriesController extends Controller
{
 
 


   
    public function showauth(User $usid)
    {   $categ=Category::all();
        $prods=Product::all();
        $cart_products = auth()->user()->cart->products;
       

        return view('home',compact('categ','prods','carts','usid','cart_products'));
    }
    public function onecategory(Category $category)
    {

        $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
    //    $id=User::find($usid);
        return view('admin.categories.one_category',compact('category','categ','cart_products'));
    }

    public function cat_show()
    {   $cats=Category::all();

        $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
            return view('admin.categories.allcats_addnew',compact('cats','categ','cart_products'));
    }

    public function addform()//to create new category
    {
         $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
        return view('admin.categories.create',compact('categ','cart_products'));
    }




    public function store(Request $request)
    {
        $cats=new Category;
        $cats->cat_name=$request->cat_name;
        $cats->save();
      return redirect('admin');
    }
    public function delete(Category $id)
    {
        if(count($id->products))
        {
            return view('admin.categories.delete_all',compact('id'));
        }
        else {
            $id->delete();
            return back();
        }
    }
    public function deleteAll(Category $id)
    {
                 $id->delete();
                 $id->products()->delete();
            return redirect('../../admin');
        }

    public  function upform(Category $id)
    {
        $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
        return view('admin.categories.update_cats',compact('id','categ','cart_products'));
    }
    public function update(Request $request,Category $id)
    {
        $id->update($request->all());
       return redirect('admin');
    }
}
