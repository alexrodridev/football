<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    protected $fillable = ['user_id', 'followed_id'];
}
