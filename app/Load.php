<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $table = 'example_loads';

    protected $fillable = [
			  'customer_name',
			  'customer_address',
			  'customer_city',
			  'customer_state',
			  'customer_zip',
			  'customer_contact',
			  'customer_email',
			  'customer_phone',
			  'customer_fax',
			  'pick_company',
			  'pick_address',
			  'pick_city',
			  'pick_state', 
			  'pick_zip',
			  'pick_contact',
			  'pick_phone',
			  'pick_email',
			  'delivery_company',
			  'delivery_address',
			  'delivery_city',
			  'delivery_state',
			  'delivery_zip',
			  'delivery_contact',
			  'delivery_phone',
			  'delivery_email',
			  'po_number',
			  'ref_number',
			  'bol_number',
			  'amount_due',
			  'creation_date',
			  'commodity',
			  'special_ins',
			  'internal_notes',
			  'add_stops',
			  'invoice_notes',
			  'update_customer_message'

			  ];
  
  	public function setCustomerNameAttribute($value)
    {
        $this->attributes['customer_name'] = strtoupper($value);
    }
    


    
}
