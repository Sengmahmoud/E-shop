<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartproduct extends Model
{
    protected $table = 'cart_products';
    protected $fillable = ['prod_id'];
	
	public function product()
    {
        return $this->belongsTo('App\Product', 'prod_id');
    }
}
