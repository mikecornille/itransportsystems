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
		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'amount_due', 'carrier_name', 'carrier_rate')->whereBetween('billed_date', [$start_date, $end_date])->orderBy('customer_name', 'desc')->get();

		return \Excel::create('Profit_Report_' . $start_date . '_to_' . $end_date, function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
	        });
		})->download($type);
	}

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

    $truckstop_post = Loadlist::select('pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'trailer_type', 'pick_date', 'load_type', 'length', 'width', 'height', 'weight', 'offer_money', 'special_instructions', 'company_contact', 'contact_phone')->where('urgency', '!=', 'Booked')->where('urgency', '!=', 'Quote')->where('urgency', '!=', 'Hold')->get();

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

        

       	//$recipients = ['joem@itransys.com', 'mikeb@itransys.com', 'robert@itransys.com', 'loads@truckstop.com', 'mikec@itransys.com', 'mattc@itransys.com'];

        $message->to('mikec@itransys.com')->subject('Truckstop Posted');

        $message->attach($savePath);

        });


    return back()->with('status', 'You Posted Truckstop!');

}

public function datPost(\App\Transformers\DatTransformer $transformer) 
{
	    $savePath = storage_path('csv/' . 'dat.csv');

    $truckstop_post = Loadlist::select('pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'trailer_type', 'pick_date', 'load_type', 'length', 'width', 'height', 'weight', 'offer_money', 'special_instructions', 'company_contact', 'contact_phone')->where('urgency', '!=', 'Booked')->where('urgency', '!=', 'Quote')->where('urgency', '!=', 'Hold')->get();

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


}




