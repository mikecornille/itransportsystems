<?php

namespace App\Http\Controllers;

use App\Carrier;

use Illuminate\Http\Request;

use App\Http\Requests;

class CarriersController extends Controller
{
     //STORES A NEW CARRIER IN THE DATABASE
	 public function store(Request $request)
	{
		
		 $this->validate($request, [

		 	'company' => 'required',			  
         	  'contact' => 'required',
			  'address' => 'required',
			  'city' => 'required',
			  'state' => 'required',
			  'zip' => 'required',
			  'mc_number' => 'required',
			  'dot_number' => 'required',
			  'phone' => 'required',
			  'email' => 'required',
			  'driver_name' => 'required',
			  'driver_phone' => 'required',
			  'cargo_exp' => 'required',
			  'cargo_amount' => 'required',
			  
			  
        
         ]);

        $newCarrier = New Carrier($request->all());
		
		$newCarrier->save();

		return back()->with('status', 'New Carrier Created!');
		
	}

	//UPDATES RECORD IN DATABASE THORUGH AJAX CALL
	public function updateCarrier(Request $request) 
	{
    
		// IF I WANT TO UPDATE SPECIFIC COLUMNS
		// Customer::where('id', $request->id)->update([
  //       'name' => $request->name,
  //       'country' => $request->country,
	 //    ]);

    	Carrier::where('id', $request->id)->update($request->all());
   }
}
