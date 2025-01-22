<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
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
    
    use HasFactory;
}
