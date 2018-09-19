<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    // the guard that we will authenticate against
    // This correlates with settings in config/auth.php
    /* 
        The way it handles multiple user type 
        authentication is a system called “guards”.
        guards (location: config/auth.php.) are how we tell Laravel which tables 
        and drivers to use for different user types. 
    */
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
