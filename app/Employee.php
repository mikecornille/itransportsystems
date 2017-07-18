<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [

              'name',
			  'month',
			  'year',
			  'months_profit',
			  'employee_type',
			  'weekly_draw',
			  'ncm',
			  'commission',
			  'bonus',
			  'additional',
			  'employee_payout_notes',

    ];
}
