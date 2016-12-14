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
			  'name_1',
			  'phone_1',
			  'email_1',
			  'name_2',
			  'phone_2',
			  'email_2',
			  'name_3',
			  'phone_3',
			  'email_3',
			  'name_4',
			  'phone_4',
			  'email_4',
			  'internal_notes',
              


			  ];
}
