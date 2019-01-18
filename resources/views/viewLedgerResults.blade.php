@extends('layouts.app')

@section('content')

<div class="container">

	@PHP setlocale(LC_MONETARY, 'en_US.UTF-8'); @ENDPHP 

<h3>Starting Balance : {{ money_format('%.2n', $startingBalance) }}</h3>

<h3>Ending Balance : {{ money_format('%.2n', $endingBalance) }}</h3>

<table class="table">
	<thead>
		<tr>
			<th>Date</th>
			<th>Name</th>
			<th>Reference Number</th>
			<th>Deposit Amount</th>
			<th>Payment Amount</th>
			<th>Running Total</th>
		</tr>	
	</thead>
	<tbody>

@foreach($data as $d)
	<tr>
		<td>{{ $d->date }}</td>
		<td>{{ $d->account_name }}</td>
		<td>{{ $d->reference_number }}</td>
		<td class="text-primary">{{ $d->deposit_amount ? '$' . $d->deposit_amount : '' }}</td>
		<td class="text-danger">{{ $d->payment_amount ? '$' . $d->payment_amount : '' }}</td>
		<td>{{ money_format('%.2n', $d->running_total) }}</td>
	</tr>
@endforeach
	</tbody>
</table>
</div>
@endsection