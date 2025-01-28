<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'type',
        'amount',
        'payment_date',
        'notes',
    ];

    // علاقة مع جدول العمال
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
