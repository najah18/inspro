<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'salary',
        'phone',
        'identity_image',
        'contract_file',
    ];

    // علاقة مع جدول المدفوعات
    public function payments()
    {
        return $this->hasMany(WorkerPayment::class);
    }
}
