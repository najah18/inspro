<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SubCategory extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];


        // تسجيل مجموعة الوسائط
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('sub_categories')->singleFile();
        }
    
        // تسجيل التحويلات
        public function registerMediaConversions(?Media $media = null): void
        {
            $this->addMediaConversion('webp')
                ->format('webp')
                ->quality(90);
    
            $this->addMediaConversion('avif')
                ->format('avif')
                ->quality(90);
        }

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
