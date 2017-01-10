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

		

		

		return view('myStats')->with('posts', $posts)->with('rateCons', $rateCons)->with('invoices', $invoices)->with('unsigned', $unsigned);
	}
}
