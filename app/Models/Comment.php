<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'name_guest',
        'phone',
        'content',
        'rate_star',
        'product_id',
        'created_at',
        'updated_at',
    ];
}
