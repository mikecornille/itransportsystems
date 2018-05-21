<?php

use Illuminate\Foundation\Inspiring;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Item;
use App\User;
use App\Load;
use App\Carrier;
use App\Loadlist;
use App\Customer;
use App\Journal;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('weeklyProfitReport', function () {
	
	$type = 'csv';
	
	$start_date = Carbon\Carbon::now()->subWeeks(1)->format('m/d/Y');
	
	$end_date = Carbon\Carbon::now()->format('m/d/Y');
    
    $loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'amount_due', 'carrier_name', 'carrier_rate')->whereBetween('billed_date', [$start_date, $end_date])->orderBy('id', 'asc')->get();

	$data = \Excel::create('Weekly_Profit_Report_' . $start_date . '_to_' . $end_date, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		});
		        
	if ($loads instanceof Illuminate\Support\Collection) {
		if($loads->count()) {
	        			
	        					$keys = array_keys($loads->first()->toArray());

	        		} else {
	        			
	        					$keys = [];
	        		
	        		}
        	}	else {
        		
        		$keys = array_keys($loads[0]);
        	}

		$savePath = storage_path('csv/' . 'weekly_profit_report.csv');
		$fp = fopen($savePath, 'w');
		fputcsv($fp,$keys);
		foreach ($loads as $key => $value) {
	        fputcsv($fp, $value->toArray());
		}

        fclose($fp);

        $info = ["foo" => "bar", "bar" => "foo"];

        Mail::send(['html'=>'email.body'], $info, function($message) use ($info, $savePath){

		$recipients = ['mikec@itransys.com'];

        $message->to($recipients)->subject('Weekly Profit Report')
			->from($recipients[0], $recipients[0])
			->replyTo($recipients[0], $recipients[0])
			->sender($recipients[0], $recipients[0]);

        	$message->attach($savePath);
        });

})->describe('Generate Weekly Profit Report');

//Daily carrier set up

Artisan::command('dailyCarriersSetUp', function () {
	
	date_default_timezone_set("America/Chicago");

	$type = 'csv';
	
	$carrier_created = Carbon\Carbon::now()->format('Y-m-d');

	
	
	
    $carriers = Carrier::select('company', 'mc_number', 'dot_number', 'state', 'phone', 'email')->whereDate('created_at', $carrier_created)->orderBy('id', 'asc')->get();

    

    

	// $data = \Excel::create('Daily_Carrier_Report_' . $carrier_created, function($excel) use ($carriers) {
	// 		$excel->sheet('mySheet', function($sheet) use ($carriers)
	//         {
	// 			$sheet->fromArray($carriers);
	//         });
	// 	});
		        
	// if ($carriers instanceof Illuminate\Support\Collection) {
	// 	if($carriers->count()) {
	        			
	//         					$keys = array_keys($carriers->first()->toArray());

	//         		} else {
	        			
	//         					$keys = [];
	        		
	//         		}
 //        	}	else {
        		
 //        		$keys = array_keys($carriers[0]);
 //        	}

	// 	$savePath = storage_path('csv/' . 'daily_carrier_report.csv');
	// 	$fp = fopen($savePath, 'w');
	// 	fputcsv($fp,$keys);
	// 	foreach ($carriers as $key => $value) {
	//         fputcsv($fp, $value->toArray());
	// 	}

 //        fclose($fp);


        $info = ['info' => $carriers->toArray()];

       Mail::send(['html'=>'email.dailyCarrierCountEmail'], $info, function($message) use ($info){

		$recipients = ['mikec@itransys.com'];

        $message->to($recipients)->subject("Today's New Carriers")
			->from($recipients[0], $recipients[0])
			->replyTo($recipients[0], $recipients[0])
			->sender($recipients[0], $recipients[0]);

        	// $message->attach($savePath);
        });

})->describe('Generate New Carrier Report Daily');

//Daily carrier set up

Artisan::command('screamerCheck', function () {
	
	date_default_timezone_set("America/Chicago");

	$current_date = Carbon\Carbon::now()->format('m/d/Y');

	$loads = Loadlist::select('pick_city', 'pick_state', 'customer', 'delivery_city', 'delivery_state', 'created_by', 'urgency')->where('pick_date', $current_date)->where('urgency', 'Screaming')->orderBy('pick_city', 'asc')->get();

   	$info = ['info' => $loads->toArray()];

    Mail::send(['html'=>'email.screamerCheck'], $info, function($message) use ($info){

		$recipients = ['mikec@itransys.com', 'mattk@itransys.com', 'ronc@itransys.com', 'joem@itransys.com','mikeb@itransys.com', 'mattc@itransys.com'];

        $message->to($recipients)->subject("Current Screaming Loads")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

})->describe('Get current screaming loads');

//Daily check on the person assigned to the load in the call-email column

Artisan::command('brokerCallEmail', function () {
	
	
	$brokers = ['LT', 'RB', 'AM', 'MK'];
	


	foreach($brokers as $broker) {

		

	date_default_timezone_set("America/Chicago");

	$current_date = Carbon\Carbon::now()->format('m/d/Y');



	$loads = Loadlist::select('pick_city', 'pick_state', 'customer', 'delivery_city', 'delivery_state', 'urgency', 'handler', 'created_by')->where('pick_date', $current_date)->where('handler', $broker)->where('urgency', '!=', 'Booked')->orderBy('pick_city', 'asc')->get();


   	


   	$info = ['info' => $loads->toArray()];

   	switch ($broker) 
		{
		    case "AM":
		        $broker = 'aj@itransys.com';
		        break;
		    case "LT":
		        $broker = 'luke@itransys.com';
		        break;
		    case "MK":
		        $broker = 'mattk@itransys.com';
		        break;
		    case "RB":
		        $broker = 'robert@itransys.com';
		        break;
		    default:
		        echo "Your favorite color is neither red, blue, nor green!";
		}

		



    Mail::send(['html'=>'email.brokerCallEmail'], $info, function($message) use ($info, $broker){

		

        $message->to($broker)->subject("Call Email Load Updates")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

    }

})->describe('Daily check on the person assigned to the load in the call-email column');


//Follow Up Screamer Email

Artisan::command('followUpScreamerEmail', function () {
	
	$info = ["foo" => "bar", "bar" => "foo"];
	
	Mail::send(['html'=>'email.followUpScreamerEmail'], $info, function($message) use ($info){

		$message->to('mattk@itransys.com')->subject("Screamers Update Request")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

   
})->describe('Follow up checking on screamers');

//Weekly Customer Touch weeklyCustomerTouch

Artisan::command('weeklyCustomerTouch', function () {
	
	//Get the customers emails
	$customer_emails = Customer::select('contact as name','email')->where('weekly_email', 'WEEKLY')->get();
	
	//Convert results to an array
	$customer_emails = $customer_emails->toArray();

	//Loop through the array of emails
	foreach($customer_emails as $email){

		
	//Get the customers records that should receive a weekly email
	  $customer_records = Customer::where('weekly_email', 'WEEKLY')->where('email', $email['email'])->get();

	//Convert customer records into an array for to pass into email
	  $info = ['info' => $customer_records->toArray()];

	  Mail::send(['html'=>'email.weeklyCustomerTouch'], $info, function($message) use ($info, $email, $customer_emails){

		$message->to('mikec@itransys.com')->bcc($customer_emails)->subject("International Transport Systems, Inc - Outside Hauler Check In")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });
	
}



	

   
})->describe('Weekly Customer Touch');



Artisan::command('currentCarrierInspection', function () {
	
	 //TO BE LOADED CODE

	 //Get the count of loads that are currently booked then subtract 1
	 $loadCount = Load::where('pick_status', 'Booked')->count();

	 $loadCount = $loadCount - 1;

	 //Get the carrier id of the loads that are currently booked
	 $carrierId = Load::select('carrier_id')->where('pick_status', 'Booked')->get()->toArray();
	 
	 //Init an empty array
	 $data = array();

	 //Loop all the carrier id's find their info then stuff them all into 1 array
	 for ($x = 0; $x <= $loadCount; $x++) {
    	
    	//Find the carrier info based on the id #
    	$carrierInfo = Carrier::where('id', $carrierId[$x])->get()->toArray();

    	//Build up the array
    	$data[] = $carrierInfo;
    	
	 } 

	 //END TO BE LOADED CODE

	 //TO BE DELIVERED CODE

	 //See above
	//  $loadCountLoaded = Load::where('pick_status', 'Loaded')->where('carrier_id', '!=', '1')->count();

	//  $loadCountLoaded = $loadCountLoaded - 1;

 //     $carrierIdLoaded = Load::select('carrier_id')->where('pick_status', 'Loaded')->where('carrier_id', '!=', '1')->get()->toArray();
	 
	//  $dataLoaded = array();

	//  	for ($x = 0; $x <= $loadCountLoaded; $x++) {
    	
 //    		$carrierInfoLoaded = Carrier::where('id', $carrierIdLoaded[$x])->get()->toArray();

 //    		$dataLoaded[] = $carrierInfoLoaded;
	// } 
	 
	 //END TO BE DELIVERED CODE

	 //removed  'loaded' => $dataLoaded
	 
	  $info = ['info' => $data];
    
	  Mail::send(['html'=>'email.currentCarrierInspection'], $info, function($message) use ($info){

	  	$recipients = ['mikec@itransys.com', 'mikecornille@gmail.com'];

		$message->to($recipients)->subject("Our Current Carriers on the Road")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

})->describe('Get a daily report on the carriers we are currently working with');

//Daily check for the brokers to check the my stats page

Artisan::command('brokersCheckMyStats', function () {
	
	
	$brokers = ['luke@itransys.com', 'robert@itransys.com', 'aj@itransys.com', 'mattk@itransys.com', 'mikec@itransys.com'];

	

	foreach($brokers as $broker) { 


   	$info = ['broke' => $broker ];



    Mail::send(['html'=>'email.brokersCheckMyStats'], $info, function($message) use ($info){


		

        $message->to($info['broke'])->subject("Please Take A Minute To Check Your My Stats Page")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

    }

})->describe('Daily check for the brokers to check the my stats page');

//Daily check for the bidders to check the to be loaded and to be delivered pages

Artisan::command('biddersCheckOnTheRoad', function () {
	
	
	$bidders = ['joem@itransys.com', 'ronc@itransys.com', 'mikeb@itransys.com', 'mikec@itransys.com', 'mattc@itransys.com'];

	foreach($bidders as $bidder) { 


   	$info = ['bid' => $bidder ];



    Mail::send(['html'=>'email.biddersCheckOnTheRoad'], $info, function($message) use ($info){


		

        $message->to($info['bid'])->subject("Please take a minute to check the To Be Loaded and To Be Delivered pages ")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

    }

})->describe('Daily check for the bidders to check the to be loaded and to be delivered pages');

Artisan::command('import:inspections {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		if($count == 1) {
			continue;
		}

		\DB::table('imported_inspections')->insert([
			'UNIQUE_ID' => $data[0],
			'REPORT_NUMBER' => $data[1],
			'REPORT_STATE' => $data[2],
			'DOT_NUMBER' => $data[3],
			'INSP_DATE' => Carbon\Carbon::parse($data[4])->toDateString(),
			'INSP_LEVEL_ID' => $data[5],
			'COUNTY_CODE_STATE' => $data[6],
			'TIME_WEIGHT' => $data[7],
			'DRIVER_OOS_TOTAL' => $data[8],
			'VEHICLE_OOS_TOTAL' => $data[9],
			'TOTAL_HAZMAT_SENT' => $data[10],
			'OOS_TOTAL' => $data[11],
			'HAZMAT_OOS_TOTAL' => $data[12],
			'HAZMAT_PLACARD_REQ' => $data[13],
			'UNIT_TYPE_DESC' => $data[14],
			'UNIT_MAKE' => $data[15],
			'UNIT_LICENSE' => $data[16],
			'UNIT_LICENSE_STATE' => $data[17],
			'VIN' => $data[18],
			'UNIT_DECAL_NUMBER' => (integer)$data[19],
			'UNIT_TYPE_DESC2' => $data[20],
			'UNIT_MAKE2' => $data[21],
			'UNIT_LICENSE2' => $data[22],
			'UNIT_LICENSE_STATE2' => $data[23],
			'VIN2' => $data[24],
			'UNIT_DECAL_NUMBER2' => (integer)$data[25],
			'UNSAFE_INSP' => $data[26],
			'FATIGUED_INSP' => $data[27],
			'DR_FITNESS_INSP' => $data[28],
			'SUBT_ALCOHOL_INSP' => $data[29],
			'VH_MAINT_INSP' => $data[30],
			'HM_INSP' => $data[31],
			'BASIC_VIOL' => $data[32],
			'UNSAFE_VIOL' => $data[33],
			'FATIGUED_VIOL' => $data[34],
			'DR_FITNESS_VIOL' => $data[35],
			'SUBT_ALCOHOL_VIOL' => $data[36],
			'VH_MAINT_VIOL' => $data[37],
			'HM_VIOL' => (integer)$data[38],

		]);
	}
	fclose($file);
});

Artisan::command('import:fmcsa_census {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		if($count == 1) {
			continue;
		}

		if($data[19] !== "KS" && $data[22] !== "KS"){

if($data[19] !== "CA" && $data[22] !== "CA"){

	if ($data[5] !== "Y"){

		if($data[8] !== "PR"){

	\DB::table('fmcsa_census')->insert([
				'DOT_NUMBER' => (integer)$data[0],
			    'LEGAL_NAME' => $data[1],
			    'DBA_NAME' => $data[2],
			    'CARRIER_OPERATION' => $data[3],
			    'HM_FLAG' => $data[4],
			    'PC_FLAG' => $data[5],
			    'PHY_STREET' => $data[6],
			    'PHY_CITY' => $data[7],
			    'PHY_STATE' => $data[8],
			    'PHY_ZIP' => $data[9],
			    'PHY_COUNTRY' => $data[10],
			    'MAILING_STREET' => $data[11],
			    'MAILING_CITY' => $data[12],
			    'MAILING_STATE' => $data[13],
			    'MAILING_ZIP' => $data[14],
			    'MAILING_COUNTRY' => $data[15],
			    'TELEPHONE' => $data[16],
			    'FAX' => $data[17],
			    'EMAIL_ADDRESS' => $data[18],
			    'MCS150_DATE' => Carbon\Carbon::parse($data[19])->toDateString(),
			    'MCS150_MILEAGE' => (integer)$data[20],
			    'MCS150_MILEAGE_YEAR' => (integer)$data[21],
			    'ADD_DATE' => Carbon\Carbon::parse($data[22])->toDateString(),
			    'OIC_STATE' => $data[23],
			    'NBR_POWER_UNIT' => (integer)$data[24],
			    'DRIVER_TOTAL' => (integer)$data[25],
			    

		]);
}
}
}
}

	}
	fclose($file);
});

Artisan::command('import:sms {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		if($count == 1) {
			continue;
		}

		\DB::table('sms')->insert([
			'DOT_NUMBER' => $data[0],
			'INSP_TOTAL' => $data[1],
			'DRIVER_INSP_TOTAL' => $data[2],
			'DRIVER_OOS_INSP_TOTAL' => $data[3],
			'VEHICLE_INSP_TOTAL' => $data[4],
			'VEHICLE_OOS_INSP_TOTAL' => $data[5],
			'UNSAFE_DRIV_INSP_W_VIOL' => $data[6],
			'UNSAFE_DRIV_MEASURE' => $data[7],
			'UNSAFE_DRIV_AC' => $data[8],
			'HOS_DRIV_INSP_W_VIOL' => $data[9],
			'HOS_DRIV_MEASURE' => $data[10],
			'HOS_DRIV_AC' => $data[11],
			'DRIV_FIT_INSP_W_VIOL' => $data[12],
			'DRIV_FIT_MEASURE' => $data[13],
			'DRIV_FIT_AC' => $data[14],
			'CONTR_SUBST_INSP_W_VIOL' => $data[15],
			'CONTR_SUBST_MEASURE' => $data[16],
			'CONTR_SUBST_AC' => $data[17],
			'VEH_MAINT_INSP_W_VIOL' => $data[18],
			'VEH_MAINT_MEASURE' => $data[19],
			'VEH_MAINT_AC' => $data[20],
			

		]);
	}
	fclose($file);
});

Artisan::command('import:crash {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		if($count == 1) {
			continue;
		}

		\DB::table('crash')->insert([
			'DOT_NUMBER' => (integer)$data[2],
			'REPORT_DATE' => Carbon\Carbon::parse($data[3])->toDateString(),
			'FATALITIES' => (integer)$data[5],
			'INJURIES' => (integer)$data[6],
			'TOW_AWAY' => $data[7],

			

		]);
	}
	fclose($file);
});

Artisan::command('insertLedgerRecords', function () {
	
	//Delete whatever is in the table
    DB::table('ledgers')->delete();
	//Get all loads where customerPayStatus = PAID
	$customer_paid = Load::where('customerPayStatus', 'PAID')->get();
	//Get all loads where carrierPayStatus = PAID
	$carrier_paid = Load::where('carrierPayStatus', 'COMPLETED')->get();

	$general_journal = Journal::all();
	

	foreach($customer_paid as $customer)
	{
		\DB::table('ledgers')->insert([
			'pro_number' => $customer->id,
			'type' => "PMT",
			'type_description' => "Revenue",
			'type_description_sub' => "Income Collected",
			'date' => $customer->getAttributes()['deposit_date'],
			'reference_number' => $customer->ref_or_check_num_from_customer,
			'account_name' => $customer->customer_name,
			'account_id' => $customer->customer_id,
			'memo' => $customer->ref_or_check_num_from_customer,
			'deposit_amount' => $customer->paid_amount_from_customer,
			'payment_method' => $customer->payment_method_from_customer
		]);
	}

	foreach($carrier_paid as $carrier)
	{
		\DB::table('ledgers')->insert([
			'pro_number' => $carrier->id,
			'type' => "BILLPMT",
			'type_description' => "Expense",
			'type_description_sub' => "Freight Cost",
			'date' => $carrier->upload_date,
			'reference_number' => $carrier->vendor_check_number,
			'account_name' => $carrier->carrier_name,
			'account_id' => $carrier->carrier_id,
			'memo' => $carrier->quick_status_notes,
			'payment_amount' => $carrier->carrier_rate,
			'upload_date' => $carrier->upload_date,
			'payment_method' => $carrier->payment_method
		]);
	}

	foreach($general_journal as $journal)
	
	if($journal->payment_cents == "") 
	{
		$payment = $journal->payment_amount;

		{
		\DB::table('ledgers')->insert([
			'type' => $journal->type,
			'type_description' => $journal->type_description,
			'type_description_sub' => $journal->type_description_sub,
			'date' => $journal->created_at,
			'reference_number' => $journal->payment_number,
			'account_name' => $journal->account_name,
			'account_id' => $journal->account_id,
			'memo' => $journal->memo,
			'payment_amount' => $payment,
			'deposit_amount' => $journal->deposit_amount,
			'journal_entry_number' => $journal->id,
			'upload_date' => $journal->upload_date,
			'payment_method' => $journal->payment_method
		]);
	}
	}
	else
	{ 
		$payment = $journal->payment_amount . '.' . $journal->payment_cents; 

		{
		\DB::table('ledgers')->insert([
			'type' => $journal->type,
			'type_description' => $journal->type_description,
			'type_description_sub' => $journal->type_description_sub,
			'date' => $journal->created_at,
			'reference_number' => $journal->payment_number,
			'account_name' => $journal->account_name,
			'account_id' => $journal->account_id,
			'memo' => $journal->memo,
			'payment_amount' => $payment,
			'deposit_amount' => $journal->deposit_amount,
			'journal_entry_number' => $journal->id,
			'upload_date' => $journal->upload_date,
			'payment_method' => $journal->payment_method
		]);
	}
	}
	


	
	
	

})->describe('This will loop through the loads table and populate the ledger table');





Artisan::command('import:opencarrierinvoices {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		
			\DB::table('loads')->where('vendor_invoice_number', $data[0])->update([
            'carrierPayStatus' => "APPRVD"
        
        ]);
	}
	fclose($file);
});

Artisan::command('import:accountsR {filename}', function($filename) {
	$file = fopen(storage_path('imports/' . $filename),"r");

	$count = 0;
	while (($data = fgetcsv($file)) !== FALSE) {
		$count ++;
		
			\DB::table('loads')->where('id', $data[0])->update([
            'customerPayStatus' => "OPEN"
        
        ]);
	}
	fclose($file);
});

Artisan::command('achEmailsAndUpdate {start_date} {end_date}', function ($start_date, $end_date) {
	

		//Get the records for the emails
		$loads = Load::where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		 ->get();
	

		//Loop through each load and email the accounting department

		foreach($loads as $load) 
			{ 
				if ($load->accounting_email !== null)
					{
						$info = ['info' => $load ];

						Mail::send(['html'=>'email.sendEmailToVendorReceivingACH'], $info, function($message) use ($info){

						$message->to($info['info']['accounting_email'])->subject("ACH Payment Notice from ITS for PRO # " . $info['info']['id'])
						->from('lianey@itransys.com', 'Liane')
						->replyTo('lianey@itransys.com', 'Liane')
						->sender('lianey@itransys.com', 'Liane');

        	});
			}
    		}


		 //Update the database
		 $updates = Load::where('payment_method', "ACH")->where('carrierPayStatus', "APPRVD")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') >= STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') <= STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		 ->get();

		 //Todays Date
		 date_default_timezone_set("America/Chicago");
        
        $currentDate = Carbon::now();

		 foreach ($updates as $update)
		 {
		 //UPDATE WHERE ID = LOAD
		\DB::table('loads')->where('id', $update->id)->update([
			'carrierPayStatus' => "COMPLETED",
			'upload_date' => $currentDate
		]);
		}	

		 


	

})->describe('Send an email to all carriers receiving an ACH payment and reflect in database');

Artisan::command('import:clearedChecks {filename}', function($filename) {
	
	// $file = fopen(storage_path('imports/' . $filename),"r");

	// $count = 0;
	// while (($data = fgetcsv($file)) !== FALSE) {
	// 	$count ++;
		
	// 		\DB::table('loads')->where('id', $data[0])->update([
 //            'customerPayStatus' => "OPEN"
        
 //        ]);
	// }
	// fclose($file);
});

