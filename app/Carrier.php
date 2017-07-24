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
        'load_route',
        'current_carrier_rate',
        'current_trailer_type',
        'current_city_location',
        'current_miles_from_pick',
        'delivery_schedule',

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

            public static function validationRules($validateTrailerTypes = true) {
                $validation_rules = [

            'company' => 'required',              
              'contact' => 'required',
              'address' => 'required',
              'city' => 'required',
              'state' => 'required',
              'zip' => 'required',
              'mc_number' => 'required',
              'dot_number' => 'required',
              'phone' => 'required',
              'email' => 'required',
              'driver_name' => 'required',
              'driver_phone' => 'required',
              'cargo_exp' => 'required',
              'cargo_amount' => 'required'

              ];

            if ($validateTrailerTypes) {
                              $trailer_types = static::getTrailers();

              foreach($trailer_types as $key => $trailer_type) {
                    $trailer_types_filtered = $trailer_types;
                    unset($trailer_types_filtered[$key]);
                $validation_rules[$trailer_type] = 'bail|required_without_all:' . implode(',',$trailer_types_filtered);       
                 }
            }


        
                    return $validation_rules;
            }
}
