<?php

namespace App\Http\Controllers;

use App\Load;

use App\Text;

use App\Loadlist;

use App\Carrier;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;

use PDF;

use Carbon\Carbon; 

use Illuminate\Support\Facades\Mail;


use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;


class LoadsController extends Controller
{
	//use helpers\Mailer;
    
	//Load the datatable
    public function index()
	{
		
		$data = Load::orderBy('id', 'desc')->take(2000)->get();
		return(['data' => $data]);
		
	}
	

	public function deepLoads()
	{
		
		
		$data = Load::orderBy('id', 'desc')->skip(2000)->take(3000)->get();
		return(['data' => $data]);
		
	}

	public function indextwo()
	{
		
		$data = Load::where('pick_status', 'Booked')->get();
		return(['data' => $data]);
		
	}

	public function tobedatatwo()
	{
		
		$data = Load::where('delivery_status', 'En Route')->get();
		return(['data' => $data]);
		
	}

	public function personal_status_table()
	{
		
		$data = Load::where('rate_con_creator', \Auth::user()->email)->where('delivery_status', '<>', 'Delivered')->where('pick_status', '=', 'Booked')->get();


		return(['data' => $data]);


		
	}

	

	public function personal_status_loaded_table()
	{
		
		$data = Load::where('rate_con_creator', \Auth::user()->email)->where('delivery_status', '<>', 'Delivered')->where('pick_status', '=', 'Loaded')->get();


		return(['data' => $data]);


		
	}
	

	

	//Store a new record in database
	 public function store(Request $request)
	{

		date_default_timezone_set("America/Chicago");
		
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

	public function duplicateInvoice($id)
	{

		date_default_timezone_set("America/Chicago");
    
    	$load = Load::find($id);
    	$load->creation_date = Carbon::now()->format('m/d/Y');
		$newLoad = $load->replicate();
		
		$newLoad->save();

		return back()->with('status', 'Your load was duplicated!');


	}

	

	
	//Go to edit form with selected record
	public function edit(Request $request)
	{

		JavaScript::put([
		        'user' => \Auth::user(),
    ]);

		$info = Load::find($request->input('id'));

		$text_message = Text::where('pro', $request->input('id'))->orderBy('sentAt', 'asc')->get();
		
		return view('edit', compact('info', 'text_message'));	
		
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
			  'carrier_id' => 'required',
        
         ]);

            	//need to make sure rate_con_creator doesnt already exist

            if ($request->pick_status === 'Booked' && empty($load->rate_con_creator))
            {
            	$load->rate_con_creator = strtoupper(\Auth::user()->email);
            }
           elseif ($request->pick_status === 'Open')
           {
           		$load->rate_con_creator = NULL;

           }

           
       		if (!empty($request->vendor_invoice_number) && !empty($request->vendor_invoice_date) && !empty($request->approved_carrier_invoice) && !empty($request->payment_method))
       		{
       			//Verify if this requiers an ACH payment or Check
       			if ($request->payment_method == "ACH")
       			{
       				//Get the carrier record that pertains to the carrier id of the load
       				$carrierPaymentInfo = Carrier::findOrFail($load->carrier_id);
       				//Insert the ACH payment info into the loads table
       				$load->routing_number = $carrierPaymentInfo->routing_number;
       				$load->account_number = $carrierPaymentInfo->account_number;
       				$load->account_type = $carrierPaymentInfo->account_type;
       				$load->account_name = $carrierPaymentInfo->account_name;

       			}

       			elseif ($request->payment_method == "Checking")
       			{
       				//Get the carrier record that pertains to the carrier id of the load
       				$carrierPaymentInfo = Carrier::findOrFail($load->carrier_id);
       				//Insert the remit payment info into the loads table
       				$load->remit_name = $carrierPaymentInfo->remit_name;
       				$load->remit_address = $carrierPaymentInfo->remit_address;
       				$load->remit_city = $carrierPaymentInfo->remit_city;
       				$load->remit_state = $carrierPaymentInfo->remit_state;
       				$load->remit_zip = $carrierPaymentInfo->remit_zip;

       			}


       			
       		}
           
        
        
		$load->update($request->all());


		return back()->with('status', 'Your updates have been successfully saved!');




	}

	//Send internal email to fellow employee

	public function internalEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['internal_email_address'])

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your internal message has been sent.');
    }

    //Email the load group the internal message 

    public function emailLoadGroup($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            $recipients = [$info['info']['created_by'], $info['info']['rate_con_creator']];

            
           	$message->to($recipients)

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your group internal message has been sent.');
    }

    //Sends an email to Joe and Brush 

    public function emailBrushJoe($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.internalEmail'], $info, function($message) use ($info){
            
            $recipients = ['joem@itransys.com', 'mikeb@itransys.com', $info['info']['rate_con_creator']];

            
           	$message->to($recipients)

           	->subject('Internal Message on PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your Joe, Brush, and Rate Con Creator internal message has been sent.');
    }

	//Request status email from a carrier 

	public function getStatusEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.getStatus'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

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
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your POD request has been sent.');
    }

    

    //UR Safety Info No Touch

	public function ur_safety($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.ur_safety'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('United Rentals Safety Info for ' . $info['info']['carrier_name']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The No Touch United Rentals Safety Info Has Been Sent!');
    }

//UR Safety Info Hands Held

	public function ur_safety_help($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.ur_safety_help'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['carrier_email'])

           	->subject('United Rentals Safety Info for ' . $info['info']['carrier_name']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The Hands Held United Rentals Safety Info Has Been Sent!');
    }
	
    //Update customer email
	
	public function updateCustomerEmail($id)
	{
        $info = Load::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.updateCustomer'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['customer_email'])

           	->subject('Status Update on ITS PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

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

           	->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'Your carrier has been emailed.');
    }

  //   public function searchPro(Request $request)
  //   {
    	
  //   	$info = Load::find($request->input('id'));
		// return view('edit', compact('info'));
		// "/edit/url?id='+data+'"
		// return view('/edit/url?id=' . $request->input('id'))
  //   }

    public function emailShipper($id)
    {
    	$info = Load::find($id);
		
		$info = ['info' => $info];

		Mail::send(['html'=>'email.emailShipper'], $info, function($message) use ($info){
            
            
           	$message->to(\Auth::user()->email)->cc('mikec@itransys.com')

           	->subject('Carrier Info on Shipment from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state'] . ' BOL # ' . $info['info']['bol_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'You have been emailed, please edit and forward to shipper/consignee.');

    }

    public function findTrucksFromLoads(Request $request = NULL)
	{

		$pick_state = $request->input('loads_pick_state');
		$delivery_state = $request->input('loads_delivery_state');
		$trailer_type = $request->input('loads_trailer_type');

		

		$trailerResultsFromLoads = Load::where('pick_state', $pick_state)->where('delivery_state', $delivery_state)->where('trailer_for_search', $trailer_type)->get();


		

		return view('findTrucksFromLoads', compact('trailerResultsFromLoads'));


	}

	public function displayCarrierLoadsPage()
	{
		$trailerResultsFromLoads = NULL;
		
		return view('findTrucksFromLoads')->with('trailerResultsFromLoads', $trailerResultsFromLoads);
		

	}
	
}

