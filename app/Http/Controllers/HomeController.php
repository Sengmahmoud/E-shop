<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }
    public function viewcart()
    {
        $carts=Cart::all();
        return view('cart',compact('carts'));
        //return view('cart');
    }


}
