<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $table = 'loads';

    protected $fillable = [
        'customer_name',
        'customer_address',
        'customer_city',
        'customer_state',
    ];

}
