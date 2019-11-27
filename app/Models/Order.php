<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'name_guest',
        'phone',
        'email',
        'address',
        'note',
        'total',
        'method_payment',
        'status',
        'created_at',
        'updated_at'
    ];

    public function order_details(){
        return $this->hasMany('App\Models\Order_detail','order_id','id');
    }

    public function status(){
        return $this->hasOne('App\Models\Status_order','id','status');
    }

    
}
