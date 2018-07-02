<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
                  'bank_name',
                  'routing_number',
                  'account_number',
                  'account_type',
                  'accounting_email',
                  'accounting_phone',
                  'account_name_routing',
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

    public function createACH($id)
    {

      
      $load = Journal::findOrFail($id);

       $info = ['info' => $load ];

      Mail::send(['html'=>'email.sendEmailToVendorReceivingACHFromJournal'], $info, function($message) use ($info){

      $message->to($info['info']['accounting_email'])
      ->cc(\Auth::user()->email)
      ->subject("ACH Payment Notice from ITS for PRO # " . $info['info']['id'])
      ->from('lianey@itransys.com', 'Liane')
      ->replyTo('lianey@itransys.com', 'Liane')
      ->sender('lianey@itransys.com', 'Liane');

          });


        //Update the database 
    // date_default_timezone_set("America/Chicago");
    //     $currentDate = Carbon::now();

    // \DB::table('loads')->where('id', $id)->update([
    //   'carrierPayStatus' => "COMPLETED",
    //   'upload_date' => $currentDate
    // ]);



    $journal_entry = Journal::select('routing_number', 'account_number', 'payment_amount', 'account_type', 'account_name_routing', 'id')
    ->where('id', $id)->get();



    $journal_entry->map(function ($journal_entry) {
          $journal_entry['addenda'] = 'This payment is from Intl Transport Systems on our PRO # ' . $journal_entry['id'];
          return $journal_entry;
      });

     $journal_entry->map(function ($journal_entry) {
          $journal_entry['addenda_type'] = 'FRF';
          return $journal_entry;
      });

     //Todays Date
    date_default_timezone_set("America/Chicago");
        
      $currentDate = Carbon::now();


    return \Excel::create('ACH_Uploaded_On_' . $currentDate, function($excel) use ($journal_entry) {
      $excel->sheet('mySheet', function($sheet) use ($journal_entry)
          {
            
        $sheet->fromArray($journal_entry);

        $sheet->setColumnFormat(array('A'=>'0000'));

      });

    })->download('csv');
    }

    
}
