<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    protected $fillable = [
        'user_id', 'firm_name', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}