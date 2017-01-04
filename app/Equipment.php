<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Equipment extends Model
{
    use Searchable;
    protected $fillable = [
			  'make',
			  'model',
			  'length',
			  'width',
			  'height',
			  'weight',
			  'commodity',
			  'loading_instructions',
			  
             ];

             public function setMakeAttribute($value)
    {
        $this->attributes['make'] = strtoupper($value);
    }

    public function setModelAttribute($value)
    {
        $this->attributes['model'] = strtoupper($value);
    }

    public function setCommodityAttribute($value)
    {
        $this->attributes['commodity'] = strtoupper($value);
    }

    public function setLoadingInstructionsAttribute($value)
    {
        $this->attributes['loading_instructions'] = strtoupper($value);
    }
}
