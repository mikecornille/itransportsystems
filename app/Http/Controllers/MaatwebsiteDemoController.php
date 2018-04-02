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
use App\Loadlist;


class MaatwebsiteDemoController extends Controller
{

	public function getProfitReport($type, Request $request)
	{
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');


		//$data = Item::get()->toArray();
		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'amount_due', 'carrier_name', 'carrier_rate')
		->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') > STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		->whereRaw("STR_TO_DATE(`billed_date`, '%m/%d/%Y') < STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
		->get();

		//->whereBetween('billed_date', [$start, $end])->orderBy('id', 'asc')->get();


		return \Excel::create('Profit_Report_' . $start_date . '_to_' . $end_date, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

	

	public function achCSV($type, Request $request)
	{
	
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');
		 
		 $carrier_invoices = Load::select('routing_number', 'account_number', 'amount_due', 'account_type', 'account_name', 'id')
		 ->where('payment_method', "ACH")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') > STR_TO_DATE('{$start_date}', '%m/%d/%Y')")
		 ->whereRaw("STR_TO_DATE(`vendor_invoice_date`, '%m/%d/%Y') < STR_TO_DATE('{$end_date}', '%m/%d/%Y')")
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

	public function exportCarrierBills($type, Request $request)
	{
		 //Customer Invoice Import
		 $import_date = $request->input('import_date');
		 
		 
		
		$carrier_bills = Load::select('id', 'carrier_name', 'vendor_invoice_date', 'vendor_invoice_number', 'carrier_rate', 'quick_status_notes', 'remit_name', 'remit_address', 'remit_city', 'remit_state', 'remit_zip')->where('approved_carrier_invoice', $import_date)->orderBy('id', 'desc')->get();

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


}




