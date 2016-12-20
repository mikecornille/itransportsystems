<?php

namespace App\Http\Controllers;

use App\Equipment;

use Illuminate\Http\Request;

use App\Http\Requests;

class EquipmentController extends Controller
{
    //STORES A NEW PIECE OF EQUIPMENT IN THE DATABASE
	 public function store(Request $request)
	{
		
		 // $this->validate($request, [

		 // 	'make' => 'required',			  
   //       	  'model' => 'required',
			//   'length' => 'required',
			//   'width' => 'required',
			//   'height' => 'required',
			//   'weight' => 'required',
			//   'commodity' => 'required',
			//   'loading_instructions' => 'required',
			  
			// ]);

        $newEquipment = New Equipment($request->all());
		
		$newEquipment->save();

		return back()->with('status', 'New Equipment Created!');
		
	}
}
