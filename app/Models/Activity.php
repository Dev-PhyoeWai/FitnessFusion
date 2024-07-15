<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'duration',
        'distance',
        'calories_burned',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
