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
                  'created_at',
                  'journal_balanced'


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


    $journal_entry = Journal::select('account_name_routing', 'id', 'account_number', 'reference_number', 'routing_number', 'payment_amount')
    ->where('id', $id)->get();

  

    // $journal_entry->map(function ($journal_entry) {
    //       $journal_entry['addenda'] = 'This payment is from Intl Transport Systems on our PRO # ' . $journal_entry['id'];
    //       return $journal_entry;
    //   });

    //  $journal_entry->map(function ($journal_entry) {
    //       $journal_entry['addenda_type'] = 'FRF';
    //       return $journal_entry;
    //   });

    $journal_entry->map(function ($journal_entry) {
          $journal_entry['id_2'] = 330;
          return $journal_entry;
      });


    $journal_entry->map(function ($journal_entry) {
          date_default_timezone_set("America/Chicago");
            $currentDate = Carbon::now()->format('m/d/Y');
          $journal_entry['payment_date'] = $currentDate;
          return $journal_entry;
      });

     $journal_entry->map(function ($journal_entry) {
          $journal_entry['company_entry_description'] = 'FRTCOST';
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

    public function mb_money_market_total($start, $end)
    {
        $mm_payment_amount_totals = Journal::where('account_id', '39842')->whereBetween('created_at', [$start, $end])->sum('payment_amount');
        $mm_deposit_amount_totals = Journal::where('account_id', '39842')->whereBetween('created_at', [$start, $end])->sum('deposit_amount');
        $mm_FinancialBalance = $mm_deposit_amount_totals - $mm_payment_amount_totals;
        return $mm_FinancialBalance;
    }

    public function capitalStock()
    {
      $capital_stock = Journal::where('account_id', '39909')->sum('deposit_amount');
      return $capital_stock; 

    }

    public function distributions($start, $end)
    {
       $distributions = Journal::where('type_description', 'Distribution')->whereBetween('created_at', [$start, $end])->sum('payment_amount');
       return $distributions;

    }

    public function retainedEarnings()
    {
       //Retained Earnings Life to date accumulated earnings left in the company.
        //Get the retained earnings brought over from quickbooks
        $retained_earnings = Journal::where('account_id', '39912')->sum('deposit_amount');
        return $retained_earnings;

    }

    public function netIncomeQB()
    {
      $net_income_qb = Journal::where('account_id', '39913')->sum('deposit_amount');
      return $net_income_qb;
    }

    public function journalClearedChecks()
    {

      $debits = Journal::select('account_name as name', 'payment_amount as rate', 'cleared_date as date', 'reference_number', 'id as journal_id', 'account_id', 'payment_method as method', 'cleared', 'cleared_date', 'type_description as type_des')->where('type', 'BILLPMT')->where('type_description', 'Expense')->where('payment_method', 'CHECK')->where('cleared', 'YES')->get();

        $debits->map(function ($debits) {
          $debits['type'] = 'Debit';
          return $debits;
        });

      return $debits;

    }

    public function journalACHPayments()
    {

      $debits = Journal::select('account_name as name', 'payment_amount as rate', 'created_at as date', 'reference_number', 'id as journal_id', 'account_id', 'payment_method as method', 'cleared', 'cleared_date', 'type_description as type_des')->where('type', 'BILLPMT')->where('type_description', 'Expense')->where('payment_method', 'ACH')->get();

        $debits->map(function ($debits) {
          $debits['type'] = 'Debit';
          return $debits;
        });

      return $debits;

    }



    
 public function journalPMTReceived()
    {

      $credits = Journal::select('account_name as name', 'deposit_amount as rate', 'created_at as date', 'reference_number', 'id as journal_id', 'account_id', 'payment_method as method', 'cleared', 'cleared_date', 'type_description as type_des')->where('type', 'PMT')->get();

        $credits->map(function ($credits) {
          $credits['type'] = 'Credit';
          return $credits;
        });

      return $credits;

    }

    

    public function journalBILLPMT()
    {

      $debits = Journal::select('account_name as name', 'payment_amount as rate', 'created_at as date', 'reference_number', 'id as journal_id', 'account_id', 'payment_method as method', 'cleared', 'cleared_date', 'type_description as type_des')->where('type', 'BILLPMT')->where('type_description', '!=', 'Expense')->where('payment_method', '!=', 'CHECK')->get();

        $debits->map(function ($debits) {
          $debits['type'] = 'Debit';
          return $debits;
        });

      return $debits;

    }

    public function rent_deposit()
    {
      $rent_deposit = Journal::where('account_id', 39899)->sum('deposit_amount');

      return $rent_deposit;
    }

   

    


    
}
