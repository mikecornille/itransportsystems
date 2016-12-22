<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomersController extends Controller
{
    //STORES A NEW CUSTOMER IN THE DATABASE
	 public function store(Request $request)
	{
		
		 $this->validate($request, [

		 	'name' => 'required',			  
         	  'address' => 'required',
			  'city' => 'required',
			  'state' => 'required',
			  'zip' => 'required',
			  'name_1' => 'required',
			  'phone_1' => 'required',
			  'email_1' => 'required',
			  
        
         ]);


        $newCustomer = New Customer($request->all());
		
		$newCustomer->save();

		return back()->with('status', 'New Customer Created!');
		
	}

	//UPDATES RECORD IN DATABASE THORUGH AJAX CALL
	public function updateCustomer(Request $request) 
	{
    
		//IF I WANT TO UPDATE SPECIFIC COLUMNS
		// Customer::where('id', $request->id)->update([
        // 'name' => $request->name,
        // 'country' => $request->country,
	    // ]);

    	Customer::where('id', $request->id)->update($request->all());


   }
}
