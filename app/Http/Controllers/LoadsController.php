<?php

namespace App\Http\Controllers;

use App\Load;

use App\Text;

use App\Journal;

use App\Loadlist;

use App\Carrier;

use App\Ledger;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;

use PDF;

use Carbon\Carbon; 

use Illuminate\Support\Facades\Mail;


use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;


class LoadsController extends Controller
{
	
    
	//Load the datatable
	public function tableNewAccCall()
	{
			
			
			$loads = new Load();

			$journal = new Journal();
			
			//Query for customer where customerPayStatus = PAID / deposit_date as date
			$customer = $loads->customerCreditCheckingAccount();

			//Query for carrier where carrierPayStatus = COMPLETED, where payment_method = CHECK, where cleared = YES / cleared_date as date
			$carrierClearedChecks = $loads->carrierClearedChecks();

			//Query for carrier where carrierPayStatus = COMPLETED, where payment_method = ACH / upload_date as date
			$carrierACHPayments = $loads->carrierACHPayments();

			//Query for journal where type_description = Expense, where payment_method = CHECK, where type = BILLPMT, where cleared = YES / cleared_date as date
			$journalClearedChecks = $journal->journalClearedChecks();

			//Query for journal where type_description = Expense, where payment_method = ACH, where type = BILLPMT / created_at as date
			$journalACHPayments = $journal->journalACHPayments();

			//Query for journal where type = PMT / created_at = date
			$journalPMTReceived = $journal->journalPMTReceived();

			//Query for journal where type = BILLPMT, where type_description != Expense, where payment_method != CHECK / created_at = date
			$journalBILLPMT = $journal->journalBILLPMT();


			


			//Merge the seven collections together
			$mergedCollection = $customer->toBase()->merge($carrierClearedChecks)
			->merge($carrierACHPayments)
			->merge($journalClearedChecks)
			->merge($journalACHPayments)
			->merge($journalPMTReceived)
			->merge($journalBILLPMT);

			
			


			// Add the running total column to the merged collection
			// $mergedCollection->map(function ($mergedCollection) {
   //  			$mergedCollection['running_total'] = '';
   //  			return $mergedCollection;
			// });

			// Populate the running total with credits - debits
			// $mergedCollection->transform(function($mergedCollection) {
			
			// 	$customer = Load::select('customer_name as name', 'amount_due as rate', 'deposit_date as date')->where('customerPayStatus', 'PAID')->get();
   //      		$credit = $customer->where('date', '<=', $mergedCollection->date)->sum('rate');

			// 	$carrier = Load::select('carrier_name as name', 'carrier_rate as rate', 'upload_date as date')->where('carrierPayStatus', 'COMPLETED')->get();
			// 	$debit = $carrier->where('date', '<=', $mergedCollection->date)->sum('rate');


			// 	$mergedCollection->running_total = $credit - $debit;
			
			//  	return $mergedCollection;
			// });

			

			

			$data = $mergedCollection;

			
			return(['data' => $data]);


	}



    public function index()
	{
		
		$data = Load::orderBy('id', 'desc')->take(2000)->get();
		return(['data' => $data]);
		
	}
	
	

	public function deepLoads()
	{
		
		
		$data = Load::orderBy('id', 'desc')->skip(2000)->take(3000)->get();
		return(['data' => $data]);
		
	}

	public function deepDeepLoads()
	{
		
		
		$data = Load::orderBy('id', 'desc')->skip(5000)->take(5000)->get();
		return(['data' => $data]);
		
	}

	public function indextwo()
	{
		
		$data = Load::where('pick_status', 'Booked')->get();
		return(['data' => $data]);
		
	}

	public function tobedatatwo()
	{
		
		$data = Load::where('delivery_status', 'En Route')->get();
		return(['data' => $data]);
		
	}

	public function personal_status_table()
	{
		
		$data = Load::where('rate_con_creator', \Auth::user()->email)->where('delivery_status', '<>', 'Delivered')->where('pick_status', '=', 'Booked')->get();


		return(['data' => $data]);


		
	}

	

	public function personal_status_loaded_table()
	{
		
		$data = Load::where('rate_con_creator', \Auth::user()->email)->where('delivery_status', '<>', 'Delivered')->where('pick_status', '=', 'Loaded')->get();


		return(['data' => $data]);


		
	}
	

	

	//Store a new record in database
	 public function store(Request $request)
	{

		date_default_timezone_set("America/Chicago");
		
		 $this->validate($request, [

		 	'customer_name' => 'required',			  
         	  'customer_address' => 'required',
			  'customer_city' => 'required',
			  'customer_state' => 'required',
			  'customer_zip' => 'required',
			  'customer_contact' => 'required',
			  'customer_email' => 'required',
			  'customer_phone' => 'required',
			  'pick_company' => 'required',
			  'pick_address' => 'required',
			  'pick_city' => 'required',
			  'pick_state' => 'required',
			  'pick_zip' => 'required',
			  'pick_phone' => 'required',
			  'delivery_company' => 'required',
			  'delivery_address' => 'required',
			  'delivery_city' => 'required',
			  'delivery_state' => 'required',
			  'delivery_zip' => 'required',
			  'delivery_phone' => 'required',
			  'amount_due' => 'required',
			  'commodity' => 'required',
        
         ]);

        $newload = New Load($request->all());
		



		$newload->its_group = "ITS";
		$newload->pick_status = "Open";
		$newload->delivery_status = "Open";
		$newload->created_by = strtoupper(\Auth::user()->email);
		$newload->creation_date = date('m/d/Y');
		$newload->carrierPayStatus = "OPEN";
		$newload->customerPayStatus = "OPEN";

		$newload->save();

		return back()->with('status', 'New Load Created!');
		
	}

	public function duplicateInvoice($id)
	{

		date_default_timezone_set("America/Chicago");
    
    	$load = Load::find($id);
    	$load->creation_date = Carbon::now()->format('m/d/Y');
    	$load->routing_number = NULL;
    	$load->account_number = NULL;
    	$load->account_type = NULL;
    	$load->account_name = NULL;
    	$load->payment_method = "Choose";
		$newLoad = $load->replicate();
		
		$newLoad->save();

		return back()->with('status', 'Your load was duplicated!');


	}

	

	
	//Go to edit form with selected record
	public function edit(Request $request)
	{

		JavaScript::put([
		        'user' => \Auth::user(),
    ]);

		$info = Load::find($request->input('id'));

		$text_message = Text::where('pro', $request->input('id'))->orderBy('sentAt', 'asc')->get();
		
		return view('edit', compact('info', 'text_message'));	
		
	}

	//Update record
	public function update(Request $request, Load $load)
	{



            $this->validate($request, [

		 	  'customer_name' => 'required',			  
         	  'customer_address' => 'required',
			  'customer_city' => 'required',
			  'customer_state' => 'required',
			  'customer_zip' => 'required',
			  'customer_contact' => 'required',
			  'customer_email' => 'required',
			  'customer_phone' => 'required',
			  'pick_company' => 'required',
			  'pick_address' => 'required',
			  'pick_city' => 'required',
			  'pick_state' => 'required',
			  'pick_zip' => 'required',
			  'pick_phone' => 'required',
			  'delivery_company' => 'required',
			  'delivery_address' => 'required',
			  'delivery_city' => 'required',
			  'delivery_state' => 'required',
			  'delivery_zip' => 'required',
			  'delivery_phone' => 'required',
			  'amount_due' => 'required',
			  'commodity' => 'required',
			  'carrier_id' => 'required',
        
         ]);

            	//need to make sure rate_con_creator doesnt already exist

            if ($request->pick_status === 'Booked' && empty($load->rate_con_creator))
            {
            	$load->rate_con_creator = strtoupper(\Auth::user()->email);
            }
           elseif ($request->pick_status === 'Open')
           {
           		$load->rate_con_creator = NULL;

           }

        
		$load->update($request->all());


		return back()->with('status', 'Your updates have been successfully saved!');




	}

	//Send internal email to fellow employee

	public function internalEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['internal_email_address'])

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your internal message has been sent.');
    }

    //Email the load group the internal message 

    public function emailLoadGroup($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            $recipients = [$info['info']['created_by'], $info['info']['rate_con_creator'], 'danielle@itransys.com'];

            
           	$message->to($recipients)

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your group internal message has been sent.');
    }

    //Sends an email to Joe and Brush 

    public function emailBrushJoe($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            $recipients = ['danielle@itransys.com', 'joem@itransys.com', 'mikeb@itransys.com', $info['info']['rate_con_creator']];

            
           	$message->to($recipients)

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your Joe, Brush, and Rate Con Creator internal message has been sent.');
    }

	//Request status email from a carrier 

	public function getStatusEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.getStatus'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your status request has been sent.');
    }

	//Request a POD from carrier email

	public function podRequestEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.podRequest'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('Please Send Invoice with Signed Bill of Lading on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your POD request has been sent.');
    }

    

    //UR Safety Info No Touch

	public function ur_safety($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.ur_safety'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('United Rentals Safety Info for ' . $info['info']['carrier_name']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The No Touch United Rentals Safety Info Has Been Sent!');
    }

//UR Safety Info Hands Held

	public function ur_safety_help($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.ur_safety_help'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('United Rentals Safety Info for ' . $info['info']['carrier_name']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The Hands Held United Rentals Safety Info Has Been Sent!');
    }
	
    //Update customer email
	
	public function updateCustomerEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.updateCustomer'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['customer_email'])

           	->subject('Status Update on ITS PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your customer has been updated.');
    }

     //Carrier email
	
	public function emailCarrier($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.emailCarrier'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your carrier has been emailed.');
    }

  //   public function searchPro(Request $request)
  //   {
    	
  //   	$info = Load::find($request->input('id'));
		// return view('edit', compact('info'));
		// "/edit/url?id='+data+'"
		// return view('/edit/url?id=' . $request->input('id'))
  //   }

    public function emailShipper($id)
    {
    	$info = Load::find($id);
		
		$info = ['info' => $info];

		Mail::send(['html'=>'email.emailShipper'], $info, function($message) use ($info){
            
            
           	$message->to(\Auth::user()->email)->cc('mikec@itransys.com')

           	->subject('Carrier Info on Shipment from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state'] . ' BOL # ' . $info['info']['bol_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'You have been emailed, please edit and forward to shipper/consignee.');

    }

    public function findTrucksFromLoads(Request $request = NULL)
	{

		$pick_state = $request->input('loads_pick_state');
		$delivery_state = $request->input('loads_delivery_state');
		$trailer_type = $request->input('loads_trailer_type');

		

		$trailerResultsFromLoads = Load::where('pick_state', $pick_state)->where('delivery_state', $delivery_state)->where('trailer_for_search', $trailer_type)->get();


		

		return view('findTrucksFromLoads', compact('trailerResultsFromLoads'));


	}

	public function displayCarrierLoadsPage()
	{
		$trailerResultsFromLoads = NULL;
		
		return view('findTrucksFromLoads')->with('trailerResultsFromLoads', $trailerResultsFromLoads);
		

	}

	public function accounts_receivable()
	{
		$owed = Load::whereNotNull('billed_date')->where('customerPayStatus', 'OPEN')->where('billed_date', '!=', '')->sum('amount_due');
		
		return view('accounts_receivable')->with('owed', $owed);
	}

	public function accounts_payable()
	{
		$owed = Load::whereNotNull('vendor_invoice_date')->where('carrierPayStatus', 'APPRVD')->where('vendor_invoice_date', '!=', '')->sum('carrier_rate');
		
		return view('accounts_payable')->with('owed', $owed);
	}

	public function general_ledger()
	{
		
		
		return view('general_ledger');
	}


	public function newAccountingDatatable()
	{
		
		$debitsLoadsOut = Load::where('carrierPayStatus', 'COMPLETED')->sum('carrier_rate');
		$debitsJournalOut = Journal::sum('payment_amount');
		$totalDebits = $debitsLoadsOut + $debitsJournalOut;
		$creditsLoadsOut = Load::where('customerPayStatus', 'PAID')->sum('paid_amount_from_customer');
		$creditsJournalOut = Journal::sum('deposit_amount');
		$totalCredits = $creditsLoadsOut + $creditsJournalOut;
		$balanceOut = $totalCredits - $totalDebits;


		$debitsLoads = Load::where('carrierPayStatus', 'COMPLETED')->where('cleared', 'YES')->sum('carrier_rate');
		$debitsJournal = Journal::where('cleared', 'YES')->sum('payment_amount');
		$totalDebitsCleared = $debitsLoads + $debitsJournal;
		$creditsLoads = Load::where('customerPayStatus', 'PAID')->sum('paid_amount_from_customer');
		$creditsJournal = Journal::sum('deposit_amount');
		$totalCreditsCleared = $creditsLoads + $creditsJournal;
		$balanceCleared = $totalCreditsCleared - $totalDebitsCleared;




		

		
		
		
		return view('newAccountingDatatable')->with('balanceCleared', $balanceCleared)->with('balanceOut', $balanceOut);
	}

	



	public function accountsReceivable()
	{
		
		$data = Load::whereNotNull('billed_date')->where('customerPayStatus', 'OPEN')->where('billed_date', '!=', '')->where('pick_status', '!=', 'Cancelled')->take(2000)->get();

		$data->map(function ($data) {
    			$data['plus_thirty'] = '';
    			return $data;
			});

		$data->map(function ($data) {
    			$data['aging'] = '';
    			return $data;
			});

		
		

		$data->transform(function($data) {
			
			//IF THERE IS AN EMPTY BILLED DATE THEN ENTER IN 'NO BILLED DATE WHATS UP?'
			if($data->billed_date == '')
			{
				$data->plus_thirty = 'No Billed Date Set';

				$data->aging = 'No Billed Date Set';
			}
			else
			{

			//Do +30 days from billed date
			$date = Carbon::createFromFormat('m/d/Y', $data->billed_date);
			$plusThirty = (string)$date->addDays(30)->format('m/d/Y');
			$data->plus_thirty = $plusThirty;

			


			//Get todays date to do math
			$today_raw = Carbon::now('America/Chicago');
			//Get the billed date
			$billed_date = Carbon::createFromFormat('m/d/Y', $data->billed_date);
			//Get the object of the billed date +30
			$plusThirtyForMath = $billed_date->addDays(30);
			//Send to datatable
			$data->aging = (string)$plusThirtyForMath->diffInDays($today_raw, false);
			}

			
			return $data;
		});

	
		

		return(['data' => $data]);
		
	}

	public function accountsPayable()
	{
		
		$data = Load::whereNotNull('vendor_invoice_date')->where('carrierPayStatus', 'APPRVD')->where('vendor_invoice_date', '!=', '')->take(2000)->get();

		$data->map(function ($data) {
    			$data['plus_thirty'] = '';
    			return $data;
			});

		$data->map(function ($data) {
    			$data['aging'] = '';
    			return $data;
			});

		
		

		$data->transform(function($data) {
			
			//IF THERE IS AN EMPTY BILLED DATE THEN ENTER IN 'NO BILLED DATE WHATS UP?'
			if($data->vendor_invoice_date == '')
			{
				$data->plus_thirty = 'No Invoice Date Set';

				$data->aging = 'No Invoice Date Set';
			}
			else
			{

			//Do +30 days from billed date
			$date = Carbon::createFromFormat('m/d/Y', $data->vendor_invoice_date);
			$plusThirty = (string)$date->addDays(30)->format('m/d/Y');
			$data->plus_thirty = $plusThirty;

			


			//Get todays date to do math
			$today_raw = Carbon::now('America/Chicago');
			//Get the billed date
			$vendor_invoice_date = Carbon::createFromFormat('m/d/Y', $data->vendor_invoice_date);
			//Get the object of the billed date +30
			$plusThirtyForMath = $vendor_invoice_date->addDays(30);
			//Send to datatable
			$data->aging = (string)$plusThirtyForMath->diffInDays($today_raw, false);
			}

			
			return $data;
		});

	
		

		return(['data' => $data]);
		
	}

	public function generalLedger()
	{
		
		//This will pull from a new table called ledger
		//$general_ledger = Ledger::orderBy('date', 'asc')->get();

		// $general_ledger->map(function ($general_ledger) {
    			
		// 		$payment_amount_totals = Ledger::where('date', '<=', $general_ledger->date)->sum('payment_amount');

		// 		$deposit_amount_totals = Ledger::where('date', '<=', $general_ledger->date)->sum('deposit_amount');
    			
  //   			$general_ledger['running_total'] = $deposit_amount_totals - $payment_amount_totals;
    			
  //   			return $general_ledger;
		// 	});

		$payment_amount_totals = Ledger::sum('payment_amount');

		$deposit_amount_totals = Ledger::sum('deposit_amount');

		$balance = $deposit_amount_totals - $payment_amount_totals;

		return view('general_ledger', compact('balance', $balance));
	}

	public function generalLedgerLoads()
	{

		//This will pull from a new table called ledger
		$data = Ledger::orderBy('date', 'asc')->get();

		// $data->map(function ($data) {
    			
		// 		$payment_amount_totals = Ledger::where('date', '<=', $data->date)->sum('payment_amount');

		// 		$deposit_amount_totals = Ledger::where('date', '<=', $data->date)->sum('deposit_amount');
    			
  //   			$data['running_total'] = $deposit_amount_totals - $payment_amount_totals;
    			
  //   			return $data;
		// 	});

		// $payment_amount_totals = Ledger::sum('payment_amount');

		// $deposit_amount_totals = Ledger::sum('deposit_amount');

		// $balance = $deposit_amount_totals - $payment_amount_totals;

		//return view('general_ledger', compact('general_ledger',$general_ledger,'balance', $balance));

		return(['data' => $data]);
	}

	public function toBeAvailable()
	{
		

		$loads = Load::where('pick_status', 'Loaded')->where('delivery_status', 'En Route')->orderBy('delivery_date', 'asc')->get();

		

		$loads->map(function ($loads) {

            //Get todays date to do math
            $today = Carbon::now('America/Chicago');
            //Get the delivery date
            $delivery_date = Carbon::createFromFormat('m/d/Y', $loads->delivery_date);
            //Send to datatable
            $diff = (string)$today->diffInDays($delivery_date, false);
                $loads['countdown'] = $diff;
                return $loads;
            });


		return view('toBeAvailable', compact('loads', $loads));

	}

	public function xpoFuelRequest()
	{
		$xpo = Load::where('amount_due', '1')->where('delivery_status', 'Delivered')->where('pick_status', 'Loaded')->where('customer_id', '2188')->get();

		

		return view('xpoFuelRequestDisplay', compact('xpo', $xpo));
	}
	
}

