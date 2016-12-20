<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Carrier extends Model
{
    use Searchable;
    protected $fillable = [
			  'company',
			  'contact',
			  'mc_number',
			  'dot_number',
			  'address',
			  'city',
			  'state',
			  'zip',
			  'phone',
			  'fax',
			  'email',
			  'driver_name',
			  'driver_phone',
			  'cargo_exp',
			  'cargo_amount',
			  'bc_contract',
			  'remit_name',
			  'remit_address',
			  'remit_city',
			  'remit_state',
			  'remit_zip',
			  'load_info',
			  'permanent_notes',
        ];
}
