<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberCategory extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'name',
        'photo'
    ];
    
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class ,'subscriber_category_id');
    }
}
