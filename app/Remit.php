<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Remit extends Model

{
	use Searchable;
    protected $fillable = ['name', 'address', 'city', 'state', 'zip', 'contact', 'email', 'phone', 'routing_number', 'checking_number'];
}
