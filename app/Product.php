<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
        'product_name','product_description', 'product_code', 'product_price','product_quentity','product_image','product_left_image','product_right_image','product_up_image',
        'product_down_image','category_id','category_name'
    ];

    public function relationcategory()
    {
    	return $this->hasOne('App\categorie','id', 'category_id');
    }
}

