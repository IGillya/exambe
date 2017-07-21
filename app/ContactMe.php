<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
    protected $fillable = [
        'email', 'subject', 'message',
    ];
}
