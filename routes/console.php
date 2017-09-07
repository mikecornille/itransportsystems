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
	
	
	$brokers = ['luke@itransys.com', 'robert@itransys.com', 'aj@itransys.com', 'mattk@itransys.com'];

	

	foreach($brokers as $broker) { 

	
	date_default_timezone_set("America/Chicago");

	$current_date = Carbon\Carbon::now()->format('m/d/Y');

	$loads = Loadlist::select('pick_city', 'pick_state', 'customer', 'delivery_city', 'delivery_state', 'urgency', 'handler', 'created_by')->where('pick_date', $current_date)->where('handler', $broker)->where('urgency', '!=', 'Booked')->orderBy('pick_city', 'asc')->get();


   	$info = ['info' => $loads->toArray()];



    Mail::send(['html'=>'email.brokerCallEmail'], $info, function($message) use ($info){

		

        $message->to($info['info'][0]['handler'])->subject("Call Email Load Updates")
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
	$customer_emails = Customer::select('email')->where('weekly_email', 'WEEKLY')->get();
	
	//Convert results to an array
	$customer_emails = $customer_emails->toArray();

	

	//Loop through the array of emails
	foreach($customer_emails as $email){

		
	//Get the customers records that should receive a weekly email
	  $customer_records = Customer::where('weekly_email', 'WEEKLY')->where('email', $email['email'])->get();

	//Convert customer records into an array for to pass into email
	  $info = ['info' => $customer_records->toArray()];
    
	  Mail::send(['html'=>'email.weeklyCustomerTouch'], $info, function($message) use ($info, $email){

		$message->to($email['email'])->subject("International Transport Systems, Inc - Outside Hauler Check In")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });
	
}



	

   
})->describe('Weekly Customer Touch');



Artisan::command('currentCarrierInspection', function () {
	
	 //TO BE LOADED CODE

	 //Get the count of loads that are currently booked then subtract 1
	 //$loadCount = Load::where('pick_status', 'Booked')->where('carrier_id', '!=', '1')->count();

	 //$loadCount = $loadCount - 1;

	 //Get the carrier id of the loads that are currently booked
	 //$carrierId = Load::select('carrier_id')->where('pick_status', 'Booked')->where('carrier_id', '!=', '1')->get()->toArray();
	 
	 //Init an empty array
	 //$data = array();

	 //Loop all the carrier id's find their info then stuff them all into 1 array
	 //for ($x = 0; $x <= $loadCount; $x++) {
    	
    	//Find the carrier info based on the id #
    	//$carrierInfo = Carrier::where('id', $carrierId[$x])->get()->toArray();

    	//Build up the array
    	//$data[] = $carrierInfo;
    	
	 //} 

	 //END TO BE LOADED CODE

	 //TO BE DELIVERED CODE

	 //See above
	 $loadCountLoaded = Load::where('pick_status', 'Loaded')->where('carrier_id', '!=', '1')->count();

	 $loadCountLoaded = $loadCountLoaded - 1;

     $carrierIdLoaded = Load::select('carrier_id')->where('pick_status', 'Loaded')->where('carrier_id', '!=', '1')->get()->toArray();
	 
	 $dataLoaded = array();

	 	for ($x = 0; $x <= $loadCountLoaded; $x++) {
    	
    		$carrierInfoLoaded = Carrier::where('id', $carrierIdLoaded[$x])->get()->toArray();

    		$dataLoaded[] = $carrierInfoLoaded;
	} 
	 
	 //END TO BE DELIVERED CODE
	 
	  $info = ['info' => $data, 'loaded' => $dataLoaded];
    
	  Mail::send(['html'=>'email.currentCarrierInspection'], $info, function($message) use ($info){

	  	$recipients = ['mikec@itransys.com', 'mikecornille@gmail.com'];

		$message->to($recipients)->subject("Our Current Carriers on the Road")
			->from('mikec@itransys.com', 'Mike Cornille')
			->replyTo('mikec@itransys.com', 'Mike Cornille')
			->sender('mikec@itransys.com', 'Mike Cornille');

        });

})->describe('Get a daily report on the carriers we are currently working with');

