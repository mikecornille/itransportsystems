@php
	$count = count($revenueTotals);
	$count2 = count($revenueSumsACH);
	
@endphp





<h3>Check Sums By Date</h3>

@for ($i = 0; $i < $count; $i++)
    {{ $revenueTotals[$i] }} <br>
@endfor

<h3>ACH Sums By Date</h3>

@for ($i = 0; $i < $count2; $i++)
    {{ $revenueSumsACH[$i] }} <br>
@endfor
