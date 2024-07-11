<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function subWeights()
    {
        return $this->hasMany(SubWeight::class, 'subscription_id');
    }
}
