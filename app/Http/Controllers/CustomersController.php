<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

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
			  'contact' => 'required',
			  'phone' => 'required',
			  'email' => 'required',
			  
        
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

   //GET A LIST OF THE CUSTOMERS ASSIGNED TO THE USER
	public function getAmbassadorStats() 
	{
    
		
		$getCustomers = Customer::where('customer_ambassador', \Auth::user()->email)->get();

		return view('findCustomer', compact('getCustomers'));

    }

    public function emailCustomerGeneral()
    {

    	$info = ["foo" => "bar", "bar" => "foo",];
        
        Mail::send(['html'=>'email.generalInfoEmail'], $info, function($message){
            
            
           	$message->to('mikec@itransys.com')

           	->subject('International Transport Systems follow up to Phone Call');
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The general info email has been sent to you.');


   	}

   	public function biWeeklyCustomerEmailList()
   	{
   		$posts = Customer::where('weekly_email', 'WEEKLY')->orderBy('email', 'asc')->get();

   		return view('biWeeklyCustomerEmailList', compact('posts', $posts));
   	}

}
