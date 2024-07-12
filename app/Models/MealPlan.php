<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'ingredient', 'calories', 'type', 'image'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

