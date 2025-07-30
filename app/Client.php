<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'pan_number', 'aadhar_number', 'profile',
        'dob', 'address', 'city', 'state', 'pincode', 'occupation',
    ];

    protected $hidden = ['password'];   
}
