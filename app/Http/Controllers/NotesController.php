<?php

namespace App\Http\Controllers;

use App\Notes;

use App\Load;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;

class NotesController extends Controller
{
    public function index()

    {

    	JavaScript::put([
		        'user' => \Auth::user(),
    ]);

    	$posts = Notes::all()->sortByDesc("created_at");

        return view('notes', compact('posts'));

    }

    public function store(Request $request)
	{
		
		$this->validate($request, [

		 	'time_name_stamp' => 'required',			  
         	  'notes' => 'required',
			  
			  
			]);

        $newNote = New Notes($request->all());
		
		$newNote->save();

		return back();
		
	}

	public function getBrokerStats()
	{

        
		
		$posts = Notes::where('time_name_stamp', 'LIKE', '%' . \Auth::user()->name . '%')->count();


		$rateCons = Load::where('rate_con_creator', \Auth::user()->email)->count();

		$invoices = Load::where('created_by', \Auth::user()->email)->count();

		$unsigned = Load::where('rate_con_creator', \Auth::user()->email)->where('signed_rate_con', '!=', 'SIGNED')->get();

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
		->with('currentDate', $currentDate);
	}

	public function getAdminStats(Request $request = NULL)
	{
		$month = $request->input('month');

        $currentDate = date('m/d/Y');
		//Rate Confirmation Count
		$rateConDailyTotals = Load::where('rate_con_creation_date', $currentDate)->count();
        //Invoice Count
		$invoiceDailyTotals = Load::where('creation_date', $currentDate)->count();
		//Total billed out for the month
		$totalBilledForMonth = Load::whereMonth('created_at', $month)->sum('amount_due');
		//Total paid out for the month
		$totalPaidForMonth = Load::whereMonth('created_at', $month)->sum('carrier_rate');
		//Total profit for the month
		$totalProfitForMonth = $totalBilledForMonth - $totalPaidForMonth;


		//Robert Bansberg
		$robertName = "Robert Bansberg";
		$robertEmail = "robert@itransys.com";
		$rbNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $robertName . '%')->whereMonth('created_at', $month)->count();
		$rbRateCons = Load::where('rate_con_creator', $robertEmail)->whereMonth('created_at', $month)->count();
		$rbInvoices = Load::where('created_by', $robertEmail)->whereMonth('created_at', $month)->count();
		$rbMoneyBilled = Load::where('rate_con_creator', $robertEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$rbMoneyPaidOut = Load::where('rate_con_creator', $robertEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$rbDifference = $rbMoneyBilled - $rbMoneyPaidOut;
		$rbProfitMargin = $rbDifference / $rbMoneyBilled;
		$rbPercent = round((float)$rbProfitMargin * 100 );
		}
		else 
		{
		$rbDifference = 0;
		$rbProfitMargin = 0;
		$rbPercent = 0;
		}

		//Matt King
		$kingName = "Matt King";
		$kingEmail = "mattk@itransys.com";
		$mkNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $kingName . '%')->whereMonth('created_at', $month)->count();
		$mkRateCons = Load::where('rate_con_creator', $kingEmail)->whereMonth('created_at', $month)->count();
		$mkInvoices = Load::where('created_by', $kingEmail)->whereMonth('created_at', $month)->count();
		$mkMoneyBilled = Load::where('rate_con_creator', $kingEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$mkMoneyPaidOut = Load::where('rate_con_creator', $kingEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$mkDifference = $mkMoneyBilled - $mkMoneyPaidOut;
		$mkProfitMargin = $mkDifference / $mkMoneyBilled;
		$mkPercent = round((float)$mkProfitMargin * 100 );
		}
		else 
		{
		$mkDifference = 0;
		$mkProfitMargin = 0;
		$mkPercent = 0;
		}

		//AJ Mesik
		$MesikName = "AJ Mesik";
		$MesikEmail = "aj@itransys.com";
		$ajNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $MesikName . '%')->whereMonth('created_at', $month)->count();
		$ajRateCons = Load::where('rate_con_creator', $MesikEmail)->whereMonth('created_at', $month)->count();
		$ajInvoices = Load::where('created_by', $MesikEmail)->whereMonth('created_at', $month)->count();
		$ajMoneyBilled = Load::where('rate_con_creator', $MesikEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$ajMoneyPaidOut = Load::where('rate_con_creator', $MesikEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$ajDifference = $ajMoneyBilled - $ajMoneyPaidOut;
		$ajProfitMargin = $ajDifference / $ajMoneyBilled;
		$ajPercent = round((float)$ajProfitMargin * 100 );
		}
		else 
		{
		$ajDifference = 0;
		$ajProfitMargin = 0;
		$ajPercent = 0;
		}

		//Matt Carnahan
		$carnName = "Matt Carnahan";
		$carnEmail = "mattc@itransys.com";
		$mcNotes = Notes::where('time_name_stamp', 'LIKE', '%' . $carnName . '%')->whereMonth('created_at', $month)->count();
		$mcRateCons = Load::where('rate_con_creator', $carnEmail)->whereMonth('created_at', $month)->count();
		$mcInvoices = Load::where('created_by', $carnEmail)->whereMonth('created_at', $month)->count();
		$mcMoneyBilled = Load::where('rate_con_creator', $carnEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$mcMoneyPaidOut = Load::where('rate_con_creator', $carnEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$mcDifference = $mcMoneyBilled - $mcMoneyPaidOut;
		$mcProfitMargin = $mcDifference / $mcMoneyBilled;
		$mcPercent = round((float)$mcProfitMargin * 100 );
		}
		else 
		{
		$mcDifference = 0;
		$mcProfitMargin = 0;
		$mcPercent = 0;
		}
		
		//Joe Mowrer
		$mowrerEmail = "joem@itransys.com";
		$jmInvoices = Load::where('created_by', $mowrerEmail)->whereMonth('created_at', $month)->count();
		$jmRateCons = Load::where('rate_con_creator', $mowrerEmail)->whereMonth('created_at', $month)->count();
		$jmMoneyBilled = Load::where('created_by', $mowrerEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$jmMoneyPaidOut = Load::where('created_by', $mowrerEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$jmDifference = $jmMoneyBilled - $jmMoneyPaidOut;
		$jmProfitMargin = $jmDifference / $jmMoneyBilled;
		$jmPercent = round((float)$jmProfitMargin * 100 );
		}
		else 
		{
		$jmDifference = 0;
		$jmProfitMargin = 0;
		$jmPercent = 0;
		}

		//Mike Bruschuk
		$brushEmail = "mikeb@itransys.com";
		$mbInvoices = Load::where('created_by', $brushEmail)->whereMonth('created_at', $month)->count();
		$mbRateCons = Load::where('rate_con_creator', $brushEmail)->whereMonth('created_at', $month)->count();
		$mbMoneyBilled = Load::where('created_by', $brushEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$mbMoneyPaidOut = Load::where('created_by', $brushEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$mbDifference = $mbMoneyBilled - $mbMoneyPaidOut;
		$mbProfitMargin = $mbDifference / $mbMoneyBilled;
		$mbPercent = round((float)$mbProfitMargin * 100 );
		}
		else 
		{
		$mbDifference = 0;
		$mbProfitMargin = 0;
		$mbPercent = 0;
		}

		//Ron Cornille
		$ronEmail = "ronc@itransys.com";
		$rcInvoices = Load::where('created_by', $ronEmail)->whereMonth('created_at', $month)->count();
		$rcRateCons = Load::where('rate_con_creator', $ronEmail)->whereMonth('created_at', $month)->count();
		$rcMoneyBilled = Load::where('created_by', $ronEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$rcMoneyPaidOut = Load::where('created_by', $ronEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$rcDifference = $rcMoneyBilled - $rcMoneyPaidOut;
		$rcProfitMargin = $rcDifference / $rcMoneyBilled;
		$rcPercent = round((float)$rcProfitMargin * 100 );
		}
		else 
		{
		$rcDifference = 0;
		$rcProfitMargin = 0;
		$rcPercent = 0;
		}

		//Mike Cornille
		$mikeEmail = "mikec@itransys.com";
		$mtcInvoices = Load::where('created_by', $mikeEmail)->whereMonth('created_at', $month)->count();
		$mtcRateCons = Load::where('rate_con_creator', $mikeEmail)->whereMonth('created_at', $month)->count();
		$mtcMoneyBilled = Load::where('created_by', $mikeEmail)->whereMonth('created_at', $month)->sum('amount_due');
		$mtcMoneyPaidOut = Load::where('created_by', $mikeEmail)->whereMonth('created_at', $month)->sum('carrier_rate');
		
		if ($month !== NULL)
		{
		$mtcDifference = $mtcMoneyBilled - $mtcMoneyPaidOut;
		$mtcProfitMargin = $mtcDifference / $mtcMoneyBilled;
		$mtcPercent = round((float)$mtcProfitMargin * 100 );
		}
		else 
		{
		$mtcDifference = 0;
		$mtcProfitMargin = 0;
		$mtcPercent = 0;
		}

		//Wanda Giovingo
		// $wandaEmail = "wanda@itransys.com";
		// $wgInvoices = Load::where('created_by', $wandaEmail)->whereMonth('created_at', $month)->count();
		// // $wgRateCons = Load::where('rate_con_creator', $wandaEmail)->whereMonth('created_at', $month)->count();
		// $wgMoneyBilled = Load::where('created_by', $wandaEmail)->whereMonth('created_at', $month)->sum('amount_due');
		// $wgMoneyPaidOut = Load::where('created_by', $wandaEmail)->whereMonth('created_at', $month)->sum('carrier_rate');

		// if ($month !== NULL)
		// {
		// $wgDifference = $wgMoneyBilled - $wgMoneyPaidOut;
		// $wgProfitMargin = $wgDifference / $wgMoneyBilled;
		// $wgPercent = round((float)$wgProfitMargin * 100 );
		// }
		// else 
		// {
		// $wgDifference = 0;
		// $wgProfitMargin = 0;
		// $wgPercent = 0;
		// }



		// $rateCons = Load::where('rate_con_creator', \Auth::user()->email)->count();

		// $invoices = Load::where('created_by', \Auth::user()->email)->count();

		// $unsigned = Load::where('rate_con_creator', \Auth::user()->email)->where('signed_rate_con', '!=', 'SIGNED')->get();

		// ->where('signed_rate_con', '!=', 'SIGNED')->orWhereNull('signed_rate_con')->get();

		return view('admin')->with('rateConDailyTotals', $rateConDailyTotals)
			->with('currentDate', $currentDate)
			->with('invoiceDailyTotals', $invoiceDailyTotals)
			->with('month', $month)
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
			->with('ajNotes', $ajNotes)
			->with('ajRateCons', $ajRateCons)
			->with('ajMoneyBilled', $ajMoneyBilled)
			->with('ajMoneyPaidOut', $ajMoneyPaidOut)
			->with('ajPercent', $ajPercent)
			->with('ajInvoices', $ajInvoices)
			->with('mcNotes', $mcNotes)
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
			->with('mbRateCons', $mbRateCons)
			->with('mbMoneyBilled', $mbMoneyBilled)
			->with('mbMoneyPaidOut', $mbMoneyPaidOut)
			->with('mbPercent', $mbPercent)
			->with('mbInvoices', $mbInvoices)
			->with('rcRateCons', $rcRateCons)
			->with('rcMoneyBilled', $rcMoneyBilled)
			->with('rcMoneyPaidOut', $rcMoneyPaidOut)
			->with('rcPercent', $rcPercent)
			->with('rcInvoices', $rcInvoices)
			->with('mtcRateCons', $mtcRateCons)
			->with('mtcMoneyBilled', $mtcMoneyBilled)
			->with('mtcMoneyPaidOut', $mtcMoneyPaidOut)
			->with('mtcPercent', $mtcPercent)
			->with('mtcInvoices', $mtcInvoices)
			// ->with('wgMoneyBilled', $wgMoneyBilled)
			// ->with('wgMoneyPaidOut', $wgMoneyPaidOut)
			// ->with('wgPercent', $wgPercent)
			// ->with('wgInvoices', $wgInvoices)
			->with('totalBilledForMonth', $totalBilledForMonth)
			->with('totalPaidForMonth', $totalPaidForMonth)
			->with('totalProfitForMonth', $totalProfitForMonth);

	}
}
