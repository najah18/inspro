<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'photo', 'video', 'subscriber_category_id'];

    public function category()
    {
        return $this->belongsTo(SubscriberCategory::class, 'subscriber_category_id');
    }
}
