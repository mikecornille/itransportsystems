<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Remit extends Model

{
	use Searchable;
    protected $fillable = ['name', 'address', 'city', 'state', 'zip', 'contact', 'email', 'phone', 'bank_name', 'account_name', 'routing_number', 'account_number', 'account_type', 'accounting_email', 'accounting_phone'];
}
