@extends('layouts.app')

@section('content')


<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>


<div style="margin-left: 300px;">
<h3 class="text-left">Today's Date is {{ $currentDate }}</h3>
<h3 class="text-left">There have been {{ $rateConDailyTotals }} Rate Confirmations and {{ $invoiceDailyTotals }} Invoices typed up today.</h3>

</div>

<div style="margin-left: 300px;">
<h3 class="text-left">You've written...</h3>
<h3 class="text-left">{{ $posts }} Notes</h3> 
<h3 class="text-left">{{ $rateCons }} Rate Confirmations</h3>
<h3 class="text-left">{{ $invoices }} Invoices</h3>
</div>


<div style="margin-left: 300px;">
<h3 class="text-left">Unsigned Rate Confirmations</h3>
	<ul style="list-style-type: none;">
	@foreach ($unsigned as $unsign)
	    <li class="text-left"><u>PRO # {{ $unsign->id }} is unsigned.</u></li>
	    <li class="text-left">Rate Con Creator: {{ $unsign->rate_con_creator }}</li>
	    <li class="text-left">Short Status Note: {{ $unsign->quick_status_notes }}</li>
	    <li class="text-left">Dispatcher Phone: {{ $unsign->carrier_contact }} at {{ $unsign->carrier_phone }}</li>
	    <li class="text-left">Dispatcher Email: {{ $unsign->carrier_email }}</li>
	@endforeach
	</ul>
</div>



@endsection