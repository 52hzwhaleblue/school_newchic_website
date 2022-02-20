<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'productID',
        'SKU',
        'price',
        'quantity',
        'size',
        'color',
        'image',
        'typeID',
        'providerID',
        'status',
    ];

    public function products(){
        return $this->belongsTo(Product::class,'productID','id');
    }
}