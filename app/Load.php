<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $table = 'loads';
    //change
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
              'carrier_name',
              'carrier_address',
              'carrier_city',
              'carrier_state',
              'carrier_zip',
              'carrier_contact',
              'carrier_email',
              'carrier_phone',
              'carrier_fax',
              'carrier_driver_name',
              'carrier_driver_cell',
			  'pick_company',
			  'pick_address',
			  'pick_city',
			  'pick_state', 
			  'pick_zip',
			  'pick_contact',
			  'pick_phone',
			  'pick_email',
              'pick_date',
              'pick_time',
              'pick_status',
			  'delivery_company',
			  'delivery_address',
			  'delivery_city',
			  'delivery_state',
			  'delivery_zip',
			  'delivery_contact',
			  'delivery_phone',
			  'delivery_email',
              'delivery_date',
              'delivery_time',
              'delivery_status',
			  'po_number',
			  'ref_number',
			  'bol_number',
			  'amount_due',
              'carrier_rate',
              'billed_date',
              'approved_carrier_invoice',
			  'commodity',
			  'special_ins',
              'trailer_type',
			  'internal_notes',
			  'add_stops',
			  'invoice_notes',
			  'update_customer_message',
              'rate_con_creation_date',
              'rate_con_signed',
              'quick_status_notes',
              'vendor_invoice_number',
              'vendor_invoice_date',
              'remit_name',
              'remit_address',
              'remit_city',
              'remit_state',
              'remit_zip',
              'carrier_message',
              'internal_email_address',
              'internal_message',


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

    public function setCarrierNameAttribute($value)
    {
        $this->attributes['carrier_name'] = strtoupper($value);
    }

    public function setCarrierAddressAttribute($value)
    {
        $this->attributes['carrier_address'] = strtoupper($value);
    }

    public function setCarrierCityAttribute($value)
    {
        $this->attributes['carrier_city'] = strtoupper($value);
    }

    public function setCarrierStateAttribute($value)
    {
        $this->attributes['carrier_state'] = strtoupper($value);
    }

    public function setCarrierZipAttribute($value)
    {
        $this->attributes['carrier_zip'] = strtoupper($value);
    }

    public function setCarrierContactAttribute($value)
    {
        $this->attributes['carrier_contact'] = strtoupper($value);
    }

    public function setCarrierEmailAttribute($value)
    {
        $this->attributes['carrier_email'] = strtoupper($value);
    }

    public function setCarrierDriverNameAttribute($value)
    {
        $this->attributes['carrier_driver_name'] = strtoupper($value);
    }

    public function setCarrierRateAttribute($value)
    {
        $this->attributes['carrier_rate'] = strtoupper($value);
    }

    public function setInternalNotesAttribute($value)
    {
        $this->attributes['internal_notes'] = strtoupper($value);
    }

    public function setTotalMilesAttribute($value)
    {
        $this->attributes['total_miles'] = strtoupper($value);
    }
    public function setQuickStatusNotesAttribute($value)
    {
        $this->attributes['quick_status_notes'] = strtoupper($value);
    }
    public function setVendorInvoiceNumberAttribute($value)
    {
        $this->attributes['vendor_invoice_number'] = strtoupper($value);
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
     public function setCarrierMessageAttribute($value)
    {
        $this->attributes['carrier_message'] = strtoupper($value);
    }
    public function setInternalMessageAttribute($value)
    {
        $this->attributes['internal_message'] = strtoupper($value);
    }


    
}
