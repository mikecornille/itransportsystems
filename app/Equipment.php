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
}
