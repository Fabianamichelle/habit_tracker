<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'logged_for',
        'completed',
        'streak_count',
    ];
    
    /**
     * Cast attributes to proper types.
     */
    protected $casts = [
        'completed' => 'boolean',
        'logged_for' => 'datetime',
    ];

    /**
     * Get the user that owns the habit.
     */
    public function user()  
    {
        return $this->belongsTo(User::class);
    }


}
