<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'price_high',
        'image',
        'status',
    ];

    public function product_details(){
        return $this->hasMany(ProductDetail::class,'id','productID');
    }
}