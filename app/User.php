<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'lname', 'user_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function seguindo()
    {
        return $this->hasMany('App\Seguidores','followed_id');
    }

    public function seguidores()
    {
        return $this->hasMany('App\Seguidores');
    }

    public function autorPost()
    {
        return $this->hasMany('App\Post','author_post');
    }
}
