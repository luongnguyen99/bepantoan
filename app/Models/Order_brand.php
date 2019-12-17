<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_brand extends Model
{
    protected $table = 'order_brand';
    protected $fillable = [
        'category_id','brand_id','order_position','created_at','updated_at',
    ];

    public function getBrandOrder()
    {
        return $this->hasMany('App\Models\Order_brand','category_id','category_id')->orderBy('order_position','asc');
    }

}
