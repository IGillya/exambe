<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;


class Post extends Model
{
    protected $fillable = [
        'title', 'body','slug', 'category_id'
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }


    public function category ()
    {
        return $this->belongsTo('App\Category');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
