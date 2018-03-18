@extends('layouts.app')

@section('content')


<h1 class="text-center">General Ledger</h1>

<table id="generalLedger" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            
                <th>Pro</th>
                <th>Customer</th>
                
                
              </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Pro</th>
                <th>Customer</th>
                
              
                
           
                

            </tr>
        </tfoot>  
   
    </table>


@endsection