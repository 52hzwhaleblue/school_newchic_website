<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'userID',
        'productID',
        'name',
        'sale',
        'startDate',
        'endDate',
        'limit',
        'status',
    ];
}
