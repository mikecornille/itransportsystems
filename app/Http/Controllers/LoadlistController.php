<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loadlist;

class LoadlistController extends Controller
{
     public function store(Request $request)
	{

		
		
		 $this->validate($request, [

         	
			'customer' => 'required',
            'pick_city' => 'required',
            'pick_state' => 'required',
            'pick_date' => 'required',
            'pick_time' => 'required',
            'delivery_city' => 'required',
            'delivery_state' => 'required',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'commodity' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'miles' => 'required',
            'billing_money' => 'required',
            'offer_money' => 'required',
      
        
         ]);

        $newload = New Loadlist($request->all());
		
		
		$newload->created_by = strtoupper(\Auth::user()->email);
	
		

		$newload->save();

		return back()->with('status', 'New Load Posted!');
		
	}

	public function index()
	{

		$open_loads = Loadlist::all();
		return view('loadlist', compact('open_loads'));
	
	}

	public function editLoadlist($id)
	{
		$loadlist = Loadlist::find($id);

		return view('editLoadlist', compact('loadlist'));

	}

}
