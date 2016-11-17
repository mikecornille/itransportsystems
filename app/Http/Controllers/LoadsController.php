<?php

namespace App\Http\Controllers;

use App\Load;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;




class LoadsController extends Controller
{
    public function index()
	{
		
		//$data = Quote::where('user_id', \Auth::user()->id)->get();
		$data = Load::all();
		return(['data' => $data]);
		
	}

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

	public function edit(Request $request)
	{

		$info = Load::find($request->input('id'));
		return view('edit', compact('info'));	
		
	}

	
}
