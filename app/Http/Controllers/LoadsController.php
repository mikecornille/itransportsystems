<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Load;

class LoadsController extends Controller
{
    public function index()
	{
		
		//$data = Quote::where('user_id', \Auth::user()->id)->get();
		$data = Load::all();
		return(['data' => $data]);
		
	}
}
