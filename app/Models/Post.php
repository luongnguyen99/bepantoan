<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function post_categories()
    {
        return $this->belongsTo('App\Models\Post_category', 'post_category_id', 'id');
    }
}
