<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

use App\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Employee::all();
        $employees = User::all()->pluck('name','name');

        return view('employee', compact('posts', $posts, 'employees', $employees));
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

              'name' => 'required',             
              'month' => 'required',
              'year' => 'required',
              'employee_type' => 'required',
              'weekly_draw' => 'required',
              'ncm' => 'required',
              'commission' => 'required',
              'bonus' => 'required',
              'additional' => 'required',

        ]);

        $store = New Employee($request->all());
        
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
        $post = Employee::findOrFail($id);

         return view('editEmployee', compact('post', $post));
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
              'month' => 'required',
              'year' => 'required',
              'employee_type' => 'required',
              'weekly_draw' => 'required',
              'ncm' => 'required',
              'commission' => 'required',
              'bonus' => 'required',
              'additional' => 'required',            
              
        ]);

        $post = Employee::findOrFail($id);

        $post->update($request->all());

       

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Employee::findOrFail($id);

        $post->delete();

        return redirect()->route('employee.index');
    }
}
