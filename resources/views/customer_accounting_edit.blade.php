@extends('layouts.app')

@section('content')



<div class="container">

<div class="row">
    <div class="col-md-10">

      @if (!empty($error_message))
      <div class="alert alert-danger alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ $error_message }}</strong> Click the X at the far right to close this notification.
      </div>
      @endif

      @if (isset($flash_message))
      <div class="alert alert-success alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ $flash_message }}</strong> Click the X at the far right to close this notification.
      </div>
      @endif

      <a href="{{ URL::to('/payMultipleRecordForm/' . $getCustomer->id) }}"><b>Pay Multiple Records</b></a>
      
      {!! Form::model($getCustomer, ['route' => ['customer_accounting_update', $getCustomer->id], 'method' => 'PUT']) !!}
        @include('partials.accountingCustomerForm', ['submitButtonText' => 'Update Customer with No Actions'])
      {!! Form::close() !!}

    </div>

    <div class="col-md-2">
      <div class="btn-group" id="action_buttons">
        <button type="button" class="btn btn-primary">Actions</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-header">Aging Report (pick status of towing does not show up)</li>
          <li><a href="{{ URL::to('/agingReport/' . $getCustomer->id) }}"><b>Aging Report</b></a></li>
        </ul>
      </div>
      
    </div>
    
  </div>
  

</div>

<h3 class="text-center"><u>Open Invoices (does not show records with towing or cancelled in pick status field) - Total Owed: ${{ $sumOwedFromCustomer }}</u></h3>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Pro</th>
        <th>Customer ID #</th>
        <th>Pick</th>
        <th>Pick Status</th>
        <th>Delivery</th>
        <th>Delivery Status</th>
        <th>Billed Date</th>
        <th>Amount Due</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
        <th>Reference #</th>
        <th>Deposit Date</th>
        <th>Pay Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getCustomerLoadsNotPaid as $load)
      	<?php
			

		?>
		
      <tr class="loadlist_row alt-colors">
      	<td><a href="/edit/url?id={{ $load->id }}">{{ $load->id }}</a></td>
      	<td>{{ $load->customer_id }}</td>
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->pick_status }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $load->delivery_status }}</td>
        <td>{{ $load->billed_date }}</td>
		    <td>{{ $load->amount_due }}</td>
        <td>{{ $load->paid_amount_from_customer }}</td>
        <td>{{ $load->payment_method_from_customer }}</td>
        <td>{{ $load->ref_or_check_num_from_customer }}</td>
        <td>{{ $load->deposit_date }}</td>
        <td>{{ $load->customerPayStatus }}</td>
        


      </tr>
      
      @endforeach
    </tbody>
  </table>

  <h3 class="text-center"><u>Paid Invoices - Total Paid: ${{ $sumPaidFromCustomer }}</u></h3>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Pro</th>
        <th>Customer ID #</th>
        <th>Pick</th>
        <th>Pick Status</th>
        <th>Delivery</th>
        <th>Delivery Status</th>
        <th>Billed Date</th>
        <th>Amount Due</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
        <th>Reference #</th>
        <th>Deposit Date</th>
        <th>Pay Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getCustomerLoadsPaid as $load)
      	<?php
			

		?>
		
      <tr class="loadlist_row alt-colors">
      	<td><a href="/edit/url?id={{ $load->id }}">{{ $load->id }}</a></td>
      	<td>{{ $load->customer_id }}</td>
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->pick_status }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $load->delivery_status }}</td>
        <td>{{ $load->billed_date }}</td>
        <td>{{ $load->amount_due }}</td>
        <td>{{ $load->paid_amount_from_customer }}</td>
        <td>{{ $load->payment_method_from_customer }}</td>
        <td>{{ $load->ref_or_check_num_from_customer }}</td>
        <td>{{ $load->deposit_date }}</td>
        <td>{{ $load->customerPayStatus }}</td>
        


      </tr>
      
      @endforeach
    </tbody>
  </table>








@endsection

