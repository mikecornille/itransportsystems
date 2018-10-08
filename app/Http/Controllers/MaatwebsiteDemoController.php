<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Input;
use App\Item;
use DB;
use Excel;
use App\User;
use App\Load;
use App\Journal;
use App\Loadlist;
use App\Ledger;
//use App\Journal;
use Carbon\Carbon;


class MaatwebsiteDemoController extends Controller
{

	public function createACHFromJournal($id)
	{

		$journal = new Journal();

		$ach_journal = $journal->createACH($id);

		return \Excel::create('ACH_' . $id, function($excel) use ($ach_journal) {
			$excel->sheet('mySheet', function($sheet) use ($ach_journal)
	        	{
					$sheet->fromArray($ach_journal);
				});
		})->download('csv');




	}

	public function generalLedgerTargetCheckPaid(Request $request)
	{
		
		// Access Ledger model
		$ledger = new Ledger();

		// Date format from user input
		$start_raw = $request->input('start_date');
		$end_raw = $request->input('end_date');
		// Date coverted to date time
		$start_carb = Carbon::createFromFormat('m/d/Y', $start_raw, "America/Chicago");
	    $end_carb = Carbon::createFromFormat('m/d/Y', $end_raw, "America/Chicago");
		// Date converted to only date no time
		$start = date("Y-m-d", strtotime($start_carb));
		$end = date("Y-m-d", strtotime($end_carb));

		


		//Time for cleared checks query
		$start_cleared = date("Y-m-d", strtotime($start_carb));
		$end_cleared = date("Y-m-d", strtotime($end_carb));

		

		// Cleared checks query
		$cleared_checks = $ledger->clearedChecks($start_cleared, $end_cleared);

		

		// Consolidate all reference numbers in respect to revenue and email results
		//$ledger->consolidateReferenceNumbersForRevenueAndEmail($start, $end);

		// Expense of freight cost totaled and organized by date and emailed
       	//$ledger->achTotalsByDate($start, $end);
         
		// All records of revenue by ACH only
		$revenueACH = $ledger->revenueQueryACH($start, $end);

		// All records of revenue by CHECK only
		$revenueCHECK = $ledger->revenueQueryCHECK($start, $end);

		// Revenue broken up by deposit date and emailed
		//$ledger->totalRevenueByDate($start, $end);

		$expenseACH = $ledger->expenseACHQuery($start, $end);

		//All assets
		$assetsITS = $ledger->assetsITSQuery($start, $end);

		//ACH Distributions
		$achdist = $ledger->expenseACHDistributionQuery($start, $end);

		//Credit received
		$creditReceived = $ledger->receiveCCPayment($start, $end);

		//Email bank codes
		$ledger->bankCodes();

		
		
		


		return \Excel::create('ITS_Checking_Account_' . $start . '_to_' . $end, function($excel) use ($cleared_checks, $revenueACH, $expenseACH, $revenueCHECK, $assetsITS, $achdist, $creditReceived) {
			$excel->sheet('mySheet', function($sheet) use ($cleared_checks, $revenueACH, $expenseACH, $revenueCHECK, $assetsITS, $achdist, $creditReceived)
	        {
	        	
	        	
	        	
	        	$sheet->fromArray($creditReceived);
	        	$sheet->fromArray($revenueACH);
	        	$sheet->fromArray($cleared_checks);
	        	$sheet->fromArray($assetsITS);
				$sheet->fromArray($revenueCHECK);
				$sheet->fromArray($expenseACH);
				$sheet->fromArray($achdist);
				
				
				
				
	        });
		})->download('csv');
		
	} // End of function



	public function getProfitReport($type, Request $request)
	{
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');

		 // $unique_customers = Load::select('customer_id')
   //          ->groupBy('customer_id')
   //          ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
			// ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
   //          ->get();

         
   //       $info = [];
   //       foreach($unique_customers as $customer)
   //       {

   //       	$total = Load::where('customer_id', $customer->customer_id)
   //       	->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
			// ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
			// ->sum('amount_due');

			// $carrier_rate_totals = Load::where('customer_id', $customer->customer_id)
   //       	->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
			// ->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
			// ->sum('carrier_rate');

			// $profit = $total - $carrier_rate_totals;

			// $profit_margin = $profit / $total;
			// $profit_margin = round((float)$profit_margin * 100 );
         	
   //       	$cus = Load::where('customer_id', $customer->customer_id)->get();

         	

   //       	$info[] = [$total, $cus[0]->customer_name, $cus[0]->customer_id, $carrier_rate_totals, $profit, $profit_margin];


   //       }


   //       $info = ['info' => $info ];

			// Mail::send(['html'=>'email.customerTotals'], $info, function($message) use ($info){

			// $message->to('mikec@itransys.com')->subject("Customer Totals");

   //      	});
			

		//$data = Item::get()->toArray();
		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'customer_id', 'amount_due', 'carrier_name', 'carrier_rate', 'quick_pay_flag', 'customerPayStatus')
		->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		->get();

		//->whereBetween('billed_date', [$start, $end])->orderBy('id', 'asc')->get();


		return \Excel::create('Profit_Report_' . $start_date . '_to_' . $end_date, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

	

	public function generalLedgerExcel($type, Request $request)
	{
		$start = $request->input('start_date');
		$end = $request->input('end_date');

		$start = Carbon::createFromFormat('m/d/Y', $start, "America/Chicago");
	    $end = Carbon::createFromFormat('m/d/Y', $end, "America/Chicago");

	    $start = date("Y-m-d", strtotime($start));

	    $end = date("Y-m-d", strtotime($end));



		$loads = Ledger::select('date', 'upload_date', 'reference_number', 'cleared', 'cleared_date', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'memo', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('date', [$start, $end])->orderBy('id', 'asc')->get();
		


		return \Excel::create('General_Ledger_' . $start . '_to_' . $end, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

	

	public function allNeededPODs()
	{
		

	$loads = Load::select('id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'customer_id', 'amount_due', 'carrier_name', 'carrier_rate', 'carrier_contact', 'carrier_email', 'carrier_phone', 'pick_date', 'pick_status', 'delivery_date', 'delivery_status', 'billed_date')->where('delivery_status', 'Delivered')->whereNull('billed_date')->where('pick_status', '!=', 'Cancelled')->where('pick_status', '!=', 'TONU')->orderBy('id', 'asc')->get();
		


		return \Excel::create('Need_POD', function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download('csv');
	}

	public function carrierPaidNotBilled()
	{
		
		$load = new Load();

		$loads = $load->paidNotBilled();
	
		return \Excel::create('CarrierPaidNotBilled', function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download('csv');
	}

	public function paidVSAmountDue()
	{
		
		$load = new Load();

		$loads = $load->paidVSAmount();
	
		return \Excel::create('PaidVSAmountDue', function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download('csv');
	}

	

	

	public function approvedCarrierBillsFile($type, Request $request)
	{
		$start = $request->input('start_date');
		$end = $request->input('end_date');

		// $start = Carbon::createFromFormat('m/d/Y', $start, "America/Chicago");
	 //    $end = Carbon::createFromFormat('m/d/Y', $end, "America/Chicago");

	 //    $start = date("Y-m-d", strtotime($start));

	 //    $end = date("Y-m-d", strtotime($end));



		


		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'vendor_invoice_date', 'id', 'carrier_name', 'carrier_rate')
		->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start}', '%m/%d/%Y')")
		->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end}', '%m/%d/%Y')")
		->where('carrierPayStatus', 'APPRVD')
		->orderBy('id', 'asc')
		->get();
		


		return \Excel::create('Approved_Carrier_Invoices_' . $start . '_to_' . $end, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

	

	public function generalLedgerTargetType($type, Request $request)
	{
		$start = $request->input('start_date');
		$end = $request->input('end_date');
		$type_selected = $request->input('type_selected');

		$start = Carbon::createFromFormat('m/d/Y', $start, "America/Chicago");
	    $end = Carbon::createFromFormat('m/d/Y', $end, "America/Chicago");

	    $start = date("Y-m-d", strtotime($start));
		$end = date("Y-m-d", strtotime($end));

		$total = "";

		

		
		
		
		
			$loads = Ledger::select('date', 'upload_date', 'reference_number', 'type', 'type_description', 'journal_entry_number', 'pro_number', 'account_name', 'memo', 'payment_method', 'payment_amount', 'deposit_amount')->whereBetween('date', [$start, $end])->where('type_description', $type_selected)->orderBy('id', 'asc')->get();
			
			
		
		

		


		return \Excel::create('GeneralLedger_' . $start . '_to_' . $end . '_Type_' . $type_selected, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

	
	public function achEmailNotify($id)
	{
		
		$load = Load::findOrFail($id);

		$info = ['info' => $load ];

			Mail::send(['html'=>'email.sendEmailToVendorReceivingACH'], $info, function($message) use ($info){

			$message->to($info['info']['accounting_email'])->subject("ACH Payment Notice from ITS for PRO # " . $info['info']['id'])
			->from('lianey@itransys.com', 'Liane')
			->replyTo('lianey@itransys.com', 'Liane')
			->sender('lianey@itransys.com', 'Liane');

        	});


        //Update the database 
		date_default_timezone_set("America/Chicago");
        $currentDate = Carbon::now();

		\DB::table('loads')->where('id', $id)->update([
			'carrierPayStatus' => "COMPLETED",
			'upload_date' => $currentDate
		]);



		$carrier_invoices = Load::select('routing_number', 'account_number', 'carrier_rate', 'account_type', 'account_name', 'id')
		->where('id', $id)->get();



		$carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda'] = 'This payment is from Intl Transport Systems on our PRO # ' . $carrier_invoices['id'];
    			return $carrier_invoices;
			});

		 $carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda_type'] = 'FRF';
    			return $carrier_invoices;
			});

		 //Todays Date
		date_default_timezone_set("America/Chicago");
        
  		$currentDate = Carbon::now();


		return \Excel::create('ACH_Uploaded_On_' . $currentDate, function($excel) use ($carrier_invoices) {
			$excel->sheet('mySheet', function($sheet) use ($carrier_invoices)
	        {
	        	
				$sheet->fromArray($carrier_invoices);

				$sheet->setColumnFormat(array('A'=>'0000'));

			});

		})->download('csv');
	}


	public function achEmailOnlyNotify($id)
	{
		
		$load = Load::findOrFail($id);

		$info = ['info' => $load ];

			Mail::send(['html'=>'email.sendEmailToVendorReceivingACH'], $info, function($message) use ($info){

			$message->to($info['info']['accounting_email'])->subject("ACH Payment Notice from ITS for PRO # " . $info['info']['id'])
			->from('lianey@itransys.com', 'Liane')
			->replyTo('lianey@itransys.com', 'Liane')
			->sender('lianey@itransys.com', 'Liane');

        	});


		return back()->with('status', 'You Sent an ACH Email Notification.');
	}

	

	public function achCSV($type, Request $request)
	{
	
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');

		  //For the emails
	// 	$loads = Load::where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
	// 	 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
	// 	 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
	// 	 ->get();
	

	

	// foreach($loads as $load) 
	// { 
	
		


	// 	if ($load->accounting_email !== null)
	// 	{
	// 		$info = ['info' => $load ];

	// 		Mail::send(['html'=>'email.sendEmailToVendorReceivingACH'], $info, function($message) use ($info){

	// 		$message->to($info['info']['accounting_email'])->subject("ACH Payment Notice from ITS for PRO # " . $info['info']['id'])
	// 		->from('lianey@itransys.com', 'Liane')
	// 		->replyTo('lianey@itransys.com', 'Liane')
	// 		->sender('lianey@itransys.com', 'Liane');

 //        	});
	// 	}
 //    }
		 
		 $carrier_invoices = Load::select('routing_number', 'account_number', 'carrier_rate', 'account_type', 'account_name', 'id')
		 ->where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		 ->get();



		$carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda'] = 'This payment is from Intl Transport Systems on our PRO # ' . $carrier_invoices['id'];
    			return $carrier_invoices;
			});

		 $carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda_type'] = 'FRF';
    			return $carrier_invoices;
			});


		 // $updates = Load::where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
		 // ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 // ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		 // ->get();

		 //Todays Date
		  date_default_timezone_set("America/Chicago");
        
  $currentDate = Carbon::now();

		//  foreach ($updates as $update)
		//  {
		 
		// \DB::table('loads')->where('id', $update->id)->update([
		// 	'carrierPayStatus' => "COMPLETED",
		// 	'upload_date' => $currentDate
		// ]);
		// }	

		 

		return \Excel::create('ACH_Uploaded_On_' . $currentDate, function($excel) use ($carrier_invoices) {
			$excel->sheet('mySheet', function($sheet) use ($carrier_invoices)
	        {
	        	
				$sheet->fromArray($carrier_invoices);

				$sheet->setColumnFormat(array('A'=>'0000'));

			});

		})->download($type);

			
	}

	public function sampleACHCSV($type, Request $request)
	{
	
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');
		 
		 $carrier_invoices = Load::select('routing_number', 'account_number', 'carrier_rate', 'account_type', 'account_name', 'id', 'accounting_email', 'vendor_invoice_date')
		 ->where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		 ->get();



		 // $carrier_invoices->transform(function($carrier_invoices) {
			
			// $carrier_invoices->amount_due = $carrier_invoices->amount_due . ".01";

			// if($carrier_invoices->account_type == "Checking")
			// {
			// 	$carrier_invoices->account_type = "C";
			// }
			// elseif($carrier_invoices->account_type == "Saving")
			// {
			// 	$carrier_invoices->account_type = "S";
			// }
			 
			//  return $carrier_invoices;
			// });

		 $carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda'] = 'This payment is from Intl Transport Systems on our PRO # ' . $carrier_invoices['id'];
    			return $carrier_invoices;
			});

		 $carrier_invoices->map(function ($carrier_invoices) {
    			$carrier_invoices['addenda_type'] = 'FRF';
    			return $carrier_invoices;
			});
			

		 //Todays Date
		 date_default_timezone_set("America/Chicago");
        
        $currentDate = date('m-d-Y');

		return \Excel::create('ACH_Uploaded_On_' . $currentDate, function($excel) use ($carrier_invoices) {
			$excel->sheet('mySheet', function($sheet) use ($carrier_invoices)
	        {

	        	
				$sheet->fromArray($carrier_invoices);

				$sheet->setColumnFormat(array('A'=>'0000'));

				

			});

		})->download($type);
	}


// 	Load::select('routing_number', 'account_number', 'amount_due', 'account_type', 'account_name', 'id')->where('approved_carrier_invoice', $import_date)->where('payment_method', "ACH")->orderBy('id', 'desc')->get();

// This line should be returning a collection so you should be able to add the following after the get
// ->transform(function($load) {
// $load->amount_due = $load->amount_due . '.00';
// return $load;
// });



	public function exportCustomerInvoices($type, Request $request)
	{
		 //Customer Invoice Import
		 $import_date = $request->input('import_date');
		 
		 
		
		$customer_invoices = Load::select('id', 'customer_name', 'customer_address', 'customer_city', 'customer_state', 'customer_zip', 'billed_date', 'po_number', 'amount_due', 'its_group', 'commodity')->where('billed_date', $import_date)->orderBy('id', 'desc')->get();

		return \Excel::create('Customer_Invoices_' . $import_date, function($excel) use ($customer_invoices) {
			$excel->sheet('mySheet', function($sheet) use ($customer_invoices)
	        {
				$sheet->fromArray($customer_invoices);


	        });

		})->download($type);
	}

	public function overallAgingDownload($type, Request $request)
	{
		 
		
		
		//query database
		


		$overallAging = Load::select('customer_name', 'customer_id', 'id', 'amount_due', 'billed_date')->whereNotNull('billed_date')->where('customerPayStatus', 'OPEN')->where('billed_date', '!=', '')->where('pick_status', '!=', 'Cancelled')->where('amount_due', '!=', "0")->orderBy('billed_date', 'asc')->orderBy('customer_id', 'asc')->get();

		$overallAging->map(function ($overallAging) {
    			$overallAging['plus_thirty'] = '';
    			return $overallAging;
			});

		$overallAging->map(function ($overallAging) {
    			$overallAging['aging'] = '';
    			return $overallAging;
			});

		
		

		$overallAging->transform(function($overallAging) {
			
			//IF THERE IS AN EMPTY BILLED DATE THEN ENTER IN 'NO BILLED DATE WHATS UP?'
			if($overallAging->billed_date == '')
			{
				$overallAging->plus_thirty = 'No Billed Date Set';

				$overallAging->aging = 'No Billed Date Set';
			}
			else
			{

			//Do +30 days from billed date
			$date = Carbon::createFromFormat('m/d/Y', $overallAging->billed_date);
			$plusThirty = (string)$date->addDays(30)->format('m/d/Y');
			$overallAging->plus_thirty = $plusThirty;

			


			//Get todays date to do math
			$today_raw = Carbon::now('America/Chicago');
			//Get the billed date
			$billed_date = Carbon::createFromFormat('m/d/Y', $overallAging->billed_date);
			//Get the object of the billed date +30
			$plusThirtyForMath = $billed_date->addDays(30);
			
			$overallAging->aging = (string)$plusThirtyForMath->diffInDays($today_raw, false);
			}

			
			return $overallAging;
		});

		return \Excel::create('Overall_Aging_File' , function($excel) use ($overallAging) {
			$excel->sheet('mySheet', function($sheet) use ($overallAging)
	        {	
	        	$sheet->setWidth('A', 15);
	        	$sheet->setWidth('B', 10);
	        	$sheet->setWidth('C', 10);
	        	$sheet->setWidth('D', 10);
	        	$sheet->setWidth('E', 15);
	        	$sheet->setWidth('F', 15);
	        	$sheet->setWidth('G', 15);
				$sheet->fromArray($overallAging);


	        });

		})->download($type);
	}

	

	//exportPositivePay

	public function exportPositivePay($type, Request $request)
	{
		
		 //Customer Invoice Import
		 $positivePayDate = $request->input('positivePay');



		 //Convert time
		 $positivePayDate = Carbon::createFromFormat('m/d/Y', $positivePayDate);

		 $positivePayDate = $positivePayDate->toDateString();


		 
		
		$positivePayResults = Load::select('vendor_check_number', 'upload_date', 'carrier_name', 'carrier_rate')->whereDate('upload_date', $positivePayDate)->where('payment_method', 'CHECK')->orderBy('id', 'desc')->get();



		
		$positivePayResults->transform(function($positivePayResults) {
			
			$positivePayResults->carrier_rate = $positivePayResults->carrier_rate . "00";

			//convert to mm/dd/yy




$positivePayResults->upload_date = Carbon::parse($positivePayResults->upload_date)->format('m/d/y');




			

			

			
			 
			 return $positivePayResults;
			});


		return \Excel::create('Positive_Pay_' . $positivePayDate, function($excel) use ($positivePayResults) {
			$excel->sheet('mySheet', function($sheet) use ($positivePayResults)
	        {
				$sheet->fromArray($positivePayResults);


	        });

		})->download($type);
	}


	public function exportPositivePayJournal($type, Request $request)
	{
		
		 //Customer Invoice Import
		 $positivePayDate = $request->input('positivePayJournal');



		 //Convert time
		 $positivePayDate = Carbon::createFromFormat('m/d/Y', $positivePayDate);

		 $positivePayDate = $positivePayDate->toDateString();


		 
		
		$positivePayResults = Journal::select('reference_number', 'upload_date', 'name_on_check', 'payment_amount')->whereDate('upload_date', $positivePayDate)->where('payment_method', 'CHECK')->orderBy('id', 'desc')->get();



		
		$positivePayResults->transform(function($positivePayResults) {
			
			$positivePayResults->payment_amount = $positivePayResults->payment_amount . "00";

			//convert to mm/dd/yy


			$positivePayResults->upload_date = Carbon::parse($positivePayResults->upload_date)->format('m/d/y');
			
			


			return $positivePayResults;
			});


		return \Excel::create('Positive_Pay_' . $positivePayDate, function($excel) use ($positivePayResults) {
			$excel->sheet('mySheet', function($sheet) use ($positivePayResults)
	        {
				$sheet->fromArray($positivePayResults);


	        });

		})->download($type);
	}

	public function exportCarrierBills($type, Request $request)
	{
		 //Set timezone
		 date_default_timezone_set("America/Chicago");

		 //Customer Invoice Import
		 $import_date = $request->input('import_date');
		 
		 //Convert time
		 $import_date = Carbon::createFromFormat('m/d/Y', $import_date);

		 $import_date = $import_date->toDateString();
		 


		
		$carrier_bills = Load::select('id', 'carrier_name', 'vendor_invoice_date', 'vendor_invoice_number', 'carrier_rate', 'quick_status_notes', 'remit_name', 'remit_address', 'remit_city', 'remit_state', 'remit_zip')->whereDate('approved_carrier_invoice', $import_date)->orderBy('id', 'desc')->get();

	

		return \Excel::create('Carrier_Bills_' . $import_date, function($excel) use ($carrier_bills) {
			$excel->sheet('mySheet', function($sheet) use ($carrier_bills)
	        {
				$sheet->fromArray($carrier_bills);


	        });
	        
		})->download($type);
	}

	public function truckstopPost(\App\Transformers\TruckstopTransformer $transformer)
{   
    $savePath = storage_path('csv/' . 'itransys.csv');

    $truckstop_post = Loadlist::select('pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'trailer_type', 'pick_date', 'load_type', 'length', 'width', 'height', 'weight', 'post_money', 'special_instructions', 'company_contact', 'contact_phone')->where('urgency', '!=', 'Booked')->where('urgency', '!=', 'Quote')->where('urgency', '!=', 'Hold')->get();

    $truckstop_post = $transformer->transformCollection($truckstop_post);



       $fp = fopen($savePath, 'w');

        if ($truckstop_post instanceof Illuminate\Support\Collection) {

        			$keys = array_keys($truckstop_post->first()->toArray());
        	}	else {
        		$keys = array_keys($truckstop_post[0]);
        	}
        	

		fputcsv($fp,$keys);
		foreach ($truckstop_post as $key => $value) {
	        fputcsv($fp, $value);
		}

        fclose($fp);


       $info = ["foo" => "bar", "bar" => "foo"];


       Mail::send(['html'=>'email.body'], $info, function($message) use ($info, $truckstop_post, $savePath){

        

       	$recipients = ['joem@itransys.com', 'mikeb@itransys.com', 'robert@itransys.com', 'loads@truckstop.com', 'mikec@itransys.com', 'mattc@itransys.com', 'mattk@itransys.com', 'luke@itransys.com', 'aj@itransys.com'];

        $message->to($recipients)->subject('Truckstop Posted')
			->from(\Auth::user()->email, \Auth::user()->name)
			->replyTo(\Auth::user()->email, \Auth::user()->name)
			->sender(\Auth::user()->email, \Auth::user()->name);

        	$message->attach($savePath);

        });


    return back()->with('status', 'You Posted Truckstop!');

}

public function datPost(\App\Transformers\DatTransformer $transformer) 
{
	    $savePath = storage_path('csv/' . 'dat.csv');

    $truckstop_post = Loadlist::select('pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'trailer_type', 'pick_date', 'load_type', 'length', 'width', 'height', 'weight', 'post_money', 'special_instructions', 'company_contact', 'contact_phone')->where('urgency', '!=', 'Booked')->where('urgency', '!=', 'Quote')->where('urgency', '!=', 'Hold')->get();

	$truckstop_post = $transformer->transformCollection($truckstop_post);

	$fp = fopen($savePath, 'w');

        if ($truckstop_post instanceof Illuminate\Support\Collection) {
        		
        		$keys = array_keys($truckstop_post->first()->toArray());
        	}	else {
        		$keys = array_keys($truckstop_post[0]);
        	}

		fputcsv($fp,$keys);
		foreach ($truckstop_post as $key => $value) {
			
	        fputcsv($fp, $value);
		}

        fclose($fp);

            return response()->download($savePath);

}

public function truckerPathPost(\App\Transformers\TruckerPathTransformer $transformer)
{

	$savePath = storage_path('csv/' . 'trucker_path.csv');

	$trucker_path_post = Loadlist::select('pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'trailer_type', 'pick_date', 'load_type', 'length', 'width', 'height', 'weight', 'post_money', 'special_instructions', 'company_contact', 'contact_phone')->where('urgency', '!=', 'Booked')->where('urgency', '!=', 'Quote')->where('urgency', '!=', 'Hold')->get();

	$trucker_path_post = $transformer->transformCollection($trucker_path_post);

	$fp = fopen($savePath, 'w');

        if ($trucker_path_post instanceof Illuminate\Support\Collection) {
        		
        		$keys = array_keys($trucker_path_post->first()->toArray());
        	}	else {
        		$keys = array_keys($trucker_path_post[0]);
        	}

		fputcsv($fp,$keys);
		foreach ($trucker_path_post as $key => $value) {
			
	        fputcsv($fp, $value);
		}

        fclose($fp);

         $info = ["foo" => "bar", "bar" => "foo"];


       Mail::send(['html'=>'email.body'], $info, function($message) use ($info){

        

       	$recipients = ['mikec@itransys.com'];

        $message->to($recipients)->subject('Truck Path has been Clicked')
			->from(\Auth::user()->email, \Auth::user()->name)
			->replyTo(\Auth::user()->email, \Auth::user()->name)
			->sender(\Auth::user()->email, \Auth::user()->name);

        	

        });

            return response()->download($savePath);

}

public function accountsPayableExcelFile($type, Request $request)
{

		//I want all APPRVD carrier invoices within a date range in vendor_invoice_date
		$start = $request->input('start_date');
		$end = $request->input('end_date');




		$loads = Load::select('id', 'payment_method', 'carrier_name', 'carrier_rate', 'vendor_invoice_date', 'vendor_invoice_number', 'carrierPayStatus')
						->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start}', '%m/%d/%Y')")
						->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end}', '%m/%d/%Y')")
						->where('carrierPayStatus', 'APPRVD')
						->orderBy('id', 'asc')->get();


		return \Excel::create('Accounts_Payable_' . $start . '_to_' . $end, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {

				$sheet->fromArray($loads);


	        });
		})->download($type);

}


}




