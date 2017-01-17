@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>
<h2 class="text-center">Today's Date is {{ $currentDate }}</h2>

<div class="date_range">
	<form role="form" class="form-horizontal" method="POST" action="/admin">

		{{ csrf_field() }}

		<div class="well" style="width: 300px; margin: 0 auto;">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
				   		<label class="label-control" for="start_date">Start Date</label>
				   		<input type="text" class="form-control" id="datepicker_snapshot_start" name="start_date">
				 	</div>
				 	<div class="col-xs-6">
				   		<label class="label-control" for="end_date">End Date</label>
				   		<input type="text" class="form-control" id="datepicker_snapshot_end" name="end_date">
				 	</div>
				</div>
						<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> GO</button>
			</div>
		</div>
	</form>
</div>
		
	<h2 class="text-center">Your team has created {{ $rateConDailyTotals }} Rate Confirmations and {{ $invoiceDailyTotals }} Invoices today.</h2>
	@if($start_date)
	<h3 class="text-center">Your results are within: {{ $start_date . ' and ' . $end_date }}</h3>
	@endif
	<h3 class="text-center">Total Billed Out: {{ $totalBilledForMonth }}</h3>
	<h3 class="text-center">Total Paid Out: {{ $totalPaidForMonth }}</h3>
	<h3 class="text-center">Total Profit: {{ $totalProfitForMonth }}</h3>

	<div>
		<ul style="list-style-type: none;">
		    <li class="text-left"><u>Robert Bansberg</u></li>
			<li class="text-left">{{ $rbNotes }} notes </li>
			<li class="text-left">Ambassador for {{ $rbAmbassador }} companies </li>
			<li class="text-left">{{ $rbRateCons }} Rate Confirmations </li>
			<li class="text-left">{{ $rbInvoices }} Invoices </li>
			<li class="text-left">Responsible for ${{ $rbMoneyBilled }}.00 billed to customers and paid out ${{ $rbMoneyPaidOut }}.00 to carriers for a margin of {{ $rbPercent }}%</li>
		</ul>
    </div>

    <div>
		<ul style="list-style-type: none;">
		    <li class="text-left"><u>Matt King</u></li>
			<li class="text-left">{{ $mkNotes }} notes </li>
			<li class="text-left">Ambassador for {{ $mkAmbassador }} companies </li>
			<li class="text-left">{{ $mkRateCons }} Rate Confirmations </li>
			<li class="text-left">{{ $mkInvoices }} Invoices </li>
			<li class="text-left">Responsible for ${{ $mkMoneyBilled }}.00 billed to customers and paid out ${{ $mkMoneyPaidOut }}.00 to carriers for a margin of {{ $mkPercent }}%</li>
		</ul>
    </div>



</div>












@endsection