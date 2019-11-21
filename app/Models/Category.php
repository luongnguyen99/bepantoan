<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id','name','slug','parent_id','image',
    ];
    

    public function properties(){
        return $this->belongsToMany('App\Models\Property', 'categories_properties');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }
    
}
