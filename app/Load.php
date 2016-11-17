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

    public function setCustomerAddressAttribute($value)
    {
        $this->attributes['customer_address'] = strtoupper($value);
    }

    public function setCustomerCityAttribute($value)
    {
        $this->attributes['customer_city'] = strtoupper($value);
    }

    public function setCustomerStateAttribute($value)
    {
        $this->attributes['customer_state'] = strtoupper($value);
    }

     public function setCustomerZipAttribute($value)
    {
        $this->attributes['customer_zip'] = strtoupper($value);
    }

     public function setCustomerContactAttribute($value)
    {
        $this->attributes['customer_contact'] = strtoupper($value);
    }

     public function setCustomerEmailAttribute($value)
    {
        $this->attributes['customer_email'] = strtoupper($value);
    }
    
    public function setPickCompanyAttribute($value)
    {
        $this->attributes['pick_company'] = strtoupper($value);
    }

     public function setPickAddressAttribute($value)
    {
        $this->attributes['pick_address'] = strtoupper($value);
    }

     public function setPickCityAttribute($value)
    {
        $this->attributes['pick_city'] = strtoupper($value);
    }

     public function setPickStateAttribute($value)
    {
        $this->attributes['pick_state'] = strtoupper($value);
    }

    public function setPickZipAttribute($value)
    {
        $this->attributes['pick_zip'] = strtoupper($value);
    }

     public function setPickContactAttribute($value)
    {
        $this->attributes['pick_contact'] = strtoupper($value);
    }

     public function setPickEmailAttribute($value)
    {
        $this->attributes['pick_email'] = strtoupper($value);
    }
    
	public function setDeliveryCompanyAttribute($value)
    {
        $this->attributes['delivery_company'] = strtoupper($value);
    }

     public function setDeliveryAddressAttribute($value)
    {
        $this->attributes['delivery_address'] = strtoupper($value);
    }

     public function setDeliveryCityAttribute($value)
    {
        $this->attributes['delivery_city'] = strtoupper($value);
    }

     public function setDeliveryStateAttribute($value)
    {
        $this->attributes['delivery_state'] = strtoupper($value);
    }

    public function setDeliveryZipAttribute($value)
    {
        $this->attributes['delivery_zip'] = strtoupper($value);
    }

     public function setDeliveryContactAttribute($value)
    {
        $this->attributes['delivery_contact'] = strtoupper($value);
    }

     public function setDeliveryEmailAttribute($value)
    {
        $this->attributes['delivery_email'] = strtoupper($value);
    }

     public function setPoNumberAttribute($value)
    {
        $this->attributes['po_number'] = strtoupper($value);
    }

     public function setRefNumberAttribute($value)
    {
        $this->attributes['ref_number'] = strtoupper($value);
    }

     public function setBolNumberAttribute($value)
    {
        $this->attributes['bol_number'] = strtoupper($value);
    }

     public function setAmountDueAttribute($value)
    {
        $this->attributes['amount_due'] = strtoupper($value);
    }

	public function setCommodityAttribute($value)
    {
        $this->attributes['commodity'] = strtoupper($value);
    }

     public function setSpecialInsAttribute($value)
    {
        $this->attributes['special_ins'] = strtoupper($value);
    }

     public function setAddStopsAttribute($value)
    {
        $this->attributes['add_stops'] = strtoupper($value);
    }

     public function setInvoiceNotesAttribute($value)
    {
        $this->attributes['invoice_notes'] = strtoupper($value);
    }

     public function setUpdateCustomerMessageAttribute($value)
    {
        $this->attributes['update_customer_message'] = strtoupper($value);
    }


    
}
