<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Loadlist;
use DB;

class LoadlistController extends Controller
{
     public function store(Request $request)
	{

		date_default_timezone_set("America/Chicago");
		
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
            'load_type' => 'required',
            'trailer_type' => 'required',
            'urgency' => 'required',
      
        
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

		$open_loads = Loadlist::where('urgency', '=', 'Has Time')
		->orWhere('urgency', '=', 'Hot')
		->orWhere('urgency', '=', 'Screaming')
		->orWhere('urgency', '=', 'Caller')
		->orWhere('urgency', '=', 'Get Numbers')
		->orWhere('urgency', '=', 'Hold')
		->orderBy('pick_city', 'desc')->get();

		$quote_loads = Loadlist::where('urgency', '=', 'Quote')
		->orderBy('created_at', 'desc')->get();

		$personal_loads = Loadlist::where('created_by', '=', \Auth::user()->email)
		->orderBy('urgency', 'desc')->get();

	
		return view('loadlist', compact('open_loads', 'quote_loads', 'personal_loads'));
	
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
    
    	date_default_timezone_set("America/Chicago");

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

		date_default_timezone_set("America/Chicago");
    
    	$load = Loadlist::find($id);
		$newLoad = $load->replicate();
		$newLoad->save();

		return back()->with('status', 'Your load was duplicated!');


   }

   public function searchLoadlist(Request $request) 
	{


    
    	$loads = (new Loadlist)->newQuery();

    

    	if ($request->has('customer')){
    		$loads->where('customer', 'like', '%' . $request->customer . '%');
    	}

    	if ($request->has('commodity')){
    		$loads->where('commodity', 'like', '%' . $request->commodity . '%');
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

    	if ($request->has('urgency')){
    		$loads->where('urgency', $request->urgency);
    	}

    	if ($request->has('pick_date')){
    		$loads->where('pick_date', $request->pick_date);
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

   public function emailLoad($id){

   		$info = Loadlist::find($id);
		
		$info = ['info' => $info];
        
        Mail::send(['html'=>'email.loadListEmail'], $info, function($message) use ($info){
            
            
           	$message->to(\Auth::user()->email)

           	->subject('Quote for ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

           

        });

    	return back()->with('status', 'Your Load List posting has been sent to you!');

   }
   

   



}
