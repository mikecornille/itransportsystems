<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Location extends Model
{
    use Searchable;

    protected $fillable = [
			  'location_name',
			  'location_number',
			  'address',
			  'city',
			  'state',
			  'zip',
			  'contact',
			  'phone',
			  'email',
			  'cell',
			  'location_notes',


			  ];

	public function setLocationNameAttribute($value)
    {
        $this->attributes['location_name'] = strtoupper($value);
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

    public function setLocationNotesAttribute($value)
    {
        $this->attributes['location_notes'] = strtoupper($value);
    }
}
