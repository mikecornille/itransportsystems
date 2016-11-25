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

		//Build the subject and content
		$subject = "Your Internal Email " . $info->customer_name;
 		$content = "Your Internal Email " . $info->customer_name;

 		$this->sendEmail($subject,$content);

 		return back()->with('status', 'Your internal email has been sent.');

	}

	//Request status email from a carrier

	public function getStatusEmail($id)
	{
		$info = Load::find($id);

		//Build the subject and content
		$subject = "Your Status Request " . $info->customer_name;
 		$content = "Your Status Request " . $info->customer_name;

 		$this->sendEmail($subject,$content);

 		return back()->with('status', 'Your status update request has been sent.');

	}

	//Request a POD from a carrier

	public function podRequestEmail($id)
	{
		$info = Load::find($id);

		//Build the subject and content
		$subject = "Your POD Request " . $info->customer_name;
 		$content = "Your POD Request " . $info->customer_name;

 		$this->sendEmail($subject,$content);

 		return back()->with('status', 'Your POD request has been sent.');

	}

	//Update the customer 

	public function updateCustomerEmail($id)
	{
		$info = Load::find($id);

		//Build the subject and content
		$subject = "Your Update Customer " . $info->customer_name;
 		$content = "Your Update Customer " . $info->customer_name;

 		$this->sendEmail($subject,$content);

 		return back()->with('status', 'Your customer has been updated.');

	}

	 public function youtubetest($id)
    {
        $info = Load::find($id);

        // Ship order...

        Mail::to('mikecornille@gmail.com')->send(new MyMail($info));
    }

	
}

