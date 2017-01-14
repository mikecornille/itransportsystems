<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Item;
use DB;
use Excel;
use App\User;
use App\Load;


class MaatwebsiteDemoController extends Controller
{
	// public function importExport()
	// {
	// 	return view('importExport');
	// }
	public function downloadExcel($type)
	{
		$month = '01'; 
		//$data = Item::get()->toArray();
		$loads = Load::select('billed_date', 'approved_carrier_invoice', 'its_group', 'id', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'customer_name', 'amount_due', 'carrier_name', 'carrier_rate')->whereBetween('billed_date', ['01/01/2017', '01/20/2017'])->orderBy('billed_date', 'desc')->get();

		return \Excel::create('itsolutionstuff_example', function($excel) use ($loads) {
			$excel->sheet('mySheet', function($sheet) use ($loads)
	        {
				$sheet->fromArray($loads);
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