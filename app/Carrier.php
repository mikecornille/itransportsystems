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
			  'trailer_type_1',
			  'trailer_type_2',
			  'trailer_type_3',
			  'email_colleague_carrier',
        'load_route',
        'current_carrier_rate',
        'current_trailer_type',
        'current_city_location',
        'current_miles_from_pick',
        'delivery_schedule',
        'insurance_company_email',
        'bank_name',
        'account_name',
        'routing_number',
        'account_number',
        'account_type',
        'accounting_email',
        'accounting_phone',
        'security',
        'ach_token',
        'workers_comp'
        
        // 'fmcsa_time'
        // 'active',
        // 'google_carrier',
        // 'oos_driver_national',
        // 'oos_driver_company',
        // 'oos_vehicle_national',
        // 'oos_vehicle_company',
        // 'allowed_to_operate',
        // 'operation_type',
        // 'crashes',
        // 'fatal_crashes',
        // 'number_of_drivers',
        // 'number_of_power',

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

    public function makeAchToken()
    {
      $this->ach_token = str_random(60);
    }

    public function saveAchToken()
    {
      $this->makeAchToken();
      $this->save();
    }

        // public static function getTrailers() {
   //      	return ['flatbed',
			//   'stepdeck',
			//   'conestoga',
			//   'van',
			//   'power',
			//   'hot_shot',
			//   'straight_truck',
			//   'auto_carrier',
			//   'lowboy',
			//   'landoll',
			//   'towing',];
			// }

   //          public static function validationRules($validateTrailerTypes = true) {
   //              $validation_rules = [

   //          'company' => 'required',              
   //            'contact' => 'required',
   //            'address' => 'required',
   //            'city' => 'required',
   //            'state' => 'required',
   //            'zip' => 'required',
   //            'mc_number' => 'required',
   //            'dot_number' => 'required',
   //            'phone' => 'required',
   //            'email' => 'required',
   //            'driver_name' => 'required',
   //            'driver_phone' => 'required',
   //            'cargo_exp' => 'required',
   //            'cargo_amount' => 'required'

   //            ];

   //          if ($validateTrailerTypes) {
   //                            $trailer_types = static::getTrailers();

   //            foreach($trailer_types as $key => $trailer_type) {
   //                  $trailer_types_filtered = $trailer_types;
   //                  unset($trailer_types_filtered[$key]);
   //              $validation_rules[$trailer_type] = 'bail|required_without_all:' . implode(',',$trailer_types_filtered);       
   //               }
   //          }


        
   //                  return $validation_rules;
   //          }
}
