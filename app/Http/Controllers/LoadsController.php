<?php

namespace App\Http\Controllers;

use App\Load;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Collection;



class LoadsController extends Controller
{
    public function index()
	{
		
		//$data = Quote::where('user_id', \Auth::user()->id)->get();
		$data = Load::all();
		return(['data' => $data]);
		
	}

	 public function store(Request $request)
	{
		
		
		
		

		$newload = New Load($request->all());
		
		$newload->its_group = "ITS";
		$newload->pick_status = "Open";
		$newload->delivery_status = "Open";
		$newload->created_by = \Auth::user()->email;

		$newload->save();

		return back();
		
	}

	
}
