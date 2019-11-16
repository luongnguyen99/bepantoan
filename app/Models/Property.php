<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'name','slug','created_at','updated_at'
    ];

    public function property_values(){
        return $this->hasMany('App\Models\Property_value','property_id','id');
    }
}
