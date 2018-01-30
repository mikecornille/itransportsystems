<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Twilio\Rest\Client;

use PDF;

use Excel;

use App\Load;

use App\Text;

class PDFController extends Controller
{
    //use helpers\Mailer;
	
	//Prints the invoice
	public function getInvoicePDF($id)
	{
		$info = Load::find($id);

		$pdf = PDF::loadView('pdf.invoice',['info'=>$info]);
    
		return $pdf->stream('invoice.pdf');
	
	}

	//Prints the rate confirmation
	public function getContractPDF($id)
	{
    
    	$info = Load::find($id);

		$pdf = PDF::loadView('pdf.contract',['info'=>$info]);
    
		return $pdf->stream('contract.pdf');
	
	}

	//Emails an Invoice attachment
      public function emailInvoicePDF($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.invoice_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.invoice', $info);

            $message->to($info['info']['customer_email'])

            ->subject('International Transport Systems Invoice for PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Invoice_' . $info['info']['id'] . '.pdf');

            

        });



        return back()->with('status', 'The Invoice has been sent!');
    }

    //Emails a Rate Confirmation
      public function emailRateConPDF($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.rate_con_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.contract', $info);

            $message->to($info['info']['carrier_email'])

            ->cc(\Auth::user()->email)

            ->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Load_Confirmation_' . $info['info']['id'] . '.pdf');

            

        });

        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . \Auth::user()->cell => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "PRO # " . $info['info']['id'] . "\n\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell']
            )
        );
    }

        return back()->with('status', 'The Rate Confirmation has been sent!');
    }

    //Emails a BOL to Carrier
      public function emailBOLCarrier($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.bol_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.bol', $info);

            $message->to($info['info']['carrier_email'])

            ->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'BOL_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The BOL has been sent to the carrier!');
    }

    // emailBOLYou

     public function emailBOLYou($id){
        
        $info = Load::find($id);

      	$info = ['info'=>$info];

        Mail::send(['html'=>'email.bol_email_body'], $info, function($message) use ($info){
            
            $pdf = PDF::loadView('pdf.bol', $info);

            $message->to(\Auth::user()->email)

            ->subject('Bill of Lading from ITS for PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'BOL_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The BOL has been sent to you!');
    }

    //Texts load info 
      public function textLoadInfo($id){
        
        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . \Auth::user()->cell => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "PRO # " . $info['info']['id'] . "\n\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_contact'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . $info['info']['delivery_contact'] . "\n" . $info['info']['delivery_date'] . " " . $info['info']['delivery_time'] . " " . $info['info']['delivery_status'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . $info['info']['carrier_email'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell'] . "\n" . $info['info']['trailer_type']
            )
        );
    }

        return back()->with('status', 'The Text Message has been sent!');
    }


    //TEXTS ROLLBACK INFO 
      public function textAndEmailRollbackInfo($id){
        
        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Important!  International Transport Systems will arrange a rollback to safely assist the unload on the shipment you are doing from " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " to " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] .   ".  Please allow for open and accurate communication so we can schedule accordingly if needed.  Towable boom lifts, by nature of their configuration, can be difficult to unload." . "\n\n" . "Call or text: " . \Auth::user()->cell . " with any questions or when you are 1 hour away from delivery" . "\n\n" . "Thanks, " . \Auth::user()->name
            )
        );
    }



        
        Mail::send(['html'=>'email.rollbackEmail'], $info, function($message) use ($info){
            
            
            $message->to($info['info']['carrier_email'])

            ->subject('ITS Will Arrange Rollback For Offload On PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] .  ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name)

            ->replyTo(\Auth::user()->email, \Auth::user()->name)

            ->sender(\Auth::user()->email, \Auth::user()->name);

        });









        return back()->with('status', 'The Driver has been sent a Text and the Dispatcher an Email regarding the rollback info!');
    }

   public function textDriver($id)
   {

    date_default_timezone_set("America/Chicago");

     $info = Load::find($id);

        $info = ['info'=>$info];


        $newText = New Text();
        
        $newText->message = $info['info']['carrier_message'];
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();

        //I need to save the message, from number, pro number, time of day cst into my new model


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        // $AccountSid = "ACf01e703e3d89fe05b97de8f8b103058e";
        // $AuthToken = "b71795afcc839bbd050ad1a513d1d871";

        

        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => $info['info']['carrier_message']
            )
        );
    }

        return back()->with('status', 'The Text Message has been sent!');
    }


    public function textDriverPickStatus($id)
    {
        date_default_timezone_set("America/Chicago");

        $info = Load::find($id);

        $info = ['info'=>$info];

        $initial_message = "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for pick up at " . $info['info']['pick_company'] . " in " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . "?" . " PRO # " . $info['info']['id'];


        $newText = New Text();
        
        $newText->message = $initial_message;
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for pick up at " . $info['info']['pick_company'] . " in " . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . "?" . " PRO # " . $info['info']['id']
            )
        );
    }


        return back()->with('status', 'The Driver has been sent a Text asking the pick up status');

    }

    public function textDriverDeliveryStatus($id)
    {
        date_default_timezone_set("America/Chicago");

        $info = Load::find($id);

        $info = ['info'=>$info];

        $initial_message = "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for delivery at " . $info['info']['delivery_company'] . " in " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . "?" . " PRO # " . $info['info']['id'];


        $newText = New Text();
        
        $newText->message = $initial_message;
        $newText->toCell = $info['info']['carrier_driver_cell'];
        $newText->pro = $info['info']['id'];
        $newText->fromCell = "14159697014";
        $newText->sentAt = date("Y-m-d H:i:s");
        

        $newText->save();


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = env('TWILIO_ACCOUNTSID', 'false');
        $AuthToken = env('TWILIO_AUTHTOKEN', 'false');

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message. 
        // Feel free to change/add your own phone number and name here.
        $people = array(
        "+1" . $info['info']['carrier_driver_cell'] => "User"
        );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+14159697014", 
                
                // the sms body
                'body' => "Good Morning this is " . \Auth::user()->name . " with International Transport Systems, I was checking to see how you are looking for delivery at " . $info['info']['delivery_company'] . " in " . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . "?" . " PRO # " . $info['info']['id']
            )
        );
    }


        return back()->with('status', 'The Driver has been sent a Text asking the delivery status');

    }

   



}

	





