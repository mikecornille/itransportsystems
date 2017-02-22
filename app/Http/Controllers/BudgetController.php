<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Budget::orderBy('monthly_amount', 'desc')->get();

        $postsSum = Budget::all()->sum('monthly_amount');
        
        return view('budget', compact('posts', $posts))->with('postsSum', $postsSum);
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

            'description' => 'required',
            'monthly_amount' => 'required',

        ]);

        $store = New Budget($request->all());
        
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
        $post = Budget::findOrFail($id);



        return view('editBudget', compact('post', $post));

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

             'description' => 'required',
            'monthly_amount' => 'required',           
              
        ]);

        $post = Budget::findOrFail($id);

        $post->update($request->all());

       

        return redirect()->route('budget.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Budget::findOrFail($id);

        $post->delete();

        return redirect()->route('budget.index');
    }
}
