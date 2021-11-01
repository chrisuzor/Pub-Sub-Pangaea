<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;


    public function getRouteKeyName()
    {
        return 'title';
    }

    public function events(){

        return $this->hasMany(Event::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriptions');
    }
}
