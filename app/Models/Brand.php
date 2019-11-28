<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'id','name','slug','image','created_at','updated_at',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Product', 'brands_categories');
    }
}
