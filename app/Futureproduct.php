<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Futureproduct extends Model
{
	 use SoftDeletes;

    protected $fillable = [
        'product_name','product_description', 'product_code','product_quentity','deleted_at',
        'product_image','product_left_image','product_right_image','product_up_image',
        'product_down_image',
    ];
}
