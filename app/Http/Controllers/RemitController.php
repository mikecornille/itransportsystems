<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Remit;

class RemitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Remit::all();
        
        return view('remit', compact('posts', $posts));
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

            'name' => 'required|max:39',
            'address' => 'max:50',
            'email' => 'email', 
            'accounting_email' => 'email', 

        ]);

        $store = New Remit($request->all());
        
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
        $post = Remit::findOrFail($id);

         return view('editRemit', compact('post', $post));
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

             'name' => 'required',
            'address' => 'required',
            'city' => 'required', 
            'state' => 'required', 
            'zip' => 'required',           
              
        ]);

        $post = Remit::findOrFail($id);

        $post->update($request->all());

       

        return redirect()->route('remit.index');
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
