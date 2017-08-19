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
              'insurance_company_email' => 'required|email'

        ]);

        $store = New Carrier($request->all());

        
        $store->save();

        return back();
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
        // $hauler = Carrier::findOrFail($id);

        // dd($hauler);

        //  return view('hauler.edit', compact('hauler', $hauler));
    }

    public function editForm(Request $request)
    {
             

             $hauler = $request->input('findcar_id');

             $gethauler = Carrier::findOrFail($hauler);

             $employees = User::all()->pluck('email','email');

             return view('hauler.edit', compact('gethauler', $gethauler, 'employees', $employees));



             

    }

    public function goBackWithData($id, $status)
    {
             

             

             $gethauler = Carrier::findOrFail($id);

             $employees = User::all()->pluck('email','email');

             return view('hauler.edit', compact('gethauler', $gethauler, 'employees', $employees))->with('status', $status);



             

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

        

        date_default_timezone_set("America/Chicago");
        
        // $this->validate($request, [

        // 'company' => 'required',
        //       'contact' => 'required',
        //       'mc_number' => 'required',
        //       'dot_number' => 'required',
        //       'address' => 'required',
        //       'city' => 'required',
        //       'state' => 'required',
        //       'zip' => 'required',
        //       'phone' => 'required',
        //       'fax' => 'required',
        //       'email' => 'required',
        //       'driver_name' => 'required',
        //       'driver_phone' => 'required',
        //       'cargo_exp' => 'required',
        //       'cargo_amount' => 'required',
        //       'bc_contract' => 'required',
        //       'remit_name' => 'required',
        //       'remit_address' => 'required',
        //       'remit_city' => 'required',
        //       'remit_state' => 'required',
        //       'remit_zip' => 'required',
        //       'load_info' => 'required',
        //       'permanent_notes' => 'required',
        //       'trailer_type_1' => 'required',
        //       'trailer_type_2' => 'required',
        //       'trailer_type_3' => 'required',
        //       'email_colleague_carrier' => 'required',
        //       'load_route' => 'required',
        //       'current_carrier_rate' => 'required',
        //       'current_trailer_type' => 'required',
        //       'current_city_location' => 'required',
        //       'current_miles_from_pick' => 'required',
        //       'delivery_schedule' => 'required',
        //       'active' => 'required',
        //       'google_carrier' => 'required',
        //       'oos_driver_national' => 'required',
        //       'oos_driver_company' => 'required',
        //       'oos_vehicle_national' => 'required',
        //       'oos_vehicle_company' => 'required',
        //       'allowed_to_operate' => 'required',
        //       'operation_type' => 'required',
        //       'crashes' => 'required',
        //       'fatal_crashes' => 'required',
        //       'number_of_drivers' => 'required',
        //       'number_of_power' => 'required',
        //       'insurance_company_email' => 'required'

        // ]);

        $post = Carrier::findOrFail($id);
$myShit = $post->id;
        $post->update($request->all());

       
$statusPass = "This profile has been updated!";
        //return redirect()->route('hauler.index');

        return $this->goBackWithData($myShit, $statusPass);
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

        $myShit = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.certInsuranceCompany'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['insurance_company_email'])

            ->subject('Certificate Holder Request for ' . $info['info']['company'] . ' DOT # ' . $info['info']['dot_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $statusPass = "Your request to the insurance company has been sent!";

        return $this->goBackWithData($myShit, $statusPass);
    }

    public function certCarrier($id)
    {
        $info = Carrier::find($id);

        $myShit = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.certCarrier'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['email'])

            ->subject('Cargo Insurance Certificate Holder Request');
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $statusPass = "Your request to the insurance company has been sent!";

        return $this->goBackWithData($myShit, $statusPass);
    }

    public function emailColleagueHauler($id)
    {
        $info = Carrier::find($id);

        $myShit = $id;
        
        $info = ['info' => $info];
        
        Mail::send(['html'=>'email.emailColleagueHauler'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['email_colleague_carrier'])

            ->subject('Check out this message from Carrier Data DOT # ' . $info['info']['dot_number']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $statusPass = "Your request to the insurance company has been sent!";

        return $this->goBackWithData($myShit, $statusPass);
    }

    public function sendBrokerCarrierPacket($id)
    {
       $info = Carrier::find($id);

        $myShit = $id;

        $info = ['info' => $info];

        Mail::send(['html'=>'email.sendBrokerCarrierPacket'], $info, function($message) use ($info){
            
           
            $pathToFile = 'Broker_Carrier_Contract.pdf';
            

             $message->attach($pathToFile);

            $message->to($info['info']['email'])

            ->subject('Set Up Packet for MC # ');
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });

        $statusPass = "Your request to the insurance company has been sent!";

        return $this->goBackWithData($myShit, $statusPass);
    }
    
}
