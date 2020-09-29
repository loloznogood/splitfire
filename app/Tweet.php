<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author', 'message', 'hashtag'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
   // protected $hashtag = ['hashtag' => 'array'];
}