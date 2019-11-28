<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'product_id',
        'amount',
        'qty',
        'order_id',
        'created_at',
        'updated_at'
    ];
}
