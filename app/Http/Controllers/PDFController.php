<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use PDF;
use App\Load;

class PDFController extends Controller
{
    use helpers\Mailer;
	
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

            ->subject('Load Confirmation for PRO # ' . $info['info']['id'] . ' from ' . $info['info']['pick_city'] . ', ' . $info['info']['pick_state'] . ' to ' . $info['info']['delivery_city'] . ', ' . $info['info']['delivery_state']);
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

            $message->attachData($pdf->output(), 'Load_Confirmation_' . $info['info']['id'] . '.pdf');

            

        });

        return back()->with('status', 'The Rate Confirmation has been sent!');
    }
}

	





