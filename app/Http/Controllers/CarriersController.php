<?php

namespace App\Http\Controllers;

use App\Carrier;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

use PDF;

class CarriersController extends Controller
{
	public function fast_carrier_setup(Request $request){

		$this->validate($request, [

			'state' => 'required',
			  'email' => 'required|email',
			  
			  
			  

			  ]);

		$newCarrier = New Carrier($request->all());
		$newCarrier->save();

		return back()->with('status', 'New Carrier Created!');
	}
     //STORES A NEW CARRIER IN THE DATABASE
	
	public function store(Request $request)
	{

		
		$this->validate($request, [

			'company' => 'required',			  
         	  'contact' => 'required',
			  'address' => 'required',
			  'city' => 'required',
			  'state' => 'required',
			  'zip' => 'required',
			  'mc_number' => 'required',
			  'dot_number' => 'required',
			  'phone' => 'required',
			  'email' => 'required',
			  'driver_name' => 'required',
			  'driver_phone' => 'required',
			  'cargo_exp' => 'required',
			  'cargo_amount' => 'required',
			  
			  

			  ]);


		$requestFields = [];
		foreach($request->all() as $key => $value) {
			if ($value == 'on') {
				$requestFields[$key] = 1;
			} else {
				$requestFields[$key] = $value;
			}
		}

		$newCarrier = New Carrier($requestFields);
		$newCarrier->save();

		return back()->with('status', 'New Carrier Created!');
		
	}

	//UPDATES RECORD IN DATABASE THORUGH AJAX CALL
	public function updateCarrier(Request $request) 
	{
		$requestFieldsFormatted = [];
		foreach($request->except('id') as $key => $value) {
			if ($value == 'true') {
				$requestFieldsFormatted[$key] = 1;
			}elseif ($value == 'false') {
				$requestFieldsFormatted[$key] = 0;
			} else {
				$requestFieldsFormatted[$key] = $value;
			}
		}
		$requestFields = array_merge(array_fill_keys(\App\Carrier::getTrailers(), 0),$requestFieldsFormatted);
		// IF I WANT TO UPDATE SPECIFIC COLUMNS
		// Customer::where('id', $request->id)->update([
  //       'name' => $request->name,
  //       'country' => $request->country,
	 //    ]);

		Carrier::where('id', $request->id)->update($requestFields);
	}

	
	public function getInsurance(Request $request)
	{

		// $name = $request->name; 
		// $email = $request->email;
		// $company = $request->company;
		// $mc_number = $request->mc_number;
		// $cargo_exp = $request->cargo_exp;

		$info = ['info' => $request];

		Mail::send(['html'=>'email.getInsurance'], $info, function($message) use ($info){
            
            
           	$message->to($info['info']['email'])

           	->subject('Please Email Your Updated Certificate of Cargo Insurance for MC # ' . $info['info']['mc_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });


	}

	

	public function getPacket(Request $request)
	{

		$info = ['info' => $request];

		Mail::send(['html'=>'email.getPacket'], $info, function($message) use ($info){
            
           
			$pathToFile = 'Broker_Carrier_Contract.pdf';
            

             $message->attach($pathToFile);

           	$message->to($info['info']['email'])

           	->subject('Set Up Packet for MC # ' . $info['info']['mc_number'] . ' from International Transport Systems, Inc.');
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name);

        });


	}

	public function sendCarrierInfo(Request $request)
	{

		$info = ['info' => $request];

		Mail::send(['html'=>'email.colleague_carrier_info'], $info, function($message) use ($info){
            
           

           	$message->to($info['info']['colleague_email'])

           	->from(\Auth::user()->email, \Auth::user()->name)

           	->replyTo(\Auth::user()->email, \Auth::user()->name)

           	->sender(\Auth::user()->email, \Auth::user()->name)

           	->subject('Check out this message from Carrier Data MC # ' . $info['info']['mc_number']);
          
            // $message->from(\Auth::user()->email, \Auth::user()->name);

            // $message->replyTo(\Auth::user()->email, \Auth::user()->name);

        });


	}

	public function findTrucksByStateAndType(Request $request = NULL)
	{

		$state = $request->input('state');
		$trailer_type = $request->input('trailer_type');

		$trailerResults = Carrier::where('state', $state)->where($trailer_type, 1)->get();



		return view('findTrucks', compact('trailerResults'));


	}

	public function displayPage()
	{
		$trailerResults = NULL;
		
		return view('findTrucks')->with('trailerResults', $trailerResults);
		

	}
	
	
}


// public function getStatusEmail($id)
// 	{
//         $info = Load::find($id);
		
// 		$info = ['info' => $info];
        
//         Mail::send(['html'=>'email.getStatus'], $info, function($message) use ($info){
            
            
//            	$message->to($info['info']['carrier_email'])

//            	->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
//             $message->from(\Auth::user()->email, \Auth::user()->name);

//         });

//     	return back()->with('status', 'Your status request has been sent.');
//     }