@extends('layouts.app')

@section('content')

<h1 class="text-center">Welcome, {{ \Auth::user()->name }}</h1>
<h2 class="text-center">Today's Date is {{ $currentDate }}</h2>

<div class="month"  style="padding-left:300px;">
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

<div style="margin-left: 300px;">
	<ul style="list-style-type: none;">
		<li class="text-left">Robert Bansberg has posted {{ $rbNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">Robert Bansberg has created {{ $rbRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">Robert Bansberg has created {{ $rbInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Robert Bansberg has been responsible for ${{ $rbMoneyBilled }}.00 billed to customers and paid out ${{ $rbMoneyPaidOut }}.00 to carriers for a profit margin of {{ $rbPercent }}%.</li>
	</ul>
</div>

<div style="margin-left: 300px;">
	<ul style="list-style-type: none;">
		<li class="text-left">Matt King has posted {{ $mkNotes }} notes in month {{ $month }}. </li>
		<li class="text-left">Matt King has created {{ $mkRateCons }} Rate Confirmations in month {{ $month }}. </li>
		<li class="text-left">Matt King has created {{ $mkInvoices }} Invoices in month {{ $month }}. </li>
		<li class="text-left">Matt King has been responsible for ${{ $mkMoneyBilled }}.00 billed to customers and paid out ${{ $mkMoneyPaidOut }}.00 to carriers for a profit margin of {{ $mkPercent }}%.</li>
	</ul>
</div>




@endsection