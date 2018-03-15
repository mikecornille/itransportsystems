@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">Pay Multiple Invoices</h1>

<form role="form" class="form-horizontal" method="POST" action="/payMultipleRecordForm">
    
  
  {{ method_field('PATCH') }}

  {{ csrf_field() }}

<div class="well">
 <div class="form-group">
     <div class="row">
        <div class="col-md-4">
            <label class="label-control" for="datepicker_deposit_date">Deposit Date</label>
            <input type="text" class="form-control datepicker" id="datepicker_deposit_date" name="deposit_date">
        </div>
        <div class="col-xs-4">
            <label class="label-control" for="ref_or_check_num_from_customer">REFERENCE OR CHECK #</label>
            <input type="text" class="form-control" id="ref_or_check_num_from_customer" name="ref_or_check_num_from_customer">
        </div>
        <div class="col-md-4">
            <label for="payment_method_from_customer" class="label-control">PAYMENT METHOD</label>
                <select name="payment_method_from_customer" id="payment_method_from_customer" class="form-control">
                     <option value="Choose">Choose</option>
                     <option value="CHECK">CHECK</option>
                     <option value="ACH">ACH</option>
                </select>
        </div>
    </div>
</div>
</div>

@foreach($open_loads as $load)
    <div class="well">
    <input type="hidden" name="id[]" value="{{ $load->id }}">
    <h3>PRO # {{ $load->id }} - AMOUNT DUE ${{ $load->amount_due }} - PAY STATUS: {{ $load->customerPayStatus }}</h3>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label class="radio-inline"><input type="radio" name="customerPayStatus[{{ $load->id }}]" value="PAID">PAID</label>
                <label class="radio-inline"><input type="radio" name="customerPayStatus[{{ $load->id }}]" value="OPEN">OPEN</label>

            </div>
            <div class="col-md-3">
                <label class="label-control" for="paid_amount_from_customer">PAID AMOUNT FROM CUSTOMER</label>
                <input type="text" class="form-control" id="paid_amount_from_customer" name="paid_amount_from_customer[{{ $load->id }}]" value="{{ $load->amount_due }}">

            </div>
        </div>
        
    </div>
</div>


@endforeach


<div class="col-xs-12" id="submit_button">
  <button class="btn btn-success form-control" type="submit">Update</button>
</div>

</form>

</div>




@endsection