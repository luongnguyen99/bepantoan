<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories_properties extends Model
{
    protected $table = 'categories_properties';
    protected $fillable = [
        'category_id', 'property_id'
    ];
}
