<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    
	public function getInvoicePDF()
	{
    
    $pdf = PDF::loadView('pdf.invoice');
    return $pdf->download('invoice.pdf');
	
	}

	public function getContractPDF()
	{
    
    $pdf = PDF::loadView('pdf.contract');
    return $pdf->download('contract.pdf');
	
	}
}
