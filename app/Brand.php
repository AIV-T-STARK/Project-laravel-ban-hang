<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function product()
    {
    	return $this->hasMany('App\Product', 'brand_id', 'id');
    }
}
