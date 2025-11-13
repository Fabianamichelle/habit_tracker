<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'cost',
        'type',
        'value',
    ];

    // user rewards relationship
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_rewards')->withTimestamps()
        ->withPivot('purchased_at');
    }
}