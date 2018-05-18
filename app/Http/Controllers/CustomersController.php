<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Customer;
use App\Load;
use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use DB;
use Excel;
use Carbon\Carbon;

class CustomersController extends Controller
{
    //STORES A NEW CUSTOMER IN THE DATABASE
	 public function store(Request $request)
	{
		
		 $this->validate($request, [

		 	'name' => 'required',			  
         	  'address' => 'required',
			  'city' => 'required',
			  'state' => 'required',
			  'zip' => 'required',
			  'contact' => 'required',
			  'phone' => 'required',
			  'email' => 'required',
			  
        
         ]);


        $newCustomer = New Customer($request->all());
		
		$newCustomer->save();

		return back()->with('status', 'New Customer Created!');
		
	}

	//UPDATES RECORD IN DATABASE THORUGH AJAX CALL
	public function updateCustomer(Request $request) 
	{
    
		//IF I WANT TO UPDATE SPECIFIC COLUMNS
		// Customer::where('id', $request->id)->update([
        // 'name' => $request->name,
        // 'country' => $request->country,
	    // ]);

    	Customer::where('id', $request->id)->update($request->all());


   }

   //GET A LIST OF THE CUSTOMERS ASSIGNED TO THE USER
	public function getAmbassadorStats() 
	{
    
		
		$getCustomers = Customer::where('customer_ambassador', \Auth::user()->email)->get();

		return view('findCustomer', compact('getCustomers'));

    }

    public function emailCustomerGeneral()
    {

    	$info = ["foo" => "bar", "bar" => "foo",];
        
        Mail::send(['html'=>'email.generalInfoEmail'], $info, function($message){
            
            
           	$message->to('mikec@itransys.com')

           	->subject('International Transport Systems follow up to Phone Call');
          
            $message->from(\Auth::user()->email, \Auth::user()->name);

        });

    	return back()->with('status', 'The general info email has been sent to you.');


   	}

   	public function biWeeklyCustomerEmailList()
   	{
   		$posts = Customer::where('weekly_email', 'WEEKLY')->orderBy('email', 'asc')->get();

   		return view('biWeeklyCustomerEmailList', compact('posts', $posts));
   	}

   	public function customerAccoutingEdit(Request $request)
   	{
   			$customer = $request->input('findcus_id');

            //Find the customer
            $getCustomer = Customer::findOrFail($customer);

            //Find all the loads for the customer that need to be paid
            $getCustomerLoadsNotPaid = Load::where('customer_id', "=", $getCustomer->id)->where('customerPayStatus', "=", "OPEN")->get();

            $getCustomerLoadsPaid = Load::where('customer_id', "=", $getCustomer->id)->where('customerPayStatus', "=", "PAID")->get();

            $sumPaidFromCustomer = Load::where('customer_id', $customer)->where('customerPayStatus', '=', "PAID")->sum('paid_amount_from_customer');

            $sumOwedFromCustomer = Load::where('customer_id', $customer)->where('customerPayStatus', '=', "OPEN")->sum('amount_due');

            return view('customer_accounting_edit', compact('getCustomer', $getCustomer, 'getCustomerLoadsPaid', $getCustomerLoadsPaid, 'getCustomerLoadsNotPaid', $getCustomerLoadsNotPaid, 'sumPaidFromCustomer', $sumPaidFromCustomer, 'sumOwedFromCustomer', $sumOwedFromCustomer));
   	}

   	public function customerAccoutingEditFromAccountsReceivablePage($id)
   	{
   			

            //Find the customer
            $getCustomer = Customer::findOrFail($id);

            //Find all the loads for the customer that need to be paid
            $getCustomerLoadsNotPaid = Load::where('customer_id', "=", $getCustomer->id)->where('customerPayStatus', "=", "OPEN")->get();

            $getCustomerLoadsPaid = Load::where('customer_id', "=", $getCustomer->id)->where('customerPayStatus', "=", "PAID")->get();

            $sumPaidFromCustomer = Load::where('customer_id', $id)->where('customerPayStatus', '=', "PAID")->sum('paid_amount_from_customer');

            $sumOwedFromCustomer = Load::where('customer_id', $id)->where('customerPayStatus', '=', "OPEN")->sum('amount_due');


			return view('customer_accounting_edit', compact('getCustomer', $getCustomer, 'sumPaidFromCustomer', $sumPaidFromCustomer, 'sumOwedFromCustomer', $sumOwedFromCustomer, 'getCustomerLoadsNotPaid', $getCustomerLoadsNotPaid, 'getCustomerLoadsPaid', $getCustomerLoadsPaid));
   	}

   	public function CustomerAccountingUpdate(Request $request, $id)
   	{
   		

   		$customer = Customer::where('id', '=', $id)->first();
   		$customer->update($request->all());



   		return view('customer_accounting');
   		
   		

   		
   	}

   	public function payMultipleRecordForm($id)
   	{

   		//Get all the open loads
   		$open_loads = Load::where('customer_id', "=", $id)->where('customerPayStatus', '=', "OPEN")->get();

   		//Get the customer
   		$customer = Customer::findOrFail($id);

      $offAmount = "";

   		return view('/payMultipleRecordForm', compact('open_loads', $open_loads, 'customer', $customer, 'offAmount', $offAmount));
   	}

   	public function payMultipleRecordFormPost(Request $request)
   	{
   			
   		
   			
   			
   			foreach($request->id as $id)
   			{

          

          if(!empty($request->customerPayStatus[$id])){

   				if($request->customerPayStatus[$id] === "OPEN" && $request->has('customerPayStatus'))
   				{
   					$findLoad = Load::findOrFail($id);
	   				$findLoad->deposit_date = $request->deposit_date;
	   				$findLoad->ref_or_check_num_from_customer = $request->ref_or_check_num_from_customer;
	   				$findLoad->payment_method_from_customer = $request->payment_method_from_customer;
	   				$findLoad->totalCheckAmountFromCustomer = $request->totalCheckAmountFromCustomer;
	   				$findLoad->paid_amount_from_customer = $request->paid_amount_from_customer[$id];
	   				$findLoad->customerPayStatus = $request->customerPayStatus[$id];
	   				$findLoad->update();

   				}
   				elseif($request->customerPayStatus[$id] === "PAID" && $request->has('customerPayStatus'))
   				{
   				$findLoad = Load::findOrFail($id);
   				$findLoad->deposit_date = $request->deposit_date;
   				$findLoad->ref_or_check_num_from_customer = $request->ref_or_check_num_from_customer;
   				$findLoad->payment_method_from_customer = $request->payment_method_from_customer;
   				$findLoad->totalCheckAmountFromCustomer = $request->totalCheckAmountFromCustomer;
   				$findLoad->paid_amount_from_customer = $request->paid_amount_from_customer[$id];
   				$findLoad->customerPayStatus = $request->customerPayStatus[$id];
   				$findLoad->update();
   				}

        }
          
   				
   			}

   		return view('customer_accounting');
   	}

    public function agingReport($id)
    {
        
        date_default_timezone_set("America/Chicago");
        
        $currentDate = date('m-d-Y');

    //$data = Item::get()->toArray();
    $loads = Load::select('id', 'ref_number', 'pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'delivery_date', 'amount_due', 'billed_date')
    ->where('customer_id', $id)->where('customerPayStatus', 'OPEN')->whereRaw('billed_date <> ""')
    ->get();

    $loads->map(function ($data) {
          $loads['aging'] = '';
          return $loads;
      });


    $loads->transform(function($loads) {
      
      //Get todays date to do math
      $today_raw = Carbon::now('America/Chicago');
      //Get the billed date
      $billed_date = Carbon::createFromFormat('m/d/Y', $loads->billed_date);
      //Send to datatable
      $loads->aging = (string)$billed_date->diffInDays($today_raw, false);

      return $loads;
    });

    //->whereBetween('billed_date', [$start, $end])->orderBy('id', 'asc')->get();


    return \Excel::create('Aging_Report_' . $currentDate, function($excel) use ($loads) {
      $excel->sheet('mySheet', function($sheet) use ($loads)
          {
        $sheet->fromArray($loads);
          });
    })->download('csv');
    }

}
