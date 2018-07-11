<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($category,$id,Request $request)
    {$cat=Category::find($category);
        $pid=Product::find($id);
        $comment=new Comment();
        $comment->body=$request->body;
        $comment->prod_id=$pid->id;
        $comment->save();
        return back();
    }
}
