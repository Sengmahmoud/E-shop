<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function carts()
    {
       return $this->hasMany('App\Cart');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','prod_id');
    }
}
