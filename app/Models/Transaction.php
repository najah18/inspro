<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
        // إضافة الحقول المسموح بها للـ Mass Assignment
        protected $fillable = ['subcategory_id', 'price', 'date'];

        // تعريف العلاقة بين Transaction و SubCategory
        public function subcategory()
        {
            return $this->belongsTo(SubCategory::class, 'subcategory_id');
        }
}
