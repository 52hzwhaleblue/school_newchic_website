<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'employeeID',
        'providerID',
        'totalPrice',
        'totalQuantity',
        'importedDate',
        'status',
    ];
}
