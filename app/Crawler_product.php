<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crawler_product extends Model
{
    protected $table = 'crawler_products';
    protected $fillable = [
        'url','brand_id','category_id',
    ];
}
