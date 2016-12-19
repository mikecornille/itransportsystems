<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Location extends Model
{
    use Searchable;

    protected $fillable = [
			  'location_name',
			  'location_number',
			  'address',
			  'city',
			  'state',
			  'zip',
			  'contact',
			  'phone',
			  'email',
			  'cell',
			  'location_notes',


			  ];
}
