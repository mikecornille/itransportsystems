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

      <h3>Carrier ID # {{ $gethauler->id }} - Amount Paid : ${{ $sumPaidOutToCarrier }} Amount Owed: ${{ $owedToCarrier }}</h3>
      
      {!! Form::model($gethauler, ['route' => ['hauler.accounting', $gethauler->id], 'method' => 'PUT']) !!}
        @include('partials.accountingCarrierForm', ['submitButtonText' => 'Update Carrier with No Actions'])
      {!! Form::close() !!}

    </div>
    <div class="col-md-2">
      <div class="btn-group" id="action_buttons">
        <button type="button" class="btn btn-primary">Actions</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-header">Send ACH Request</li>
          <li><a href="{{ URL::to('/ach_email/' . $gethauler->id) }}"><b>Send ACH Request</b></a></li>
        </ul>
      </div>
      
    </div>
  </div>
  

</div>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Pro</th>
        <th>Pick</th>
        <th>Delivery</th>
        <th>Delivery Date</th>
        <th>Delivery Status</th>
        <th>Carrier Rate</th>
        <th>Invoice Number</th>
        <th>Invoice Date</th>
        <th>Vendor Pay Date</th>
        <th>Payment Method</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($getCarrierLoads as $load)
        <?php
      

    ?>
    
      <tr class="loadlist_row alt-colors">
        <td><a href="/edit/url?id={{ $load->id }}">{{ $load->id }}</a></td>
        <td>{{ $load->pick_city . ', ' . $load->pick_state }}</td>
        <td>{{ $load->delivery_city . ', ' . $load->delivery_state }}</td>
        <td>{{ $load->delivery_date }}</td>
        <td>{{ $load->delivery_status }}</td>
        <td>{{ $load->carrier_rate }}</td>
        <td>{{ $load->vendor_invoice_number }}</td>
        <td>{{ $load->vendor_invoice_date }}</td>
        <td>{{ $load->approved_carrier_invoice }}</td>
        <td>{{ $load->payment_method }}</td>

        
      </tr>
      
      @endforeach
    </tbody>
  </table>

@endsection