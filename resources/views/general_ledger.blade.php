@extends('layouts.app')

@section('content')



<h1 class="text-center">Transactions</h1>

   <table id="generalLedgerTable" cellspacing="0" class="stripe row-border order-column">

    <thead>
      <tr>
        <th>Action Date</th>
        <th>Reference #</th>
        <th>Type Description</th>
        <th>Journal Entry #</th>
        <th>PRO #</th>
        <th>Account Name</th>
        <th>Account ID #</th>
        <th>Payment Method</th>
        <th>Cleared</th>
        <th>Cleared Date</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        <!-- <th>Running Total</th> -->
        
        
        
        
        


      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Action Date</th>
        <th>Reference #</th>
        <th>Type Description</th>
        <th>Journal Entry #</th>
        <th>PRO #</th>
        <th>Account Name</th>
        <th>Account ID #</th>
        <th>Payment Method</th>
        <th>Cleared</th>
        <th>Cleared Date</th>
        <th>Payment Amount</th>
        <th>Deposit Amount</th>
        <!-- <th>Running Total</th> -->
        
        
        
        

      </tr>
    </tfoot>  
  </table>


@PHP setlocale(LC_MONETARY, 'en_US.UTF-8'); @ENDPHP 

<h2>Balance : {{ money_format('%.2n', $balance) }}</h2>






@endsection