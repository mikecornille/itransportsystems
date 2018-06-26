@php
	$count = count($revenueTotals);
	$count2 = count($revenueSumsACH);
	
@endphp







@for ($i = 0; $i < $count; $i++)
    {{ $revenueTotals[$i] }} <br>
@endfor

<h1>ACH Sums</h1>

@for ($i = 0; $i < $count2; $i++)
    {{ $revenueSumsACH[$i] }} <br>
@endfor
