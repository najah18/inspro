<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FeaturedService extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'price',
    ];


   // تسجيل مجموعة الوسائط
   public function registerMediaCollections(): void
   {
       $this->addMediaCollection('featured_services')
           ->singleFile(); // لضمان حفظ صورة واحدة فقط
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
}
