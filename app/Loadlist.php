<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loadlist extends Model
{
	use SoftDeletes;
    protected $fillable = [
    		'created_by',
			'customer',
			'urgency',
            'load_type',
            'trailer_type',
            'pick_city',
            'pick_state',
            'pick_date',
            'pick_time',
            'delivery_city',
            'delivery_state',
            'delivery_date',
            'delivery_time',
            'commodity',
            'special_instructions',
            'handler',
            'length',
            'width',
            'height',
            'weight',
            'miles',
            'billing_money',
            'offer_money',
            'post_money',
        ];

        public function setCreatedByAttribute($value)
    {
        $this->attributes['created_by'] = strtoupper($value);
    }
       public function setCustomerAttribute($value)
    {
        $this->attributes['customer'] = strtoupper($value);
    }
       public function setPickCityAttribute($value)
    {
        $this->attributes['pick_city'] = strtoupper($value);
    }
      public function setPickStateAttribute($value)
    {
        $this->attributes['pick_state'] = strtoupper($value);
    }
      public function setDeliveryCityAttribute($value)
    {
        $this->attributes['delivery_city'] = strtoupper($value);
    }
      public function setDeliveryStateAttribute($value)
    {
        $this->attributes['delivery_state'] = strtoupper($value);
    }
     public function setCommodityAttribute($value)
    {
        $this->attributes['commodity'] = strtoupper($value);
    }
    public function setSpecialInstructionsAttribute($value)
    {
        $this->attributes['special_instructions'] = strtoupper($value);
    }
    public function setHandlerAttribute($value)
    {
        $this->attributes['handler'] = strtoupper($value . ' ' . date("g:i A"));
    }
}
