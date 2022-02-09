<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'employeeID',
        'shippingName',
        'shippingAddress',
        'shippingPhone',
        'dateCreated',
        'isPaid',
        'total',
        'status',
    ];
}