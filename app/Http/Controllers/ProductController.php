<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function show(Category $category)
    {

        return view('one_category',compact('category'));
    }


    public function prod_show(Category $category,Product $prod_id)
    {


        return view('product_view',compact('prod_id','category'));
    }
    public function store($category,Request $request)
    {
        $cat=Category::find($category);
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
        $prod=new Product;

        $prod->prod_name=$name;

        $prod->prod_img=$img_name;
        $prod->cat_id=$cat->id;
        $prod->prod_price=$request->prod_price;
        $prod->prod_qunt=$request->prod_qunt;
        $prod->save();
        $request->prod_img->move(public_path('images'),$img_name);
        return redirect('home');

    }
    public function delete(Product $prod_id)
    {
        $prod_id->delete();
        return back();
    }

}
