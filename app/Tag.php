<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
class Tag extends Model
{
    public function posts ()
    {
        return $this->belongsToMany('App\Post');
    }
}
