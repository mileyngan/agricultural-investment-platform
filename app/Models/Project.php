<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount',
        'status',
        'user_id', // Include user_id in fillable properties
    ];

    /**
     * Define the relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship to the Investment model.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function reports()
{
    return $this->hasMany(ProjectReport::class); 
}
}