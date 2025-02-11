<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Income extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'price', 'date'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('incomes')
            ->singleFile(); // لضمان تخزين صورة واحدة فقط
    }
}
