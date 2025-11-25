<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // penting untuk login
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
     protected $casts = [
        'password' => 'hashed',
    ];
}
