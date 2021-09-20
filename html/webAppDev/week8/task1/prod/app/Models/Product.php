<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;//this line allows us to inherit Model class to our class Product

class Product extends Model //our Product class equals to a child class of Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'manufacturer_id'];
    function manufacturer() {
        return $this->belongsTo('App\Models\Manufacturer');
        }
}
//to call the class Product, we need to use the full path like App\Medels\Product, or type "use App\Medels\Product;"at the begining of a file