<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Twilio\Rest\Client;

use PDF;

use Excel;

use App\Load;

use App\Journal;

use App\Text;

use App\Ledger;

use Carbon\Carbon;

class PDFController extends Controller
{
    //use helpers\Mailer;

    public function balanceSheet(Request $request)
    {
        //Takes the user input dates and converts them to computer readable
        $start_date_user = $request->input('start_date');
        $end_date_user = $request->input('end_date');
        $start_date_carbon = Carbon::createFromFormat('m/d/Y', $start_date_user, "America/Chicago");
        $end_date_carbon = Carbon::createFromFormat('m/d/Y', $end_date_user, "America/Chicago");
        $start_date = $start_date_carbon->toDateString();
        $end_date = $end_date_carbon->toDateString();


        $ledger = new Ledger();

        // Deposits minus payments
        $mb_checking_account_total = $ledger->mb_checking_account_total($start_date, $end_date);



        //Money market deposits minus payments
        $journal = new Journal();
        $mb_money_market_total = $journal->mb_money_market_total($start_date, $end_date);


        //Accounts Receivable
        $load = new Load();
        $accounts_receivable_total = $load->accounts_receivable_total($start_date_user, $end_date_user);


        //Rent Deposit
        $rent_deposit = $journal->rent_deposit();

        //Accounts Payable
        $accounts_payable_total = $load->accounts_payable_total($start_date_user, $end_date_user);

        //Capital Stock
        $capital_stock = Journal::where('account_id', '39909')->sum('deposit_amount');

        //Distributions
        $distributions = Journal::where('type_description', 'Distribution')
        ->where('type', 'BILLPMT')
        ->whereBetween('created_at', [$start_date, $end_date])
        ->sum('payment_amount');

        $life_to_date_distributions_journal = Journal::where('type_description', 'Distribution')->where('type', 'BILLPMT')->sum('payment_amount');

        $life_to_date_distributions_quickbooks = 2279067;

        $life_to_date_distributions = $life_to_date_distributions_journal + $life_to_date_distributions_quickbooks;
        
         

        

        //get all the different sub categories for expenses
        //loop through all of them and add up all the payment amounts

        //find all unique type_description_sub categories

        

        //Get all the unique categories
        $unique_cats = Journal::select('type_description_sub')->groupBy('type_description_sub')->get(); 

         $info = [];
         foreach($unique_cats as $cat)
         {

            
            $total_expense = Journal::where('type_description', 'Expense')->where('type_description_sub', $cat->type_description_sub)
            ->whereBetween('created_at', [$start_date, $end_date])->sum('payment_amount');

            $total_revenue = Journal::where('type_description', 'Revenue')->where('type_description_sub', $cat->type_description_sub)
            ->whereBetween('created_at', [$start_date, $end_date])->sum('deposit_amount');

            $total = $total_expense - $total_revenue;
            
            
            

            $info[] = [$total, $cat->type_description_sub];

            


         }         

          $info = ['info' => $info ];


          // Allowance for Bad Debts
          $allowance_for_bad_debts = Journal::where('account_name', 'ALLOWANCE FOR BAD DEBTS')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('payment_amount');

            // RECEIVABLE DAMAGE
          $other_current_assets = Journal::where('account_name', 'RECEIVABLE DAMAGE')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

            

            $accum_office = Journal::where('account_name', 'ACCUMULATED DEPR OFFICE EQUIP')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('payment_amount');

            $machineryAndEquipment = Journal::where('account_name', 'MACHINERY AND EQUIPMENT')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

            $accum_mach = Journal::where('account_name', 'ACCUMULATED DEPR MACH EQUIP')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('payment_amount');

            $officeEquipment = Journal::where('account_name', 'OFFICE EQUIPMENT')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

            $rentDeposit = Journal::where('account_name', 'RENT DEPOSIT')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

            $accrued_state = Journal::where('account_name', 'ACCRUED STATE INCOME TAX')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('payment_amount');

            $net_income = Journal::where('account_name', 'QUICKBOOKS NET INCOME')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

        $sales = Load::whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date_user}', '%m/%d/%Y')")->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date_user}', '%m/%d/%Y')")->sum('amount_due');



                        

        $cost = Load::whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date_user}', '%m/%d/%Y')")->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date_user}', '%m/%d/%Y')")->sum('carrier_rate');

        $gross_profit = $sales - $cost;




        




        // Expnses Total
        $expenses_total = Journal::where('type_description', 'Expense')
        ->whereBetween('created_at', [$start_date, $end_date])->sum('payment_amount');

        // Net Income
        $net_income = $gross_profit - $expenses_total;

        $bad_debts = Journal::where('type_description_sub', 'Bad Debts')->whereBetween('created_at', [$start_date, $end_date])->sum('payment_amount');

        $receivable_damage = Journal::where('type_description_sub', 'Receivable Damage')->whereBetween('created_at', [$start_date, $end_date])->sum('deposit_amount');


    $assets_positive = $accounts_receivable_total + $mb_checking_account_total + $mb_money_market_total + $receivable_damage + $machineryAndEquipment + $officeEquipment + $rentDeposit;

$assets_negative = $bad_debts + $accum_office + $accum_mach;
$assets_total = $assets_positive - $assets_negative;

$retained_earnings = Journal::where('type_description_sub', 'Retained Earnings')->whereBetween('created_at', [$start_date, $end_date])
            ->sum('deposit_amount');

$liability_pos = $accounts_payable_total + $capital_stock + $retained_earnings + $net_income;
$liability_neg = $accrued_state + $distributions;
$liability_total = $liability_pos - $liability_neg;


                        

        $pdf = PDF::loadView('pdf.balanceSheet',[
            'liability_total'=>$liability_total,
            'retained_earnings'=>$retained_earnings,
            'assets_total'=>$assets_total,
            'receivable_damage'=>$receivable_damage,
            'bad_debts'=>$bad_debts,
            'net_income'=>$net_income,
            'expenses_total'=>$expenses_total,
            'sales'=>$sales,
            'cost'=>$cost,
            'gross_profit'=>$gross_profit,
            'net_income'=>$net_income,
            'accrued_state'=>$accrued_state,
            'rentDeposit'=>$rentDeposit,
            'accum_office'=>$accum_office,'machineryAndEquipment'=>$machineryAndEquipment,'accum_mach'=>$accum_mach,'officeEquipment'=>$officeEquipment,'other_current_assets'=>$other_current_assets,'allowance_for_bad_debts'=>$allowance_for_bad_debts,'start_date'=>$start_date, 'end_date'=>$end_date, 'mb_checking_account_total'=>$mb_checking_account_total, 'mb_money_market_total'=>$mb_money_market_total, 'accounts_receivable_total'=>$accounts_receivable_total, 'rent_deposit'=>$rent_deposit, 'accounts_payable_total'=>$accounts_payable_total, 'capital_stock'=>$capital_stock, 'distributions'=>$distributions, 'life_to_date_distributions'=>$life_to_date_distributions, 'info'=>$info]);
    
        return $pdf->stream('BalanceSheet' . '_' . $start_date . '_' . $end_date . '.pdf');
        
    
    }
	
	//Prints the invoice
	public function getInvoicePDF($id)
	{
		$info = Load::find($id);

		$pdf = PDF::loadView('pdf.invoice',['info'=>$info]);
    
		return $pdf->stream($info->id . '_' . $info->customer_id . '.pdf');
	
	}

	//Prints the rate confirmation
	public function getContractPDF($id)
	{
    
    	$info = Load::find($id);

		$pdf = PDF::loadView('pdf.contract',['info'=>$info]);
    
		return $pdf->stream('contract.pdf');
	
	}

    //Prints the check
    public function printCheck($id)
    {

        //Todays Date
         date_default_timezone_set("America/Chicago");
        
        $currentDate = date('m-d-Y');


        $now = Carbon::now();

       

         //UPDATE WHERE ID = LOAD
        \DB::table('loads')->where('id', $id)->update([
            'payment_method' => "CHECK",
            'carrierPayStatus' => "COMPLETED",
            'upload_date' => $now
        ]);
        
    
        $info = Load::find($id);

        $pdf = PDF::loadView('pdf.check',['info'=>$info]);
    
        return $pdf->stream('check.pdf');
    
    }

    

     //Prints the check from journal
    public function printCheckFromJournal($id)
    {

        //Todays Date
         date_default_timezone_set("America/Chicago");
        
        $currentDate = date('m-d-Y');


        $now = Carbon::now();

       

         //UPDATE WHERE ID = LOAD
        \DB::table('journals')->where('id', $id)->update([
            'payment_method' => "CHECK",
            'upload_date' => $now
        ]);
        
    
        $info = Journal::find($id);

        $pdf = PDF::loadView('pdf.checkFromJournal',['info'=>$info]);
    
        return $pdf->stream('check.pdf');
    
    }

    

     //Prints the check from journal
    public function profitLoss(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = Carbon::createFromFormat('m/d/Y', $start_date, "America/Chicago");
        $end_date = Carbon::createFromFormat('m/d/Y', $end_date, "America/Chicago");

        

        //Todays date
        date_default_timezone_set("America/Chicago");
        $now = Carbon::now();

        
        //Freight Sales all open and billed date - 
        $freight_sales = Ledger::whereBetween('date', [$start_date, $end_date])->sum('deposit_amount');
        //Freight Cost
        $freight_cost = Ledger::whereBetween('date', [$start_date, $end_date])->sum('payment_amount');
        //Difference
        $difference_sales_cost = $freight_sales - $freight_cost;

        $dues_and_sub = Ledger::where('type_description_sub', 'Dues and Subscriptions')->whereBetween('date', [$start_date, $end_date])->sum('payment_amount');


        $pdf = PDF::loadView('pdf.profitloss',['freight_sales'=>$freight_sales, 'freight_cost'=>$freight_cost, 'difference_sales_cost'=>$difference_sales_cost, 'dues_and_sub'=>$dues_and_sub]);
    
        return $pdf->stream('ProfitLoss.pdf');
    
    }

	//Emails an Invoice attachment
      public function emailInvoicePDF($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.invoice_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.invoice', $info);

            $message->to($info['info']['customer_email'])

            ->subject('International Transport Systems Invoice for PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Invoice_' . $info['info']['id'] . '.pdf');

            

        });



        return back()->with('status', 'The Invoice has been sent!');
    }

    //Emails a Rate Confirmation
      public function emailRateConPDF($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.rate_con_email_body'], $info, function($message) use ($info){
            
            
            $pathToFile = 'ACHPaymentAuthorization.pdf';

            $pdf = PDF::loadView('pdf.contract', $info);

            //PDF with saftey instructions

            $pathToSafetyFile = 'UnitedRentalsSafetyCard.pdf';

           
            $message->to($info['info']['carrier_email'])

            ->cc(\Auth::user()->email)

            ->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Load_Confirmation_' . $info['info']['id'] . '.pdf');

            
            $message->attach($pathToFile);

            
            

            if($info['info']['customer_id'] == '3'){
                $message->attach($pathToSafetyFile);
            }

            else{}
            
            

        });

        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        //$AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        //$AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        //$client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        //$people = array(
        //"+1" . \Auth::user()->cell => "User"
        //);

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    // foreach ($people as $number => $name) {

    //     $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            // $number,

            // array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                // 'from' => "+14159697014", 
                
                // the sms body
                // 'body' => "PRO # " . $info['info']['id'] . "\n\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] .  "\n" . "\n" . "ADDITIONAL STOPS\n" . $info['info']['add_stops'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell']
        //     )
        // );
    //}

        return back()->with('status', 'The Rate Confirmation has been sent!');
    }

    //Emails a BOL to Carrier
      public function emailBOLCarrier($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.bol_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.bol', $info);

            $message->to($info['info']['carrier_email'])

            ->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'BOL_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The BOL has been sent to the carrier!');
    }

    // emailBOLYou

     public function emailBOLYou($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.bol_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.bol', $info);

            $message->to(\Auth::user()->email)

            ->subject('Bill of Lading from ITS for PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'BOL_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The BOL has been sent to you!');
    }

    //Texts load info 
      public function textLoadInfo($id){
        
        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . \Auth::user()->cell => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "PRO # " . $info['info']['id'] . "\n\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_contact'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . $info['info']['delivery_contact'] . "\n" . $info['info']['delivery_date'] . " " . $info['info']['delivery_time'] . " " . $info['info']['delivery_status'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "ADDITIONAL STOPS\n" . $info['info']['add_stops'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . $info['info']['carrier_email'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell'] . "\n" . $info['info']['trailer_type']
            )
        );
    }

        return back()->with('status', 'The Text Message has been sent!');
    }


    //TEXTS ROLLBACK INFO 
      public function textAndEmailRollbackInfo($id){
        
        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Important!  International Transport Systems will arrange a rollback to safely assist the unload on the shipment you are doing from " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " to " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] .   ".  Please allow for open and accurate communication so we can schedule accordingly if needed.  Towable boom lifts, by nature of their configuration, can be difficult to unload." . "\n\n" . "Call or text: " . \Auth::user()->cell . " with any questions or when you are 1 hour away from delivery" . "\n\n" . "Thanks, " . \Auth::user()->name
            )
        );
    }



        
        Mail::send(['html'=>'email.rollbackEmail'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['carrier_email'])

            ->subject('ITS Will Arrange Rollback For Offload On PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });









        return back()->with('status', 'The Driver has been sent a Text and the Dispatcher an Email regarding the rollback info!');
    }

   public function textDriver($id)
   {

    date_default_timezone_set("America/Chicago");

     $info = Load::find($id);

        $info = ['info'=>$info];


        $newText = New Text();
        
        $newText->message = $info['info']['carrier_message'];
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();

        //I need to save the message, from number, pro number, time of day cst into my new model


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        

        

        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => $info['info']['carrier_message']
            )
        );
    }

        return back()->with('status', 'The Text Message has been sent!');
    }


    public function textDriverPickStatus($id)
    {
        date_default_timezone_set("America/Chicago");

        $info = Load::find($id);

        $info = ['info'=>$info];

        $initial_message = "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for pick up at " . $info['info']['pick_company'] . " in " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . "?" . " PRO # " . $info['info']['id'];


        $newText = New Text();
        
        $newText->message = $initial_message;
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for pick up at " . $info['info']['pick_company'] . " in " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . "?" . " PRO # " . $info['info']['id']
            )
        );
    }


        return back()->with('status', 'The Driver has been sent a Text asking the pick up status');

    }

    public function textDriverDeliveryStatus($id)
    {
        date_default_timezone_set("America/Chicago");

        $info = Load::find($id);

        $info = ['info'=>$info];

        $initial_message = "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for delivery at " . $info['info']['delivery_company'] . " in " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . "?" . " PRO # " . $info['info']['id'];


        $newText = New Text();
        
        $newText->message = $initial_message;
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for delivery at " . $info['info']['delivery_company'] . " in " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . "?" . " PRO # " . $info['info']['id']
            )
        );
    }


        return back()->with('status', 'The Driver has been sent a Text asking the delivery status');

    }

    public function textDriverLoadInfo($id)
    {

        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "PRO # " . $info['info']['id'] . "\n\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_contact'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . $info['info']['delivery_contact'] . "\n" . $info['info']['delivery_date'] . " " . $info['info']['delivery_time'] . " " . $info['info']['delivery_status'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "ADDITIONAL STOPS\n" . $info['info']['add_stops'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . $info['info']['carrier_email'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell'] . "\n" . $info['info']['trailer_type']
            )
        );
    }

        return back()->with('status', 'The Text Message With the Load Info has been sent to the driver!');

    }

   



}

	





