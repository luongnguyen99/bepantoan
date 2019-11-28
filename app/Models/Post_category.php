<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    protected $table = 'post_categories';

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'post_category_id', 'id');
    }
}
