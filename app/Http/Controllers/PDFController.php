<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use PDF;
use App\Load;

class PDFController extends Controller
{
    use helpers\Mailer;
	
	//Prints the Invoice and Rate Confirmation

	public function getInvoicePDF($id)
	{
		$info = Load::find($id);

		$pdf = PDF::loadView('pdf.invoice',['info'=>$info]);
    
		return $pdf->stream('invoice.pdf');
	
	}

	public function getContractPDF($id)
	{
    
    	$info = Load::find($id);

		$pdf = PDF::loadView('pdf.contract',['info'=>$info]);
    
		return $pdf->stream('contract.pdf');
	
	}

	//Emails the Invoice and Rate Confirmation

	public function emailInvoicePDF($id)
	{

		//Generate the email message
		$subject = "Your Invoice";
		$content = "Your Load Information";

		//Get the PDF
		$info = Load::find($id);
		$pdf = PDF::loadView('pdf.invoice',['info'=>$info]);
	    
	   Mail::to('joel.rosenthal@gmail.com')->send(new \App\Mail\Invoice($pdf));


	    //Generate the email with the pdf attachment
		$this->sendEmail($subject,$content,$pdf);

		//Show a success message
	    return back()->with('status', 'The Invoice has been sent.');
	
	}

	public function emailContractPDF($id)
	{

		$subject = "Your Invoice";
		$content = "Your Load Information";

		$pdf = PDF::loadView('pdf.invoice',['info'=>$info]);
	    
		$this->sendEmail($subject,$content);

	    return back()->with('status', 'The Rate Confirmation has been sent.');
	
	}
}


