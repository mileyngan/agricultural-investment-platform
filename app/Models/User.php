<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable; 

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

    public function routeNotificationFor($channel)
    {
        if ($channel === 'mail') {
            return $this->email; // Return the email for the mail channel
        }

        return null; // Return null if channel is not handled
    }
}