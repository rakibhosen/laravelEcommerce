<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'phone_no', 'email', 'password', 'avatar', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
