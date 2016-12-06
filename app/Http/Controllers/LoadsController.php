<?php

namespace App\Http\Controllers;

use App\Load;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;

use PDF;

use Illuminate\Support\Facades\Mail;


class LoadsController extends Controller
{
	use helpers\Mailer;
    
	//Load the datatable
    public function index()
	{
		
		$data = Load::all();
		return(['data' => $data]);
		
	}

	//Store a new record in database
	 public function store(Request $request)
	{
		
		 $this->validate($request, [

		 	'customer_name' => 'required',			  
         	  'customer_address' => 'required',
			  'customer_city' => 'required',
			  'customer_state' => 'required',
			  'customer_zip' => 'required',
			  'customer_contact' => 'required',
			  'customer_email' => 'required',
			  'customer_phone' => 'required',
			  'pick_company' => 'required',
			  'pick_address' => 'required',
			  'pick_city' => 'required',
			  'pick_state' => 'required',
			  'pick_zip' => 'required',
			  'pick_phone' => 'required',
			  'delivery_company' => 'required',
			  'delivery_address' => 'required',
			  'delivery_city' => 'required',
			  'delivery_state' => 'required',
			  'delivery_zip' => 'required',
			  'delivery_phone' => 'required',
			  'amount_due' => 'required',
			  'commodity' => 'required',
        
         ]);

        $newload = New Load($request->all());
		
		$newload->its_group = "ITS";
		$newload->pick_status = "Open";
		$newload->delivery_status = "Open";
		$newload->created_by = strtoupper(\Auth::user()->email);
		$newload->creation_date = date('m/d/Y');
		

		$newload->save();

		return back()->with('status', 'New Load Created!');
		
	}

	
	//Go to edit form with selected record
	public function edit(Request $request)
	{

		$info = Load::find($request->input('id'));
		return view('edit', compact('info'));	
		
	}

	//Update record
	public function update(Request $request, Load $load)
	{

            $this->validate($request, [

		 	  'customer_name' => 'required',			  
         	  'customer_address' => 'required',
			  'customer_city' => 'required',
			  'customer_state' => 'required',
			  'customer_zip' => 'required',
			  'customer_contact' => 'required',
			  'customer_email' => 'required',
			  'customer_phone' => 'required',
			  'pick_company' => 'required',
			  'pick_address' => 'required',
			  'pick_city' => 'required',
			  'pick_state' => 'required',
			  'pick_zip' => 'required',
			  'pick_phone' => 'required',
			  'delivery_company' => 'required',
			  'delivery_address' => 'required',
			  'delivery_city' => 'required',
			  'delivery_state' => 'required',
			  'delivery_zip' => 'required',
			  'delivery_phone' => 'required',
			  'amount_due' => 'required',
			  'commodity' => 'required',
        
         ]);

		$load->update($request->all());
		return back()->with('status', 'Your updates have been successfully saved!');

	}

	//Send internal email to fellow employee

	public function internalEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['internal_email'])

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your internal message has been sent.');
    }

	//Request status email from a carrier

	public function getStatusEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.getStatus'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('Looking for a status update on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your status request has been sent.');
    }

	//Request a POD from carrier email

	public function podRequestEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.podRequest'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('Please Send Invoice with Signed Bill of Lading on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your POD request has been sent.');
    }

	
    //Update customer email
	
	public function updateCustomerEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.updateCustomer'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['customer_email'])

           	->subject('Status Update on ITS PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your customer has been updated.');
    }

     //Carrier email
	
	public function emailCarrier($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.emailCarrier'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('Message from ITS regarding PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your carrier has been emailed.');
    }

  //   public function searchPro(Request $request)
  //   {
    	
  //   	$info = Load::find($request->input('id'));
		// return view('edit', compact('info'));
  //   }

	
}

