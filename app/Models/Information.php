<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Information extends Model implements HasMedia
{
    
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable = [
        'logo',
        'facebook_link',
        'instagram_link',
        'tiktok_link',
        'youtube_link',
        'linkedin_link',
        'threads_link',
        'details',
        'address_1',
        'address_2',
        'map_link',
        'phone_number',
        'whatsapp_number',
        'email',
        'videos_nb',
        'work_link',
        'website_nb',
        'contents_nb',
        'photos_nb',
    ];


    // تحديد المجموعات التي سيُخزن فيها الوسائط
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logos')
            ->singleFile(); // لضمان تخزين صورة واحدة فقط
    }

    // تسجيل التحويلات (مثل تحويلات WebP و AVIF)
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90);

      
    }  
}
