<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'subscription_id',
        'subscription_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
}
