<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
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
			  'internal_notes',
              


			  ];
}
