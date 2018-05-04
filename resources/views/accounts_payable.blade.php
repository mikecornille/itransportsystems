@extends('layouts.app')

@section('content')


<h1 class="text-center">Accounts Payable - ${{ $owed }} <small>vendor date = not null, not empty, carrier pay status = APPRVD</small></h1>

<table id="mainTableAccountsPayable" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Payment Method</th>
                <th>Carrier Name</th>
                <th>Carrier Rate</th>
                <th>Invoice Date</th>
                <th>Invoice Number</th>
                <th>Pay Status</th>
                <th>Due Date</th>
                <th>Aging</th>
                
              </tr>
        </thead>
        <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Payment Method</th>
                <th>Carrier Name</th>
                <th>Carrier Rate</th>
                <th>Invoice Date</th>
                <th>Invoice Number</th>
                <th>Pay Status</th>
                <th>Due Date</th>
                <th>Aging</th>
              
                
           
                

            </tr>
        </tfoot>  
   
    </table>


@endsection