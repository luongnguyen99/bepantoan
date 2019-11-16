<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property_value extends Model
{
    protected $table = 'property_values';
    protected $fillable = [
        'name', 'slug','property_id','created_at', 'updated_at'
    ];

    public function property(){
        return $this->belongsTo('App\Models\Property');
    }
}
