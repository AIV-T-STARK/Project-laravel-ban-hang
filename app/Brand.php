<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function category()
    {
    	$this->belongsTo('App\Category', 'category_id');
    }

    public function product()
    {
    	$this->hasMany('App\Product', 'brand_id', 'id');
    }
}
