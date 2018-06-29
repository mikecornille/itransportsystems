<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Journal extends Model
{
         
            public $fillable = [
            	     'type',
            	   'type_description',
                  'type_description_sub',
            	     'date',
            	     'reference_number',
            	     'account_name',
            	     'account_id',
            	     'memo',
            	     'payment_amount',
            	     'deposit_amount',
                  'city',
                  'state',
                  'zip',
                  'name_on_check',
                  'payment_number',
                  'invoice_date_journal',
                  'upload_date',
                  'payment_method',
                  'address',
                  'payment_cents',
                  'cleared',
                  'cleared_date',
                  'off_ledger',
                  'created_at'


            ];

             public function setInvoiceDateJournalAttribute($value)
    {
      $date = Carbon::createFromFormat('m/d/Y', $value, "America/Chicago");
           
      $this->attributes['invoice_date_journal'] = $date;
    }

    public function getInvoiceDateJournalAttribute($value)
    {
      return $this->attributes['invoice_date_journal'] = date("m/d/Y", strtotime($value));
           
    }


     public function setUploadDateAttribute($value)
    {
      $date = Carbon::createFromFormat('m/d/Y', $value, "America/Chicago");
           
      $this->attributes['upload_date'] = $date;
    }

    public function getUploadDateAttribute($value)
    {
      return $this->attributes['upload_date'] = date("m/d/Y", strtotime($value));
           
    }

    
}
