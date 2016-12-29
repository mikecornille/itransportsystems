<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Twilio\Rest\Client;

use PDF;
use App\Load;

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
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

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

            ->subject('PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Load_Confirmation_' . $info['info']['id'] . '.pdf');

            

        });

        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = "ACf01e703e3d89fe05b97de8f8b103058e";
        $AuthToken = "b71795afcc839bbd050ad1a513d1d871";

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
                'body' => "LOAD INFO\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell']
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
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

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
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'BOL_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The BOL has been sent to you!');
    }

    //Emails a Rate Confirmation
      public function textLoadInfo($id){
        
        $info = Load::find($id);

        $info = ['info'=>$info];


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = "ACf01e703e3d89fe05b97de8f8b103058e";
        $AuthToken = "b71795afcc839bbd050ad1a513d1d871";

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
                'body' => "LOAD INFO\n" . "PICK INFO\n" . $info['info']['pick_company'] . "\n" . $info['info']['pick_address'] . "\n" . $info['info']['pick_city'] . ", " . $info['info']['pick_state'] . " " . $info['info']['pick_zip'] . "\n" . $info['info']['pick_phone'] . "\n" . $info['info']['pick_date'] . " " . $info['info']['pick_time'] . " " . $info['info']['pick_status'] . "\n" . "\n" . "DELIVERY INFO\n" . $info['info']['delivery_company'] . "\n" . $info['info']['delivery_address'] . "\n" . $info['info']['delivery_city'] . ", " . $info['info']['delivery_state'] . " " . $info['info']['delivery_zip'] . "\n" . $info['info']['delivery_phone'] . "\n" . "\n" . "COMMODITY\n" . $info['info']['commodity'] . "\n" . "\n" . "SPECIAL INS" . "\n" . $info['info']['special_ins'] . "\n" . "\n" . "PO # " . $info['info']['po_number'] . "\n" . "REF # " . $info['info']['ref_number'] . "\n" . "BOL # " . $info['info']['bol_number'] . "\n" . "\n" . "CARRIER INFO\n" . $info['info']['carrier_name'] . "\n" . "DISPATCH: " . $info['info']['carrier_contact'] . "\n" . $info['info']['carrier_phone'] . "\n" . "DRIVER: " . $info['info']['carrier_driver_name'] . "\n" . $info['info']['carrier_driver_cell']
            )
        );
    }

        return back()->with('status', 'The Text Message has been sent!');
    }
}

	





