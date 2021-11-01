<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    protected $fillable = ['topic_id', 'subscriber_id'];

    use HasFactory;


}
