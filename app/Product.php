<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['id','name'];
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function carts()
    {
       return $this->belongsToMany('App\Cart','cart_products','prod_id','cart_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','prod_id');
    }
}
