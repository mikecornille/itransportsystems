<?php

namespace App\Http\Controllers;

use App\Notes;

use App\Load;

use App\Loadlist;

use App\Budget;

use App\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;

class NotesController extends Controller
{
    public function index()
	{
		
		date_default_timezone_set("America/Chicago");
		$currentDate = date('Y-m-d H:i:s');
		$currentDateUnix = strtotime($currentDate);
		$subTwoWeeks = $currentDateUnix - 907200;
		$twoWeeksAgo = date('Y-m-d H:i:s', $subTwoWeeks);

		JavaScript::put([
		        'user' => \Auth::user(),
    ]);

    	$posts = Notes::whereBetween('created_at', [$twoWeeksAgo, $currentDate])->orderBy('created_at', 'desc')->get();

        return view('notes', compact('posts'));

    }

    public function budgetIndex()
    {
    	$items = Budget::all()->sortByDesc("monthly_amount");

    	$total = Budget::sum('monthly_amount');

        return view('budget', compact('items', 'total'));

    }

    public function store(Request $request)
	{

		date_default_timezone_set("America/Chicago");
		
		$this->validate($request, [

		 	'time_name_stamp' => 'required',			  
         	  'notes' => 'required',
			  
			  
			]);

        $newNote = New Notes($request->all());
		
		$newNote->save();

		return back();
		
	}

	public function budgetStore(Request $request){
		$this->validate($request, [

		 	'description' => 'required',			  
         	  'monthly_amount' => 'required',
			  
			  
			]);

		$new = New Budget($request->all());
		
		$new->save();

		return back();

	}

	public function getBrokerStats()
	{

        
		
		$posts = Notes::where('time_name_stamp', 'LIKE', '%' . \Auth::user()->name . '%')->count();


		$rateCons = Load::where('rate_con_creator', \Auth::user()->email)->count();

		$invoices = Load::where('created_by', \Auth::user()->email)->count();

		// $personal_loads_status = Load::where('created_by', \Auth::user()->email)->where('pick_status', '=', 'Loaded')->orWhere('pick_status', '=', 'Booked')->get();


		$personal_unsigned = Load::where('rate_con_creator', \Auth::user()->email)->where('signed_rate_con', '!=', 'SIGNED')->get();

		$currentMonth = date('m');

		$unsigned = Load::where('signed_rate_con', '!=', 'SIGNED')
		->where('rate_con_creator', 'like', '%' . '@' . '%')
		->whereMonth('created_at', $currentMonth)
		->orderBy('id', 'asc')->get();

		$unsigned_count = Load::where('signed_rate_con', '!=', 'SIGNED')
		->where('rate_con_creator', 'like', '%' . '@' . '%')
		->whereMonth('created_at', $currentMonth)->count();

		// ->where('signed_rate_con', '!=', 'SIGNED')->orWhereNull('signed_rate_con')->get();

		$currentDate = date('m/d/Y');
		//Rate Confirmation Count
		$rateConDailyTotals = Load::where('rate_con_creation_date', $currentDate)->count();

		$invoiceDailyTotals = Load::where('creation_date', $currentDate)->count();

		

		

		return view('myStats')->with('posts', $posts)
		->with('rateCons', $rateCons)
		->with('invoices', $invoices)
		->with('unsigned', $unsigned)
		->with('rateConDailyTotals', $rateConDailyTotals)
		->with('invoiceDailyTotals', $invoiceDailyTotals)
		->with('personal_unsigned', $personal_unsigned)
		->with('unsigned_count', $unsigned_count)
		->with('currentDate', $currentDate);
	}

	public function getAdminStats(Request $request = NULL)
	{
		

		$start_date = $request->input('start_date');

		$end_date = $request->input('end_date');

		
		$month = date_parse_from_format("m/d/Y", $start_date);
		

	
		//Curretn Date
        $currentDate = date('m/d/Y');
		
		//Rate Confirmation Count
		$rateConDailyTotals = Load::where('rate_con_creation_date', $currentDate)->count();
        
        //Invoice Count
		$invoiceDailyTotals = Load::where('creation_date', $currentDate)->count();
		
		//Total billed out for the month
		$totalBilledForMonth = Load::whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');

		//Total paid out for the month
		$totalPaidForMonth = Load::whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		
		//Total profit for the month
		$totalProfitForMonth = $totalBilledForMonth - $totalPaidForMonth;


		
		$robertName = "Robert Bansberg";
		$robertEmail = "robert@itransys.com";
		//How many notes employee wrote in chosen month
		$rbNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $robertName . '%')->whereMonth('created_at', $month["month"])->count();
		//How many rate cons employee typed up within a date range
		$rbRateCons = Load::where('rate_con_creator', $robertEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$rbInvoices = Load::where('created_by', $robertEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$rbMoneyBilled = Load::where('rate_con_creator', $robertEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$rbMoneyPaidOut = Load::where('rate_con_creator', $robertEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$rbAmbassador = Customer::where('customer_ambassador', $robertEmail)->count();
		
		if (!isset($start_date))
		{
			$rbDifference = 0;
			$rbProfitMargin = 0;
			$rbPercent = 0;
		}
		else 
		{
			$rbDifference = $rbMoneyBilled - $rbMoneyPaidOut;
			$rbProfitMargin = $rbDifference / $rbMoneyBilled;
			$rbPercent = round((float)$rbProfitMargin * 100 );
		}

		//Luke Thompson

		$lukeName = "Luke Thompson";
		$lukeEmail = "luke@itransys.com";
		//How many notes employee wrote in chosen month
		$ltNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $lukeName . '%')->whereMonth('created_at', $month["month"])->count();
		//How many rate cons employee typed up within a date range
		$ltRateCons = Load::where('rate_con_creator', $lukeEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$ltMoneyBilled = Load::where('rate_con_creator', $lukeEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$ltMoneyPaidOut = Load::where('rate_con_creator', $lukeEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		
		
		if (!isset($start_date))
		{
			$ltDifference = 0;
			$ltProfitMargin = 0;
			$ltPercent = 0;
		}
		else 
		{
			$ltDifference = $ltMoneyBilled - $ltMoneyPaidOut;
			$ltProfitMargin = $ltDifference / $ltMoneyBilled;
			$ltPercent = round((float)$ltProfitMargin * 100 );
		}

		//Matt King

		$kingName = "Matt King";
		$kingEmail = "mattk@itransys.com";
		//How many notes employee wrote in chosen month
		$mkNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $kingName . '%')->whereMonth('created_at', $month["month"])->count();
		//How many rate cons employee typed up within a date range
		$mkRateCons = Load::where('rate_con_creator', $kingEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$mkInvoices = Load::where('created_by', $kingEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$mkMoneyBilled = Load::where('rate_con_creator', $kingEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$mkMoneyPaidOut = Load::where('rate_con_creator', $kingEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		$mkCalledOut = Loadlist::where('handler', 'MK')->whereMonth('created_at', $month["month"])->sum('countOutgoingCalls');
		

		$mkAmbassador = Customer::where('customer_ambassador', $kingEmail)->count();
		
		if (!isset($start_date))
		{
			$mkDifference = 0;
			$mkProfitMargin = 0;
			$mkPercent = 0;
		}
		else 
		{
			$mkDifference = $mkMoneyBilled - $mkMoneyPaidOut;
			$mkProfitMargin = $mkDifference / $mkMoneyBilled;
			$mkPercent = round((float)$mkProfitMargin * 100 );
		}

		$MesikName = "AJ Mesik";
		$MesikEmail = "aj@itransys.com";
		//How many notes employee wrote in chosen month
		$ajNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $MesikName . '%')->whereMonth('created_at', $month["month"])->count();
		//How many rate cons employee typed up within a date range
		$ajRateCons = Load::where('rate_con_creator', $MesikEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$ajInvoices = Load::where('created_by', $MesikEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$ajMoneyBilled = Load::where('rate_con_creator', $MesikEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$ajMoneyPaidOut = Load::where('rate_con_creator', $MesikEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$ajAmbassador = Customer::where('customer_ambassador', $MesikEmail)->count();
		
		if (!isset($start_date))
		{
			$ajDifference = 0;
			$ajProfitMargin = 0;
			$ajPercent = 0;
		}
		else 
		{
			$ajDifference = $ajMoneyBilled - $ajMoneyPaidOut;
			$ajProfitMargin = $ajDifference / $ajMoneyBilled;
			$ajPercent = round((float)$ajProfitMargin * 100 );
		}




		$carnEmail = "mattc@itransys.com";
		//How many rate cons employee typed up within a date range
		$mcRateCons = Load::where('rate_con_creator', $carnEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$mcInvoices = Load::where('created_by', $carnEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$mcMoneyBilled = Load::where('created_by', $carnEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$mcMoneyPaidOut = Load::where('created_by', $carnEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$mcAmbassador = Customer::where('customer_ambassador', $carnEmail)->count();
		
		if (!isset($start_date))
		{
			$mcDifference = 0;
			$mcProfitMargin = 0;
			$mcPercent = 0;
		}
		else 
		{
			$mcDifference = $mcMoneyBilled - $mcMoneyPaidOut;
			$mcProfitMargin = $mcDifference / $mcMoneyBilled;
			$mcPercent = round((float)$mcProfitMargin * 100 );
		}

		
		
		
		$mowrerEmail = "joem@itransys.com";
		//How many rate cons employee typed up within a date range
		$jmRateCons = Load::where('rate_con_creator', $mowrerEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$jmInvoices = Load::where('created_by', $mowrerEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$jmMoneyBilled = Load::where('created_by', $mowrerEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$jmMoneyPaidOut = Load::where('created_by', $mowrerEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$jmAmbassador = Customer::where('customer_ambassador', $mowrerEmail)->count();
		
		if (!isset($start_date))
		{
			$jmDifference = 0;
			$jmProfitMargin = 0;
			$jmPercent = 0;
		}
		else 
		{
			$jmDifference = $jmMoneyBilled - $jmMoneyPaidOut;
			$jmProfitMargin = $jmDifference / $jmMoneyBilled;
			$jmPercent = round((float)$jmProfitMargin * 100 );
		}

		$brushEmail = "mikeb@itransys.com";
		//How many rate cons employee typed up within a date range
		$mbRateCons = Load::where('rate_con_creator', $brushEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$mbInvoices = Load::where('created_by', $brushEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$mbMoneyBilled = Load::where('created_by', $brushEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$mbMoneyPaidOut = Load::where('created_by', $brushEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$mbAmbassador = Customer::where('customer_ambassador', $brushEmail)->count();
		
		if (!isset($start_date))
		{
			$mbDifference = 0;
			$mbProfitMargin = 0;
			$mbPercent = 0;
		}
		else 
		{
			$mbDifference = $mbMoneyBilled - $mbMoneyPaidOut;
			$mbProfitMargin = $mbDifference / $mbMoneyBilled;
			$mbPercent = round((float)$mbProfitMargin * 100 );
		}

		//Ron Cornille

		$ronEmail = "ronc@itransys.com";
		//How many rate cons employee typed up within a date range
		$rcRateCons = Load::where('rate_con_creator', $ronEmail)->whereBetween('rate_con_creation_date', [$start_date, $end_date])->count();
		//How many invoices employee typed up within a date range
		$rcInvoices = Load::where('created_by', $ronEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$rcMoneyBilled = Load::where('created_by', $ronEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$rcMoneyPaidOut = Load::where('created_by', $ronEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$rcAmbassador = Customer::where('customer_ambassador', $ronEmail)->count();
		
		if (!isset($start_date))
		{
			$rcDifference = 0;
			$rcProfitMargin = 0;
			$rcPercent = 0;
		}
		else 
		{
			$rcDifference = $rcMoneyBilled - $rcMoneyPaidOut;
			$rcProfitMargin = $rcDifference / $rcMoneyBilled;
			$rcPercent = round((float)$rcProfitMargin * 100 );
		}

		$wandaEmail = "wanda@itransys.com";
		//How many invoices employee typed up within a date range
		$wgInvoices = Load::where('created_by', $wandaEmail)->whereBetween('creation_date', [$start_date, $end_date])->count();
		//How much money the employee was resposible that was billed to customers
		$wgMoneyBilled = Load::where('created_by', $wandaEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('amount_due');
		//How much money the employee was resposible that was paid to carriers
		$wgMoneyPaidOut = Load::where('created_by', $wandaEmail)->whereBetween('billed_date', [$start_date, $end_date])->sum('carrier_rate');
		

		$wgAmbassador = Customer::where('customer_ambassador', $wandaEmail)->count();
		
		

		return view('admin')->with('rateConDailyTotals', $rateConDailyTotals)
			->with('currentDate', $currentDate)
			->with('invoiceDailyTotals', $invoiceDailyTotals)
			->with('start_date', $start_date)
			->with('end_date', $end_date)
			->with('rbNotes', $rbNotes)
			->with('rbRateCons', $rbRateCons)
			->with('rbMoneyBilled', $rbMoneyBilled)
			->with('rbMoneyPaidOut', $rbMoneyPaidOut)
			->with('rbPercent', $rbPercent)
			->with('rbInvoices', $rbInvoices)
			->with('mkNotes', $mkNotes)
			->with('mkRateCons', $mkRateCons)
			->with('mkMoneyBilled', $mkMoneyBilled)
			->with('mkMoneyPaidOut', $mkMoneyPaidOut)
			->with('mkPercent', $mkPercent)
			->with('mkInvoices', $mkInvoices)
			->with('mkCalledOut', $mkCalledOut)
			->with('ltNotes', $ltNotes)
			->with('ltRateCons', $ltRateCons)
			->with('ltMoneyBilled', $ltMoneyBilled)
			->with('ltMoneyPaidOut', $ltMoneyPaidOut)
			->with('ltPercent', $ltPercent)
			->with('ajNotes', $ajNotes)
			->with('ajRateCons', $ajRateCons)
			->with('ajMoneyBilled', $ajMoneyBilled)
			->with('ajMoneyPaidOut', $ajMoneyPaidOut)
			->with('ajPercent', $ajPercent)
			->with('ajInvoices', $ajInvoices)
			->with('mcRateCons', $mcRateCons)
			->with('mcMoneyBilled', $mcMoneyBilled)
			->with('mcMoneyPaidOut', $mcMoneyPaidOut)
			->with('mcPercent', $mcPercent)
			->with('mcInvoices', $mcInvoices)
			->with('jmRateCons', $jmRateCons)
			->with('jmMoneyBilled', $jmMoneyBilled)
			->with('jmMoneyPaidOut', $jmMoneyPaidOut)
			->with('jmPercent', $jmPercent)
			->with('jmInvoices', $jmInvoices)
			->with('rcRateCons', $rcRateCons)
			->with('rcMoneyBilled', $rcMoneyBilled)
			->with('rcMoneyPaidOut', $rcMoneyPaidOut)
			->with('rcPercent', $rcPercent)
			->with('rcInvoices', $rcInvoices)
			->with('mbRateCons', $mbRateCons)
			->with('mbMoneyBilled', $mbMoneyBilled)
			->with('mbMoneyPaidOut', $mbMoneyPaidOut)
			->with('mbPercent', $mbPercent)
			->with('mbInvoices', $mbInvoices)
			->with('totalBilledForMonth', $totalBilledForMonth)
			->with('totalPaidForMonth', $totalPaidForMonth)
			->with('totalProfitForMonth', $totalProfitForMonth)
			->with('rbAmbassador', $rbAmbassador)
			->with('mkAmbassador', $mkAmbassador)
			->with('ajAmbassador', $ajAmbassador)
			->with('jmAmbassador', $jmAmbassador)
			->with('mcAmbassador', $mcAmbassador)
			->with('rcAmbassador', $rcAmbassador)
			->with('mbAmbassador', $mbAmbassador);

	}
}
