@extends('layouts.app')

@section('content')


<h1 class="text-center" style="font-family: serif;">Welcome, {{ \Auth::user()->name }}!</h1>

<div class="container">

<div class="row">
  <h2 class="text-center" style="font-family: serif;">Totals for: {{ $currentDate }}</h2>
  <div class="col-md-5 well" style="font-family: serif; background-color: aliceblue;">{{ $rateConDailyTotals }} Rate Confirmations Today</div>
  <div class="col-md-5 col-md-offset-2 well" style="font-family: serif; background-color: aliceblue;">{{ $invoiceDailyTotals }} Invoices Today</div>
</div>

<div class="row">
  <h2 class="text-center" style="font-family: serif;">Personal Totals All Time</h2>
  <div class="col-md-2 well" style="font-family: serif; background-color: aliceblue;">{{ $posts }} Notes</div>
  <div class="col-md-4 col-md-offset-1 well" style="font-family: serif; background-color: aliceblue;">{{ $rateCons }} Rate Confirmations</div>
  <div class="col-md-4 col-md-offset-1 well" style="font-family: serif; background-color: aliceblue;">{{ $invoices }} Invoices</div>
</div>

<div class="well">
<h2 class="text-center" style="font-family: serif;">Booked Not Loaded</h2>
<table id="personal_status" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Pick Status</th>
                <th>Short Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Pick City</th>
                <th>Deliver Date</th>
                <th>Deliver Time</th>
                <th>Delivery City</th>
                <th>Delivery Status</th>
              </tr>
        </thead>
         <!-- <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Customer</th>
                <th>Pick City</th>
                <th>Delivery City</th>
            </tr>
        </tfoot>  --> 
    </table>
</div>
<div class="well">
<h2 class="text-center" style="font-family: serif;">Loaded Not Delivered</h2>
<table id="personal_status_loaded" cellspacing="0" class="stripe row-border order-column hover" style="border-collapse: collapse; margin-left: 10px; font-size: 12px; table-layout: fixed; word-wrap:break-word;">

        <thead>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Pick Status</th>
                <th>Short Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Pick City</th>
                <th>Deliver Date</th>
                <th>Deliver Time</th>
                <th>Delivery City</th>
                <th>Delivery Status</th>
              </tr>
        </thead>
         <!-- <tfoot>
            <tr>
            <th></th>
                <th>Pro</th>
                <th>Status</th>
                <th>Pick Date</th>
                <th>Pick Time</th>
                <th>Customer</th>
                <th>Pick City</th>
                <th>Delivery City</th>
            </tr>
        </tfoot>  --> 
    </table>
</div>

    <div class="col-md-6">


<h3 class="text-left" style="font-family: serif;">Unsigned Rate Cons Current Mo. ({{ $unsigned_count }})</h3>
	<ul style="list-style-type: none;">
	@foreach ($unsigned as $unsign)
	    <li class="text-left"><u>PRO # {{ $unsign->id }} is unsigned.</u></li>
	    <li class="text-left text-primary">Rate Con Creator: {{ $unsign->rate_con_creator }}</li>
	    <li class="text-left">Rate Con Creation Date: {{ $unsign->rate_con_creation_date }}</li>
	    <li class="text-left">Short Status Note: {{ $unsign->quick_status_notes }}</li>
	    <li class="text-left">Dispatcher Phone: {{ $unsign->carrier_contact }} at {{ $unsign->carrier_phone }}</li>
	    <li class="text-left">Dispatcher Email: {{ $unsign->carrier_email }}</li>
	    <br>
	@endforeach
	</ul>

</div>
<div class="col-md-6">

<h3 class="text-left" style="font-family: serif;">Personal Unsigned Rate Cons</h3>
	<ul style="list-style-type: none;">
	@foreach ($personal_unsigned as $unsign)
	    <li class="text-left"><u>PRO # {{ $unsign->id }} is unsigned.</u></li>
	    <li class="text-left text-primary">Rate Con Creator: {{ $unsign->rate_con_creator }}</li>
	    <li class="text-left">Rate Con Creation Date: {{ $unsign->rate_con_creation_date }}</li>
	    <li class="text-left">Short Status Note: {{ $unsign->quick_status_notes }}</li>
	    <li class="text-left">Dispatcher Phone: {{ $unsign->carrier_contact }} at {{ $unsign->carrier_phone }}</li>
	    <li class="text-left">Dispatcher Email: {{ $unsign->carrier_email }}</li>
	    <br>
	@endforeach
	</ul>
</div>
</div>






@endsection