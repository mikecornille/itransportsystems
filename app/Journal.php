<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
         
            public $fillable = [
            	'type',
            	'type_description',
            	'date',
            	'reference_number',
            	'account_name',
            	'account_id',
            	'memo',
            	'payment_amount',
            	'deposit_amount'


            ];
}
