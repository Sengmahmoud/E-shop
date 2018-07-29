<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
	public function products()
    {
       return $this->hasMany('App\Cartproduct');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
