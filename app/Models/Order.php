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
}
