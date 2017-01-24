<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loadlist;
use DB;

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
		$newload->company_contact = "Dispatch";
        $newload->contact_phone = "877-663-2200";
		$newload->created_by = strtoupper(\Auth::user()->email);
		$newload->save();


		DB::table('notes')->insert(
    ['notes' => $request->pick_city, 'time_name_stamp' => $request->delivery_city]
	);

		


		return back()->with('status', 'New Load Posted!');

		//create a dat loadlist call the instance of it, store these values in it but by calling unique
		
	}

	public function index()
	{

		$open_loads = Loadlist::all();

		

		return view('loadlist', compact('open_loads'));
	
	}

	public function searchLoadlistIndex()
	{

		$open_loads = NULL;
		return view('searchLoadlist', compact('open_loads'));
	
	}

	

	public function editLoadlist($id)
	{
		$loadlist = Loadlist::find($id);

		return view('editLoadlist', compact('loadlist'));

	}

	public function updateLoadlist(Request $request, Loadlist $loadlist) 
	{
    
		$loadlist->update($request->all());
		return back()->with('status', 'Your updates have been successfully saved!');


   }

   public function destroy($id) 
	{

    
    	$load = Loadlist::find($id);

		$load->delete();

		return back()->with('status', 'Your deletion was successful.');


   }

   public function duplicate($id) 
	{

    
    	$load = Loadlist::find($id);
		$newLoad = $load->replicate();
		$newLoad->save();

		return back()->with('status', 'Your load was duplicated!');


   }

   public function searchLoadlist(Request $request) 
	{


    
    	$loads = (new Loadlist)->newQuery();

    

    	if ($request->has('customer')){
    		$loads->where('customer', $request->customer);
    	}

    	if ($request->has('commodity')){
    		$loads->where('commodity', $request->commodity);
    	}

    	if ($request->has('pick_city')){
    		$loads->where('pick_city', $request->pick_city);
    	}

    	if ($request->has('pick_state')){
    		$loads->where('pick_state', $request->pick_state);
    	}

    	if ($request->has('delivery_city')){
    		$loads->where('delivery_city', $request->delivery_city);
    	}

    	if ($request->has('delivery_state')){
    		$loads->where('delivery_state', $request->delivery_state);
    	}



    	$open_loads = $loads->get();


    	return view('searchLoadlist', compact('open_loads'));


   }

   public function newDateLoadlist($id)
   {

   		$load = Loadlist::find($id);
   		
   		$load->pick_date = date('m/d/Y', strtotime($load->pick_date . ' +1 day'));

   		$load->pick_time = "0700";

   		$load->save();
   		
   		return back()->with('status', 'Your load was posted for tomorrow and the pick up time was set for 7:00am!');

   }
   

   



}
