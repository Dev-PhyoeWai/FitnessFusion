<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'ingredient', 'type', 'calories',
        'image', 'subscription_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
