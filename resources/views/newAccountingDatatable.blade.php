@extends('layouts.app')

@section('content')



<h1 class="text-center">Checking Account</h1>

   <table id="datatableNewChecking" cellspacing="0" class="stripe row-border order-column">

    <thead>
      <tr>
        <th>Date</th>
        <th>Reference #</th>
        <th>Pro #</th>
        <th>Journal #</th>
        <th>Name</th>
        <th>Account ID</th>
        <th>Payment Method</th>
        <th>Cleared</th>
        <th>Cleared Date</th>
        <th>Debit</th>
        <th>Credit</th>
        <!-- <th>Balance</th> -->
        
        
        
        
        
        
        


      </tr>
    </thead>
    <tfoot>
       <tr>
            <th>Date</th>
        <th>Reference #</th>
        <th>Pro #</th>
        <th>Journal #</th>
        <th>Name</th>
        <th>Account ID</th>
        <th>Payment Method</th>
        <th>Cleared</th>
        <th>Cleared Date</th>
        <th>Debit</th>
        <th>Credit</th>
      </tr>
        </tfoot> 
  </table>




<h1>Balance including outstanding checks: {{ $balanceOut }}</h1>
<h1>Balance with only cleared checks: {{ $balanceCleared }}</h1>





@endsection