<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_name',
        'invoice_date',
        'file_path',
        'price',
        'invoice_category_id',
    ];

    public function invoiceCategory()
    {
        return $this->belongsTo(InvoiceCategory::class, 'invoice_category_id');
    }
}
