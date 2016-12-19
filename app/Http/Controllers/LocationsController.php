<?php

namespace App\Http\Controllers;

use App\Location;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    //STORES A NEW CUSTOMER IN THE DATABASE
	 public function store(Request $request)
	{
		
		 // $this->validate($request, [

		 // 	'name' => 'required',			  
   //       	  'address' => 'required',
			//   'city' => 'required',
			//   'state' => 'required',
			//   'zip' => 'required',
			//   'name_1' => 'required',
			//   'phone_1' => 'required',
			//   'email_1' => 'required',
			  
        
   //       ]);

        $newLocation = New Location($request->all());
		
		$newLocation->save();

		return back()->with('status', 'New Location Created!');
		
	}

	//UPDATES RECORD IN DATABASE THORUGH AJAX CALL
	public function updateLocation(Request $request) 
	{
    
		//IF I WANT TO UPDATE SPECIFIC COLUMNS
		// Customer::where('id', $request->id)->update([
        // 'name' => $request->name,
        // 'country' => $request->country,
	    // ]);

    	Location::where('id', $request->id)->update($request->all());
   }
}
