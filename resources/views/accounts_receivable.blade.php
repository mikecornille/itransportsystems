@extends('layouts.app')

@section('content')


<h1 class="text-center">Accounts Receivable - ${{ $owed }}</h1>

<table id="mainTableAccountsReceivable" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Customer Name</th>
                <th>Billed Date</th>
                <th>Due Date</th>
                <th>Aging</th>
                
              </tr>
        </thead>
        <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Customer Name</th>
                <th>Billed Date</th>
                <th>Due Date</th>
                <th>Aging</th>
              
                
           
                

            </tr>
        </tfoot>  
   
    </table>


@endsection