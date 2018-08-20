<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use\App\Role;
class AdminPanelController extends Controller
{
    public function index()
    {
    	$users=User::orderBy('created_at','desc')->limit(5)->get();
    	$products=Product::orderBy('created_at','desc')->limit(5)->get();
    	//dd($users);
    	return view('admin.AdminPanelControl',compact('users','categ','products'));

    }
      public function users()
    {
    	$users=User::all();
    	  $categ=Category::all();
        if (Auth::user()) {
              $cart_products = auth()->user()->cart->products;
         }
         else
            $cart_products=null;
       
    	return view('admin.users',compact('users','categ','cart_products'));

    }
    public function addrole(Request $request)
    {
    	$user=User::where('email', $request['email'])->first();
    	$user->roles()->detach();
    	if ($request['role_user']) {
    		$user->roles()->attach(Role::where('name','user')->first());
    	}
    	if ($request['role_editor']) {
    		$user->roles()->attach(Role::where('name','editor')->first());
    	}
    	if ($request['role_admin']) {
    		$user->roles()->attach(Role::where('name','Admin')->first());
    	}
    return redirect()->back();
    }
}
