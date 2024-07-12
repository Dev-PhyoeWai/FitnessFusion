<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'name', 'body_part', 'type', 'set', 'raps', 'image', 'gender'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

