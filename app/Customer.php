<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Customer extends Model
{
	use Searchable;
    protected $fillable = [
			  'name',
			  'location_number',
			  'address',
			  'city',
			  'state',
			  'zip',
			  'fax',
			  'contact',
			  'phone',
			  'email',
			  'internal_notes',
        ];
}
