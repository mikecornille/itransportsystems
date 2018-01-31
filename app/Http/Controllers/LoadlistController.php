<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;



use App\Loadlist;

use App\Carrier;

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
        $newload->special_instructions = $request->special_instructions . ' call or email operations@itransys.com';
		    $newload->company_contact = "Dispatch";
        $newload->contact_phone = "877-663-2200";
        $newload->countIncomingCalls = 0;
        $newload->countOutgoingCalls = 0;
        $newload->emailedOut = 0;
		    $newload->created_by = strtoupper(\Auth::user()->email);

        $a=array("AM","LT","MK","RB");
        $random_key=array_rand($a,1);
        $newload->handler = $a[$random_key];

		    $newload->save();


		DB::table('notes')->insert(
    ['notes' => $request->pick_city, 'time_name_stamp' => $request->delivery_city]
	);

		


		return back()->with('status', 'New Load Posted!');

		//crete a dat loadlist call the instance of it, store these values in it but by calling unique
		
	}


     public function storeFromQuote(Request $request)
  {

    
    
     $this->validate($request, [

            'pick_city' => 'required',
            'pick_state' => 'required',
            'delivery_city' => 'required',
            'delivery_state' => 'required',
            'miles' => 'required',
            'billing_money' => 'required',
      ]);

        $newload = New Loadlist($request->all());
        $newload->created_by = strtoupper(\Auth::user()->email);
        $newload->urgency = "Quote";
        $newload->trailer_type = "";
        $newload->pick_date = "";
        $newload->pick_time = "";
        $newload->delivery_date = "";
        $newload->delivery_time = "";
        $newload->special_instructions = "";
        $newload->length = "";
        $newload->width = "";
        $newload->height = "";
        $newload->weight = "";
        $newload->offer_money = "0";
        $newload->post_money = "0";
        $newload->company_contact = "Dispatch";
        $newload->contact_phone = "877-663-2200";
        $newload->countIncomingCalls = 0;
        $newload->countOutgoingCalls = 0;
        $newload->emailedOut = 0;

        $a=array("AM","LT","MK","RB");
        $random_key=array_rand($a,1);
        $newload->handler = $a[$random_key];
        
        $newload->save();

    return redirect('start_bidboard');
}


  public function startLoadList(Request $request)
  {

    

     $pick_city = $request->input('pick_city');
     $pick_state = $request->input('pick_state');
     $delivery_city = $request->input('delivery_city');
     $delivery_state = $request->input('delivery_state');
     $miles = $request->input('miles');

     // $matching_loads = Loadlist::where('pick_state', '=', $pick_state)
     // ->where('delivery_state', '=', $delivery_state)
     // ->orderBy('created_at', 'desc')->get();

     // $exact_loads = Loadlist::where('pick_city', '=', $pick_city)
     // ->orderBy('created_at', 'desc')->get();
     
    return view('bidboard', compact('matching_loads', 'exact_loads'))
     ->with('pick_city', $pick_city)
     ->with('pick_state', $pick_state)
     ->with('delivery_city', $delivery_city)
     ->with('delivery_state', $delivery_state)
     ->with('miles', $miles);

    //  return view('budget', compact('items', 'total'));

    //  return view('myStats')->with('posts', $posts)
    // ->with('rateCons', $rateCons)
    // ->with('invoices', $invoices)
    // ->with('unsigned', $unsigned)
    // ->with('rateConDailyTotals', $rateConDailyTotals)
    // ->with('invoiceDailyTotals', $invoiceDailyTotals)
    // ->with('currentDate', $currentDate);

  }

  public function  quoteHistory(Request $request) 
  {

    if($request->has('query.pick_city')) {
      $pickCity = $request->get('query')['pick_city'];
    } else {
      $pickCity = '';
    }

    if($request->has('query.pick_state')) {
      $pickState = $request->get('query')['pick_state'];
    } else {
      $pickState = '';
    }

    if($request->has('query.delivery_city')) {
      $deliveryCity = $request->get('query')['delivery_city'];
    } else {
      $deliveryCity = '';
    }
    
    if($request->has('query.delivery_state')) {
      $deliveryState = $request->get('query')['delivery_state'];
    } else {
      $deliveryState = '';
    }


    if($request->has('query.load_type')) {
      $loadType = $request->get('query')['load_type'];
    } else {
      $loadType = '';
    }

    if($request->has('query.commodity')) {
      $commodity = $request->get('query')['commodity'];
    } else {
      $commodity = '';
    }

    if($request->has('query.miles')) {
      $miles = $request->get('query')['miles'];
    } else {
      $miles = '';
    }

    if($request->has('query.length')) {
      $length = $request->get('query')['length'];
    } else {
      $length = '';
    }

    if($request->has('query.width')) {
      $width = $request->get('query')['width'];
    } else {
      $width = '';
    }

    if($request->has('query.height')) {
      $height = $request->get('query')['height'];
    } else {
      $height = '';
    }

    if($request->has('query.weight')) {
      $weight = $request->get('query')['weight'];
    } else {
      $weight = '';
    }

    if($request->has('query.customer')) {
      $customer = $request->get('query')['customer'];
    } else {
      $customer = '';
    }

    if($request->has('query.urgency')) {
      $urgency = $request->get('query')['urgency'];
    } else {
      $urgency = '';
    }

    if($request->has('query.billing_money')) {
      $billingMoney = $request->get('query')['billing_money'];
    } else {
      $billingMoney = '';
    }

    if($request->has('query.offer_money')) {
      $offerMoney = $request->get('query')['offer_money'];
    } else {
      $offerMoney = '';
    }

    if($request->has('query.created_at')) {
      $createdAt = $request->get('query')['created_at'];
    } else {
      $createdAt = '';
    }



    
        /*$pickState = $request->get('query')['pick_state'];
        dd($pickState);*/

        $data = Loadlist::where('pick_city', 'LIKE', '%'.$pickCity.'%')
        ->where('pick_state', 'LIKE', '%'.$pickState.'%')
        ->where('delivery_city', 'LIKE', '%'.$deliveryCity.'%')
        ->where('delivery_state', 'LIKE', '%'.$deliveryState.'%')
        ->where('load_type', 'LIKE', '%'.$loadType.'%')
        ->where('commodity', 'LIKE', '%'.$commodity.'%')

        ->where('miles', 'LIKE', '%'.$miles.'%')
        ->where('length', 'LIKE', '%'.$length.'%')
        ->where('width', 'LIKE', '%'.$width.'%')
        ->where('height', 'LIKE', '%'.$height.'%')
        ->where('weight', 'LIKE', '%'.$weight.'%')

        ->where('customer', 'LIKE', '%'.$customer.'%')
        ->where('urgency', 'LIKE', '%'.$urgency.'%')
        ->where('billing_money', 'LIKE', '%'.$billingMoney.'%')
        ->where('offer_money', 'LIKE', '%'.$offerMoney.'%')
        ->where('created_at', 'LIKE', '%'.$createdAt.'%')

        

        ->orderBy('created_at', 'desc')->take(5000)->get();

        return ['data' => $data];

      }

	public function index()
	{

    $currentDay = date('d');

    $open_loads = Loadlist::where('urgency', '=', 'Has Time')
    ->orWhere('urgency', '=', 'Hot')
    ->orWhere('urgency', '=', 'Screaming')
    ->orWhere('urgency', '=', 'Caller')
    ->orWhere('urgency', '=', 'Get Numbers')
    ->orWhere('urgency', '=', 'Fossilized')
    ->orWhere('urgency', '=', 'Stabber')
    ->orderBy('customer', 'desc')
    ->orderBy('pick_city', 'desc')->get();

		$personal_loads = Loadlist::where('created_by', '=', \Auth::user()->email)
    ->where('urgency', '!=', 'Quote')
    ->where('urgency', '!=', 'Booked')
    ->orderBy('urgency', 'desc')->get();

    $quote_loads = Loadlist::where('urgency', '=', 'Quote')
    ->whereDay('created_at', $currentDay)
		->orderBy('created_at', 'desc')->get();

    $manageloads_loads = Loadlist::where('user_id', '!=', NULL)
    ->whereDay('created_at', $currentDay)->get();

    date_default_timezone_set("America/Chicago");
    $currentDate = date('Y-m-d H:i:s');
    $currentDateUnix = strtotime($currentDate);
    $subTwoWeeks = $currentDateUnix - 907200;
    date_default_timezone_set("America/Chicago");
    $twoWeeksAgo = date('Y-m-d H:i:s', $subTwoWeeks);

    $personal_booked_loads = Loadlist::where('urgency', '=', 'Booked')->where('created_by', '=', \Auth::user()->email)->whereBetween('created_at', [$twoWeeksAgo, $currentDate])->orderBy('created_at', 'desc')->get();

		return view('loadlist', compact('open_loads', 'quote_loads', 'personal_loads', 'manageloads_loads', 'personal_booked_loads'));
	
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
    
		return redirect('loadlist')->with('status', 'Your updates have been successfully saved!');


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

      if ($request->has('created_by')){
        $loads->where('created_by', $request->created_by);
      }



    	$open_loads = $loads->orderBy('created_at', 'desc')->get();


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
   

   public function emailTruckOffer($id) {

    $info = Loadlist::find($id);
      $carrier = Carrier::where('state', $info->pick_state)->where('email', '!=', '')->get();
    
  
    $info = ['info' => $info, 'carrier' => $carrier];
        
        Mail::send(['html'=>'email.emailTruckOffer'], $info, function($message) use ($info){
            
            
            $message->to(\Auth::user()->email)
            ->subject('Live Freight Offering from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);
           
        });
      return back()->with('status', 'An email containing the subject, body, and all emails have been sent to you!');

  //  		$info = Loadlist::find($id);



  //  		$carrier = Carrier::where('state', $info->pick_state)->where('email', '!=', '')->get();
		
  //   $addresses = $carrier->transform(function($record) {
  //     return [
  //       'email' => $record->email,
  //       'name' => $record->name
  //     ];
  //   });
  

		// $info = ['info' => $info];
        
  //       Mail::send(['html'=>'email.emailTruckOffer'], $info, function($message) use ($info, $addresses){
            
  //          	$message = $message->to(\Auth::user()->email);
  //               foreach($addresses as $address) {
  //                 $message = $message->bcc($address['email'], $address['name']);

  //               }

  //          	$message->subject('Live Freight Offering from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
  //           $message->from(\Auth::user()->email, \Auth::user()->name);

           

  //       });

  //   	return back()->with('status', 'An email containing the subject, body, and all emails have been sent to you!');

   }

   public function countIncomingCalls($id){


      
      $load = Loadlist::find($id);

      $load->countIncomingCalls = $load->countIncomingCalls + 1;

      $load->save();

      return back()->with('status', '+1 for incoming calls');
      
   
   }

   public function countOutgoingCalls($id){

      $load = Loadlist::find($id);

      $load->countOutgoingCalls = $load->countOutgoingCalls + 1;

      $load->save();

      return back()->with('status', '+1 for outbound calls');

   
   }

     public function emailedOut($id){

      $load = Loadlist::find($id);

      $load->emailedOut = $load->emailedOut + 1;

      $load->save();

      return back()->with('status', '+1 You added a state');

   
   }
   



}
