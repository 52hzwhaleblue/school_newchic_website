<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedInvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'importedInvoiceID',
        'productID',
        'productName',
        'quantity',
        'imported_price',
        'retail_price',
        'wholesale_price',
        'image',
    ];
}