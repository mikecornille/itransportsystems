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
      
      {!! Form::model($getCustomer, ['route' => ['customer_accounting_update', $getCustomer->id], 'method' => 'PUT']) !!}
        @include('partials.accountingCustomerForm', ['submitButtonText' => 'Update Customer with No Actions'])
      {!! Form::close() !!}

    </div>
    
  </div>
  

</div>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pro</th>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Billed Date</th>
        <th>Amount Due</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
        <th>Reference #</th>
        <th>Deposit Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getCustomerLoads as $load)
      	<?php
			

		?>
		
      <tr class="loadlist_row alt-colors">
      	<td><a href="/edit/url?id={{ $load->id }}">{{ $load->id }}</a></td>
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $load->billed_date }}</td>
		<td>{{ $load->amount_due }}</td>
        <td>{{ $load->paid_amount_from_customer }}</td>
        <td>{{ $load->payment_method_from_customer }}</td>
        <td>{{ $load->ref_or_check_num_from_customer }}</td>
        <td>{{ $load->deposit_date }}</td>
        


      </tr>
      
      @endforeach
    </tbody>
  </table>





@endsection

