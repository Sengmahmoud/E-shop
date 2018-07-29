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
    public function show()
    {   $cats=Category::all();
        $prods=Product::all();
       // if(Auth::user())
        //$carts=Cart::where('user_id',Auth::user()->id)->get(['id']);

        return view('home',compact('cats','prods','carts'));
    }
    public function showauth($usid)
    {   $cats=Category::all();
        $prods=Product::all();
        //if(Auth::user())
            $user=Cart::where('user_id',$usid)->with('user')->first();
           // foreach ($user->cart as $us)
       if($user!=null)
                $carid=$user->id;



        return view('home',compact('cats','prods','carts','carid'));
    }
    public function onecategory($usid,Category $category)
    {
        $id=User::find($usid);
        return view('one_category',compact('category'));
    }

    public function cat_show()
    {   $cats=Category::all();
            return view('allcats_addnew',compact('cats'));
    }
    public function store(Request $request)
    {
        $cats=new Category;
        $cats->cat_name=$request->cat_name;
        $cats->save();
        return back();
    }
    public function delete(Category $id)
    {
        if(count($id->products))
        {
            return view('delete_all',compact('id'));
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
            return redirect('../../categorystore');
        }

    public  function upform(Category $id)
    {
        return view('update_cats',compact('id'));
    }
    public function update(Request $request,Category $id)
    {
        $id->update($request->all());
       return redirect('home');
    }
}
