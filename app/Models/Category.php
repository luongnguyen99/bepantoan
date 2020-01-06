<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id','name','slug','short_name','parent_id','image','seo_title','seo_keyword','seo_description','block_robot_google'
    ];


    public function properties(){
        return $this->belongsToMany('App\Models\Property', 'categories_properties');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }

    public function hasChildCategory(){
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

}
