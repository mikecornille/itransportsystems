<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Journal;

use App\Carrier;

use Carbon\Carbon;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journal_entries = Journal::orderBy('id', 'asc')->get();

        $newForm = TRUE;
        
        return view('journal', compact('journal_entries', $journal_entries, 'newForm', $newForm));
    }

    public function findGeneralAccount($id)
    {
        $generalAccount = Journal::where('type_description_sub', $id)->get();

        $payment_amount = Journal::where('type_description_sub', $id)->where('type', 'BILLPMT')->sum('payment_amount');

        $deposit_amount = Journal::where('type_description_sub', $id)->where('type', 'PMT')->sum('deposit_amount');

        $total = $deposit_amount - $payment_amount;
        
        return view('GeneralAccountDetail')->with('generalAccount', $generalAccount)->with('total', $total);
    }

    public function journalGeneralAccountSearch()
    {
         //Get all the unique categories
        $unique_cats = Journal::select('type_description_sub')->groupBy('type_description_sub')->get(); 

         $info = [];
         foreach($unique_cats as $cat)
         {

            $total_expense = Journal::where('type_description', 'Expense')->where('type_description_sub', $cat->type_description_sub)
            ->sum('payment_amount');

            $total_revenue = Journal::where('type_description', 'Revenue')->where('type_description_sub', $cat->type_description_sub)
            ->sum('deposit_amount');

            $total = $total_expense - $total_revenue;
            
            $info[] = [$total, $cat->type_description_sub];

        }         

          $info = ['info' => $info ];

       


        return view('journalGeneralAccountSearch')->with('info', $info);
    }

    public function submitNewJournalVendor(Request $request)
    {
        $vendor_name = $request->input('vendor_name');

        $store = New Carrier();

        $store->company = $vendor_name;

        $store->save();

        return redirect('journal');


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
        date_default_timezone_set("America/Chicago");
        
        $this->validate($request, [

            'account_name' => 'required|max:39',
            'account_id' => 'required',
            'type' => 'required',
            'type_description' => 'required',
            'memo' => 'required',
            'account_name_routing' => 'max:21',
            'routing_number' => 'min:9|max:9',
            'account_number' => 'max:12'
             

        ]);

        $store = New Journal($request->all());
        
        $store->save();

        return back();
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
        $post = Journal::findOrFail($id);

         return view('editJournal', compact('post', $post));
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
        date_default_timezone_set("America/Chicago");
        
        $this->validate($request, [

             'account_name' => 'required|max:39',
            'account_id' => 'required',
            'type_description' => 'required',
            'account_name_routing' => 'max:21',
            'routing_number' => 'min:9|max:9',
            'account_number' => 'max:12'           
              
        ]);

        $post = Journal::findOrFail($id);

        $post->update($request->all());

       

        return redirect()->route('journal.index');
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

    public function journalAccountSearchEdit(Request $request)
    {
        $accountId = $request->input('findJournalAccountsId');

        $account = Carrier::findOrFail($accountId);

        $entries = Journal::where('account_id', $accountId)->get();

        $payment_amount = Journal::where('account_id', $accountId)->where('type', 'BILLPMT')->sum('payment_amount');

        $deposit_amount = Journal::where('account_id', $accountId)->where('type', 'PMT')->sum('deposit_amount');

        $total = $deposit_amount - $payment_amount;



        return view('accountInfo', compact($account, 'account', $entries, 'entries', $total, 'total'));
    }

    public function goToAccountProfileFromJournal($id)
    {
        $account = Carrier::findOrFail($id);

        $entries = Journal::where('account_id', $id)->get();

        $payment_amount = Journal::where('account_id', $id)->where('type', 'BILLPMT')->sum('payment_amount');

        $deposit_amount = Journal::where('account_id', $id)->where('type', 'PMT')->sum('deposit_amount');

        $total = $deposit_amount - $payment_amount;



        return view('accountInfo', compact($account, 'account', $entries, 'entries', $total, 'total'));

    }

    public function journalAccountSearch()
    {
        $users = Journal::select('account_name')
            ->groupBy('account_name')
            ->get();

        


        return view('journalAccountSearch', compact($users, 'users'));
    }

    public function creditCardStore(Request $request)
    {
        date_default_timezone_set("America/Chicago");

        foreach($request->counter as $count)
            {

                if(!empty($request->payment_amount[$count])){
                
                $store = New Journal();
                $store->account_name = $request->account_name;
                $store->account_id = $request->account_id;
                $store->invoice_date_journal = $request->invoice_date_journal;
                $store->payment_method = $request->payment_method;
                $store->memo = $request->memo[$count];
                $store->payment_amount = $request->payment_amount[$count];
                $store->payment_cents = $request->payment_cents[$count];
                $store->type_description_sub = $request->type_description_sub[$count];
                $store->type = "BILLPMT";
                $store->type_description = "Expense";

                if($store->account_id == 42278)
                {
                    $store->off_ledger = "Yes";
                }
                
                else
                {
                    
                }
                

                $store->save();
                }
            }


        return back();
    
}
    public function journalDatatableFunction()
    {
        
        $data = Journal::orderBy('created_at', 'desc')->get();
        return(['data' => $data]);
        
    }


}
