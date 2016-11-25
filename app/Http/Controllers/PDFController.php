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

	//Emails the invoice
	public function emailInvoicePDF($id)
	{
		//$filename = sys_get_temp_dir() . '/' . $id . '_rate.pdf';
		$subject = "Your Invoice";
		$content = "Your Load Information";

		$info = Load::find($id);

		$pdfpath = PDF::loadView('pdf.invoice',['info'=>$info]);

		// $pdf->Output();
		// $pdf->Output($filename, "F");
		// $pdfpath = $filename;
	    
		$this->sendEmail($subject,$content,$pdfpath);

	    return back()->with('status', 'The Rate Confirmation has been sent.');
	
	}

	//Emails the rate confirmation
	public function emailContractPDF($id)
	{

		$subject = "Your Rate Confirmation";
		$content = "Your Load Information";

		$pdf = PDF::loadView('pdf.contract',['info'=>$info]);
	    
		$this->sendEmail($subject,$content);

	    return back()->with('status', 'The Rate Confirmation has been sent.');
	
	}

	//create new function to send mail with attachment
      public function attach_email($id){
        
        //Get the selected load info
      	$info = Load::find($id);

      	//Turn it into an array
        $data=['info'=>$info];

        
        Mail::send(['text'=>'mail'], $data, function($message){
            

            $message->to('mikecornille@gmail.com','Mike Cornille')->subject('Send Mail from Laravel with HTML Email');
          
            $message->from('mikec@itransys.com','The Other Mike');

        });
        echo 'HTML Email was sent!';
      }

      


}


