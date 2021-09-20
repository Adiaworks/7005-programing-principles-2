<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    function products() {
        return $this->hasMany('App\Models\Product'); //$this means the Manufacturer class or model
        //(the fully qualified name of the Product needs to be inseted or refered in the begining by "use App\Models\Product")
        }
}
