<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body','prod_id'];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
