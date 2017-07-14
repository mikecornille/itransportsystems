<?php

use Illuminate\Foundation\Inspiring;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Item;
use App\User;
use App\Load;
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
