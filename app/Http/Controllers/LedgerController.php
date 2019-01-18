<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Ledger;


class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLedger(Request $request)
    {
        $start_date_user = $request->input('start_date');
        $end_date_user = $request->input('end_date');
        $start_date_carbon = Carbon::createFromFormat('m/d/Y', $start_date_user, "America/Chicago");
        $end_date_carbon = Carbon::createFromFormat('m/d/Y', $end_date_user, "America/Chicago");
        $start_date = $start_date_carbon->toDateString();
        $end_date = $end_date_carbon->toDateString();


        
        

        //Get starting balance
        $starting_deposits = Ledger::whereBetween('date', ['2018-04-30', $start_date])->sum('deposit_amount');
        $starting_payments = Ledger::whereBetween('date', ['2018-04-30', $start_date])->sum('payment_amount');
        $startingBalance = $starting_deposits - $starting_payments;
        

        


        //Get ending balance
        $ending_deposits = Ledger::whereBetween('date', ['2018-04-30', $end_date])->sum('deposit_amount');
        $ending_payments = Ledger::whereBetween('date', ['2018-04-30', $end_date])->sum('payment_amount');
        $endingBalance = $ending_deposits - $ending_payments;


        
        $data = Ledger::whereBetween('date', [$start_date, $end_date])->orderBy('date', 'asc')->get();

       $data->map(function ($data) {
            

            $deposit_amount_totals = Ledger::where('date', '<=', $data->date)->sum('deposit_amount');

            $payment_amount_totals = Ledger::where('date', '<=', $data->date)->sum('payment_amount');

             
                
             $data['running_total'] = $deposit_amount_totals - $payment_amount_totals;
                
             return $data;
         });

       


        return view('viewLedgerResults')
                ->with('startingBalance', $startingBalance)
                ->with('endingBalance', $endingBalance)
                ->with('data', $data);
        
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
