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
			  'customer_ambassador',
              'weekly_email',
              'accounting_email',
              'accounting_phone',
              'accounting_name'
        ];

              public function setAccountingEmailAttribute($value)
    {
        $this->attributes['accounting_email'] = strtoupper($value);
    }

      public function setAccountingPhoneAttribute($value)
    {
        $this->attributes['accounting_phone'] = strtoupper($value);
    }
              public function setAccountingNameAttribute($value)
    {
        $this->attributes['accounting_name'] = strtoupper($value);
    }

           public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function setLocationNumberAttribute($value)
    {
        $this->attributes['location_number'] = strtoupper($value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtoupper($value);
    }
    public function setStateAttribute($value)
    {
        $this->attributes['state'] = strtoupper($value);
    }
    public function setZipAttribute($value)
    {
        $this->attributes['zip'] = strtoupper($value);
    }
    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = strtoupper($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtoupper($value);
    }
    public function setInternalNotesAttribute($value)
    {
        $this->attributes['internal_notes'] = strtoupper($value);
    }
}
