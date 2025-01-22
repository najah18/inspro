<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberCategory extends Model
{
    protected $fillable = ['name'];

    use HasFactory;
    
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class ,'subscriber_category_id');
    }
}
