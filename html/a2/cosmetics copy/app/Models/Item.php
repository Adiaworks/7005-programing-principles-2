<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'manufacture_name', 'image', 'URL'];
    
    function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    function user() {
        return $this->belongsTo('App\Models\User');
    }
}
