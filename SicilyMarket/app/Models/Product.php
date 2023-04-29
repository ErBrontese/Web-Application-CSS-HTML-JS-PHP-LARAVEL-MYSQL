<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class)->using(Cart_product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
