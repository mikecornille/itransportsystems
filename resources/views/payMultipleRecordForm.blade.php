@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">Pay Multiple Invoices <small>pick status towing and cancelled do not show up here</small></h1>

@if($errors->any())
<h4>You are off by: {{ $errors->first() }}</h4>

@endif
<div class="page-header">
  <h1>Running Total: <small id="subtotal"></small></h1>
</div>
<form role="form" class="form-horizontal" method="POST" action="/payMultipleRecordForm">
    
  
  {{ method_field('PATCH') }}

  {{ csrf_field() }}

<div class="well">
 <div class="form-group">
     <div class="row">
        <div class="col-md-3">
            <label class="label-control" for="datepicker_deposit_date">Deposit Date</label>
            <input type="text" class="form-control datepicker" id="datepicker_deposit_date" name="deposit_date">
        </div>
        <div class="col-xs-3">
            <label class="label-control" for="ref_or_check_num_from_customer">REFERENCE OR CHECK #</label>
            <input type="text" class="form-control" id="ref_or_check_num_from_customer" name="ref_or_check_num_from_customer">
        </div>
        <div class="col-xs-3">
            <label class="label-control" for="totalCheckAmountFromCustomer">TOTAL CHECK AMOUNT</label>
            <input type="text" class="form-control" id="totalCheckAmountFromCustomer" name="totalCheckAmountFromCustomer">
        </div>
        <div class="col-md-3">
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


<table class="table table-hover">
    <thead>
      <tr>
        <th>PRO #</th>
        <th>AMOUNT DUE</th>
        <th>AMOUNT PAID (expected value provided)</th>
        <th>NEW PAY STATUS</th>
        <th>CURRENT PAY STATUS</th>
      </tr>
    </thead>
    <tbody>


@foreach($open_loads as $load)

<input type="hidden" name="id[]" value="{{ $load->id }}">

<tr class="loadlist_row alt-colors">
        <td>{{ $load->id }}</td>
        <td>{{ $load->amount_due }}</td>
        <td><input type="text" class="form-control" id="paid_amount_from_customer" name="paid_amount_from_customer[{{ $load->id }}]" value="{{ $load->amount_due }}"></td>
        <td><label class="radio-inline"><input class="radio-buttons" type="radio" id="{{ $load->id }}" data-amount="{{ $load->amount_due }}" name="customerPayStatus[{{ $load->id }}]" value="PAID">PAID</label>
        <label class="radio-inline"><input type="radio" name="customerPayStatus[{{ $load->id }}]" value="OPEN">OPEN</label></td>
        <td>{{ $load->customerPayStatus }}</td>
</tr>

@endforeach
  </tbody>
</table>

<div class="col-xs-12" id="submit_button">
  <button class="btn btn-success form-control" type="submit">Update</button>
</div>

</form>

</div>





@endsection

