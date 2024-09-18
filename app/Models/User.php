<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function projects()
    {
        // A firm can have many projects
        return $this->hasMany(Project::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isInvestor()
    {
        return $this->role === 'investor';
    }

    public function isFirm()
    {
        return $this->role === 'firm';
    }

    public function hasRole()
    {
        if ($this->isAdmin()) {
            return 'admin';
        } elseif ($this->isFirm()) {
            return 'firm';
        } else {
            return 'investor';
        }
    }
}