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
        'brand_id',
        'price',
        'sale_price',
        'gift',
        'description',
        'infomation_detail',
        'specifications',
        'status',
        'created_at',
        'updated_at',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'block_robot_google'
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

    public function brand(){
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }
}
