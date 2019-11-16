<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id','name','slug','parent_id',
    ];
    
    public function brands(){
        return $this->belongsToMany('App\Models\Brand', 'brands_categories');
    }

    public function properties(){
        return $this->belongsToMany('App\Models\Property', 'categories_properties');
    }

    
}
