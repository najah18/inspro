<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    public function subscriberCategory()
    {
        return $this->belongsTo(SubscriberCategory::class ,'subscriber_category_id');
    }
}
