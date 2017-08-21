<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Carrier;
use App\User;
use Illuminate\Support\Facades\Mail;
use PDF;

class HaulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = "none";
        return view('hauler', compact($employees, 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        date_default_timezone_set("America/Chicago");
        
        $this->validate($request, [
              'company' => 'required',
              'contact' => 'required',
              'mc_number' => 'required',
              'dot_number' => 'required',
              'address' => 'required',
              'city' => 'required',
              'state' => 'required',
              'zip' => 'required',
              'phone' => 'required',
              'email' => 'required|email',
              'driver_name' => 'required',
              'driver_phone' => 'required',
              'remit_name' => 'required',
              'remit_address' => 'required',
              'remit_city' => 'required',
              'remit_state' => 'required',
              'remit_zip' => 'required',
              'trailer_type_1' => 'required',
              'active' => 'required',
              'google_carrier' => 'required',
              'oos_driver_national' => 'required',
              'oos_driver_company' => 'required',
              'oos_vehicle_national' => 'required',
              'oos_vehicle_company' => 'required',
              'allowed_to_operate' => 'required',
              'operation_type' => 'required',
              'crashes' => 'required',
              'fatal_crashes' => 'required',
              'number_of_drivers' => 'required',
              'number_of_power' => 'required',
              'insurance_company_email' => 'required|email',
              'fmcsa_time' => 'required'

        ]);

        $store = New Carrier($request->all());

        $store->save();

        $id = $store->id;

        //After I save a new carrier I send user directly to find page with ID # passed through
        return view('findHauler', compact($id, 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editForm(Request $request)
    {
            //This input comes from a form to find a carrier ID #
            $hauler = $request->input('findcar_id');

            //Find the carrier
            $gethauler = Carrier::findOrFail($hauler);

            //Get all the employees to use for a select dropdown
            $employees = User::all()->pluck('email','email');

            //Init the error message variable
            $error_message = "";

            return view('hauler.edit', compact('gethauler', $gethauler, 'employees', $employees, 'error_message', $error_message));
    }

    public function goBackWithData($id, $flash_message, $error_message)
    {
            //Find the carrier needed to display
            $gethauler = Carrier::findOrFail($id);

            //Get all the employees to use for a select dropdown
            $employees = User::all()->pluck('email','email');

            return view('hauler.edit', compact('gethauler', $gethauler, 'employees', $employees, 'flash_message', $flash_message, 'error_message', $error_message));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Set the date to central time
        date_default_timezone_set("America/Chicago");

        //Init the error message variable
        $error_message = "";

        //Fields to check if empty
        $fields = array(
              $request->company,
              $request->contact,
              $request->mc_number,
              $request->dot_number,
              $request->address,
              $request->city,
              $request->state,
              $request->zip,
              $request->phone,
              $request->email,
              $request->driver_name,
              $request->driver_phone,
              $request->cargo_exp,
              $request->cargo_amount,
              $request->bc_contract,
              $request->remit_name,
              $request->remit_address,
              $request->remit_city,
              $request->remit_state,
              $request->remit_zip,
              $request->permanent_notes,
              $request->trailer_type_1,
              $request->active,
              $request->google_carrier,
              $request->oos_driver_national,
              $request->oos_driver_company,
              $request->oos_vehicle_national,
              $request->oos_vehicle_company,
              $request->allowed_to_operate,
              $request->operation_type,
              $request->crashes,
              $request->fatal_crashes,
              $request->number_of_drivers,
              $request->number_of_power
            );
        
            //Loop through the fields to see if errors are true
            for ($x = 0; $x <= count($fields); $x++){
                foreach($fields as $field){
                    if(empty($field)){
                        $error_message = "There is a missing field in the form!  (this error will display if a field is empty or 0 value) ";
                    }
                }
            }
       
        //Find the record in the database with matching ID #
        $post = Carrier::findOrFail($id);

        //Get current record ID # to pass through to the view to re-display all info to user
        $current_record = $post->id;

        //Message to send user upon successful update
        $flash_message = "The record has been updated!";

        //Save data to database
        $post->update($request->all());

        //Send to method inside controller to redisplay data and flash success and errors messages
        return $this->goBackWithData($current_record, $flash_message, $error_message);
            
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function certInsuranceCompany($id)
    {
        $info = Carrier::find($id);

        $current_record = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.certInsuranceCompany'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['insurance_company_email'])

            ->subject('Certificate Holder Request for ' . $info['info']['company'] . ' DOT # ' . $info['info']['dot_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $error_message = "";

        $flash_message = "Your request to the insurance company has been sent!";

        return $this->goBackWithData($current_record, $flash_message, $error_message);
    }

    public function certCarrier($id)
    {
        $info = Carrier::find($id);

        $current_record = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.certCarrier'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['email'])

            ->subject('Cargo Insurance Certificate Holder Request');
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $error_message = "";

        $flash_message = "Your insurance request to the carrier has been sent!";

        return $this->goBackWithData($current_record, $flash_message, $error_message);
    }

    public function emailColleagueHauler($id)
    {
        $info = Carrier::find($id);

        $current_record = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.emailColleagueHauler'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['email_colleague_carrier'])

            ->subject('Check out this message from Carrier Data DOT # ' . $info['info']['dot_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $error_message = "";

        $flash_message = "The carrier data has been sent to your colleague!";

        return $this->goBackWithData($current_record, $flash_message, $error_message);
    }

    public function sendBrokerCarrierPacket($id)
    {
       $info = Carrier::find($id);

        $current_record = $id;

        $info = ['info' => $info];

        Mail::send(['html'=>'email.sendBrokerCarrierPacket'], $info, function($message) use ($info){
            
           
            $pathToFile = 'Broker_Carrier_Contract.pdf';
            

             $message->attach($pathToFile);

            $message->to($info['info']['email'])

            ->subject('Set Up Packet for ' . $info['info']['company'] . ' DOT # ' . $info['info']['dot_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $error_message = "";

        $flash_message = "The Broker/Carrier packet has been sent!";

        return $this->goBackWithData($current_record, $flash_message, $error_message);
    }
    
}
