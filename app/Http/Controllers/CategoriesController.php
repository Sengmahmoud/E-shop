<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriesController extends Controller
{
    public function show()
    {   $cats=Category::all();
        $prods=Product::all();
        return view('home',compact('cats','prods'));
    }
    public function onecategory(Category $category)
    {
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
        $id->delete();
        return back();
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
