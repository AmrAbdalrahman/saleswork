<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";

    protected $fillable = [
        'product_name', 'product_des', 'product_images','user_id'
    ];
    
}
