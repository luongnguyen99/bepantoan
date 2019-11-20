<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'price',
        'sale_price',
        'gift',
        'description',
        'infomation_detail',
        'specifications',
        'status',
        'created_at',
        'updated_at'
    ];

    public function property_values(){
        return $this->belongsToMany('App\Models\Property_value', 'products_property_values');
    }

    public function galleries(){
        return $this->hasMany('App\Models\Gallery','product_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
