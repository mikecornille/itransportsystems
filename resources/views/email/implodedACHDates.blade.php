@php
	$count = count($achTotals);
@endphp





<h3>Expense Paid By ACH</h3>

@for ($i = 0; $i < $count; $i++)
    {{ $achTotals[$i] }} <br>
@endfor