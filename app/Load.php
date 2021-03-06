<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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
              'signed_rate_con',
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
              'trailer_for_search',
              'carrier_mc',
              'carrier_id',
              'routing_number',
              'account_number',
              'account_type',
              'account_name',
              'payment_method',
            'paid_amount_from_customer',
            'payment_method_from_customer',
            'ref_or_check_num_from_customer',
            'deposit_date',
            'customer_id',
            'vendor_check_number',
            'carrierPayStatus',
            'customerPayStatus',
            'totalCheckAmountFromCustomer',
            'accounting_email',
            'upload_date',
            'cleared',
            'cleared_date',
            'quick_pay_flag',
            'is_full_load',
            'piece_count'


			  ];

    public function paidNotBilled()
    {
      $loads = Load::select('id', 'customer_name', 'customer_id', 'amount_due', 'carrier_name', 'carrier_rate', 'carrierPayStatus', 'customerPayStatus', 'billed_date')->where('carrierPayStatus', 'COMPLETED')->where('customerPayStatus', 'OPEN')->orderBy('id', 'asc')->get();

      return $loads;
    } 

    public function paidVSAmount()
    {
      $loads = Load::select('id', 'customer_name', 'customer_id', 'amount_due', 'paid_amount_from_customer', 'customerPayStatus', 'billed_date')->where('customerPayStatus', 'PAID')->whereColumn('amount_due', '!=', 'paid_amount_from_customer')->orderBy('id', 'asc')->get();


        //       SELECT *
        // FROM my_table
        // WHERE NOT column_a <=> column_b

      return $loads;
    }   

     

    public function setDepositDateAttribute($value)
    {
      $date = Carbon::createFromFormat('m/d/Y', $value, "America/Chicago");
           
      $this->attributes['deposit_date'] = $date;
    }

    public function getDepositDateAttribute($value)
    {
      return $this->attributes['deposit_date'] = date("m/d/Y", strtotime($value));
           
    }

    public function setApprovedCarrierInvoiceAttribute($value)
    {
      $date = Carbon::createFromFormat('m/d/Y', $value, "America/Chicago");
           
      $this->attributes['approved_carrier_invoice'] = $date;
    }

    public function getApprovedCarrierInvoiceAttribute($value)
    {
      
      return $this->attributes['approved_carrier_invoice'] = date("m/d/Y", strtotime($value));
           
    }
  
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

    //  public function setUpdateCustomerMessageAttribute($value)
    // {
    //     $this->attributes['update_customer_message'] = strtoupper($value);
    // }

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
    //  public function setCarrierMessageAttribute($value)
    // {
    //     $this->attributes['carrier_message'] = strtoupper($value);
    // }
    public function setInternalMessageAttribute($value)
    {
        $this->attributes['internal_message'] = strtoupper($value);
    }

    public function accounts_receivable_total($start_date, $end_date)
    {
      
        // $accounts_receivable = Load::whereNotNull('billed_date')
        // ->where('billed_date', '!=', '')
        // ->where('customerPayStatus', 'OPEN')
        // ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
        // ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
        // ->sum('amount_due');


      $accounts_receivable = Load::
        whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
        ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
        ->where('deposit_date', '>', $end_date)
        ->sum('amount_due');
     

        


    

        return $accounts_receivable;
    }

    public function accounts_payable_total($start_date, $end_date)
    {
      
         
      
        // $accounts_payable = Load::whereNotNull('vendor_invoice_date')
        // ->where('vendor_invoice_date', '!=', '')
        // ->where('carrierPayStatus', 'APPRVD')
        // ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
        // ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
        // ->sum('carrier_rate');



      $accounts_payable = Load::
        whereBetween('approved_carrier_invoice', [$start_date, $end_date])
        ->sum('carrier_rate');

        dd($accounts_payable);

        return $accounts_payable;
    }

    public function customerCreditCheckingAccount()
    {
        $customer = Load::select('customer_name as name', 'amount_due as rate', 'deposit_date as date', 'ref_or_check_num_from_customer as reference_number', 'id', 'customer_id as account_id', 'payment_method_from_customer as method')->where('customerPayStatus', 'PAID')->get();

            $customer->map(function ($customer) {
                $customer['type'] = 'Credit';
                return $customer;
            });

            $customer->map(function ($customer) {
                $customer['type_des'] = 'Revenue';
                return $customer;
            });

        return $customer;
    }

    public function carrierClearedChecks()
    {
        $carrier = Load::select('carrier_name as name', 'carrier_rate as rate', 'cleared_date as date', 'vendor_check_number as reference_number', 'id', 'carrier_id as account_id', 'payment_method as method', 'cleared', 'cleared_date')->where('carrierPayStatus', 'COMPLETED')->where('payment_method', 'CHECK')->where('cleared', 'YES')->get();

        $carrier->map(function ($carrier) {
          $carrier['type'] = 'Debit';
          return $carrier;
        });

         $carrier->map(function ($carrier) {
          $carrier['type_des'] = 'Expense';
          return $carrier;
        });

        return $carrier;
    }

    public function carrierACHPayments()
    {
      $carrier = Load::select('carrier_name as name', 'carrier_rate as rate', 'upload_date as date', 'vendor_check_number as reference_number', 'id', 'carrier_id as account_id', 'payment_method as method', 'cleared', 'cleared_date')->where('carrierPayStatus', 'COMPLETED')->where('payment_method', 'ACH')->get();

      $carrier->map(function ($carrier) {
          $carrier['type'] = 'Debit';
          return $carrier;
        });

         $carrier->map(function ($carrier) {
          $carrier['type_des'] = 'Expense';
          return $carrier;
        });

        return $carrier;
    }

    public function revenue_for_net_income($start_date, $end_date)
    {
      $rev = Load::whereNotNull('billed_date')
                  ->where('billed_date', '!=', '')
                  ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
                  ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
                  ->sum('amount_due');

                  return $rev;
    }

    public function expense_for_net_income($start_date, $end_date)
    {
      $exp = Load::whereNotNull('vendor_invoice_date')
                  ->where('vendor_invoice_date', '!=', '')
                  ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
                  ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
                  ->sum('carrier_rate');

                  return $exp;
    }
   

    

    



    
}
