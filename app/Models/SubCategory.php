<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{   
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
        'price',
        'category_id',
    ];

    // تعريف العلاقة بين SubCategory و Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'subcategory_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

public function users()
{
    return $this->belongsToMany(User::class, 'favorites');
}


}
