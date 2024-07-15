<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'body_part', 'type', 'set',
        'raps', 'image', 'gender', 'subscription_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
