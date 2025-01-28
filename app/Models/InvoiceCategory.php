<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'invoice_category_id');
    }
}
