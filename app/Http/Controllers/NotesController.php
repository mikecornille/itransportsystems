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
			->with('mkInvoices', $mkInvoices);
	}
}
