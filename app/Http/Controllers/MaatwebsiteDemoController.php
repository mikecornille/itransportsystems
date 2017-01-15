<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Input;
use App\Item;
use DB;
use Excel;
use App\User;
use App\Load;


class MaatwebsiteDemoController extends Controller
{

	public function getProfitReport($type, Request $request)
	{
		 $start_date = $request->input('start_date');
		 $end_date = $request->input('end_date');

		//$data = Item::get()->toArray();
		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'amount_due', 'carrier_name', 'carrier_rate')->whereBetween('billed_date', [$start_date, $end_date])->orderBy('billed_date', 'desc')->get();

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

	

	//$users = User::select('id', 'name', 'email', 'created_at')->get();
// Excel::create('users', function($excel) use($users) {
//     $excel->sheet('Sheet 1', function($sheet) use($users) {
//         $sheet->fromArray($users);
//     });
// })->export('xls');
	// public function importExcel()
	// {
	// 	if(Input::hasFile('import_file')){
	// 		$path = Input::file('import_file')->getRealPath();
	// 		$data = Excel::load($path, function($reader) {
	// 		})->get();
	// 		if(!empty($data) && $data->count()){
	// 			foreach ($data as $key => $value) {
	// 				$insert[] = ['title' => $value->title, 'description' => $value->description];
	// 			}
	// 			if(!empty($insert)){
	// 				DB::table('items')->insert($insert);
	// 				dd('Insert Record successfully.');
	// 			}
	// 		}
	// 	}
	// 	return back();
	// }
}