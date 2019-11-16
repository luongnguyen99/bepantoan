<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products_property_values extends Model
{
    protected $table = 'products_property_values';
    protected $fillable = [
        'category_id', 'property_value_id'
    ];
}
