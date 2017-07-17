<?php

use Illuminate\Foundation\Inspiring;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Item;
use App\User;
use App\Load;
use App\Carrier;
use App\Loadlist;

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

	$loads = Loadlist::select('pick_city', 'pick_state', 'customer', 'delivery_city', 'delivery_state', 'created_by', 'urgency')->where('pick_date', $current_date)->where('urgency', 'Screaming')->orderBy('id', 'asc')->get();

   	$info = ['info' => $loads->toArray()];

    Mail::send(['html'=>'email.screamerCheck'], $info, function($message) use ($info){

		$recipients = ['mikec@itransys.com', 'mattk@itransys.com', 'ronc@itransys.com', 'joem@itransys.com','mikeb@itransys.com', 'mattc@itransys.com'];

        $message->to($recipients)->subject("Current Screaming Loads")
			->from($recipients[0], $recipients[0])
			->replyTo($recipients[0], $recipients[0])
			->sender($recipients[0], $recipients[0]);

        });

})->describe('Get current screaming loads');
