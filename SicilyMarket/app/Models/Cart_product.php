<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart_product extends Model
{

    protected $fillable = ['quantità' , 'cart_id' , 'product_id'];
    use HasFactory;

   

}
