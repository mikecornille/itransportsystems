@extends('layouts.app')

@section('content')

<div class="container">

<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>
<h2 class="text-center">Today's Date is {{ $currentDate }}</h2>

<div class="month">
	<form role="form" class="form-horizontal" method="POST" action="/admin">

		{{ csrf_field() }}



		<div class="well" style="width: 300px;">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						<label class="label-control" for="month">Choose Month</label>
						<select name="month" id="month" class="form-control">
							<option value="Choose">Choose</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
				</div>



				<button type="submit" style="margin-top: 10px;" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> NEW</button>

			</div>
		</div>
	</div>
</form>

<h2 class="text-center">Your team has created {{ $rateConDailyTotals }} Rate Confirmations and {{ $invoiceDailyTotals }} Invoices today.</h2>
<h3 class="text-center">Total Billed Out: {{ $totalBilledForMonth }}</h3>
<h3 class="text-center">Total Paid Out: {{ $totalPaidForMonth }}</h3>
<h3 class="text-center">Total Profit: {{ $totalProfitForMonth }}</h3>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>Robert Bansberg</u></li>
		<li class="text-left">{{ $rbNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">{{ $rbRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">{{ $rbInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $rbMoneyBilled }}.00 billed to customers and paid out ${{ $rbMoneyPaidOut }}.00 to carriers for a profit margin of {{ $rbPercent }}%.</li>
	</ul>
</div>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>Matt King</u></li>
		<li class="text-left">{{ $mkNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">{{ $mkRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">{{ $mkInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $mkMoneyBilled }}.00 billed to customers and paid out ${{ $mkMoneyPaidOut }}.00 to carriers for a profit margin of {{ $mkPercent }}%.</li>
	</ul>
</div>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>AJ Mesik</u></li>
		<li class="text-left">{{ $ajNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">{{ $ajRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">{{ $ajInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $ajMoneyBilled }}.00 billed to customers and paid out ${{ $ajMoneyPaidOut }}.00 to carriers for a profit margin of {{ $ajPercent }}%.</li>
	</ul>
</div>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>Matt Carnahan</u></li>
		<li class="text-left">{{ $mcNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">{{ $mcRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">{{ $mcInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $mcMoneyBilled }}.00 billed to customers and paid out ${{ $mcMoneyPaidOut }}.00 to carriers for a profit margin of {{ $mcPercent }}%.</li>
	</ul>
</div>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>Joe Mowrer</u></li>
	    <li class="text-left">{{ $jmInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">{{ $jmRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $jmMoneyBilled }}.00 billed to customers and paid out ${{ $jmMoneyPaidOut }}.00 to carriers for a profit margin of {{ $jmPercent }}%.</li>
	</ul>
</div>

<div>
	<ul style="list-style-type: none;">
	    <li class="text-left"><u>Mike Bruschuk</u></li>
	    <li class="text-left">{{ $mbInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">{{ $mbRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">Responsible for ${{ $mbMoneyBilled }}.00 billed to customers and paid out ${{ $mbMoneyPaidOut }}.00 to carriers for a profit margin of {{ $mbPercent }}%.</li>
	</ul>
</div>

</div>


@endsection