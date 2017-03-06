<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Remit extends Model

{
	use Searchable;
    protected $fillable = ['name', 'address', 'city', 'state', 'zip'];
}
