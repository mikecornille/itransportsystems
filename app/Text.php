<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = [
        'message', 'toCell', 'pro', 'fromCell', 'sentAt'
    ];
}
