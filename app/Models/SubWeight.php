<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubWeight extends Model
{
    use HasFactory;
    protected $fillable = ['subscription_id', 'weight_id'];

    public function subscription()
    {
        return $this->belongsTo(SubscriptionType::class, 'subscription_id');
    }

    public function weight()
    {
        return $this->belongsTo(WeightType::class, 'weight_id');
    }
}
