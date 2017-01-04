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
			  'flatbed',
			  'stepdeck',
			  'conestoga',
			  'van',
			  'power',
			  'hot_shot',
			  'straight_truck',
			  'auto_carrier',
			  'lowboy',
			  'landoll',
			  'towing',
			  'email_colleague_carrier',

        ];

        public function setCompanyAttribute($value)
    {
        $this->attributes['company'] = strtoupper($value);
    }

      public function setContactAttribute($value)
    {
        $this->attributes['contact'] = strtoupper($value);
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

      public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtoupper($value);
    }

      public function setDriverNameAttribute($value)
    {
        $this->attributes['driver_name'] = strtoupper($value);
    }

     public function setRemitNameAttribute($value)
    {
        $this->attributes['remit_name'] = strtoupper($value);
    }

     public function setRemitAddressAttribute($value)
    {
        $this->attributes['remit_address'] = strtoupper($value);
    }

     public function setRemitCityAttribute($value)
    {
        $this->attributes['remit_city'] = strtoupper($value);
    }

     public function setRemitStateAttribute($value)
    {
        $this->attributes['remit_state'] = strtoupper($value);
    }

     public function setRemitZipAttribute($value)
    {
        $this->attributes['remit_zip'] = strtoupper($value);
    }

     public function setLoadInfoAttribute($value)
    {
        $this->attributes['load_info'] = strtoupper($value);
    }

     public function setPermanentNotesAttribute($value)
    {
        $this->attributes['permanent_notes'] = strtoupper($value);
    }

        public static function getTrailers() {
        	return ['flatbed',
			  'stepdeck',
			  'conestoga',
			  'van',
			  'power',
			  'hot_shot',
			  'straight_truck',
			  'auto_carrier',
			  'lowboy',
			  'landoll',
			  'towing',];
			}
}
