@php
	$count = count($revenueTotals);
@endphp







@for ($i = 0; $i < $count; $i++)
    {{ $revenueTotals[$i] }} <br>
@endfor