<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_post', 'image_post', 'video_post', 'text_post',
    ];

    /**
     * Name table.
     *
     * @var string
     */
    protected $table = 'post';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}