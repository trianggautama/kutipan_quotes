<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotes(){

      return $this->hasMany('App\Models\quote');
    }

    public function QuoteComments(){

      return $this->hasMany('App\Models\QuoteComments');
    }

    public function notifications(){

      return $this->hasMany('App\Models\notification');
    }

}
