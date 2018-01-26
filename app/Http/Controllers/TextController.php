<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Twilio\Rest\Client;

use Twilio\Twiml;

use App\Text;

use App\Load;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function receive(Request $request)
    {

        date_default_timezone_set("America/Chicago");

        $phoneNumber = substr($request->input('From'),-10);

        //How do I get the correct PRO # associated with this incoiming text? where delivery status != delivered
        $load = Load::where('carrier_driver_cell', 'LIKE', '%' . $phoneNumber . '%')->first();
        
        $text = Text::create([
            'message' => $request->input('Body'),
            'fromCell' => $phoneNumber,
            'sentAt' => date("Y-m-d H:i:s"),
            'toCell' => "14159697014",
            'pro' => $load->id
        ]);
    }
}
