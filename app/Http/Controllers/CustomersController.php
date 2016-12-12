<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomersController extends Controller
{
    //Store a new record in database
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
}
