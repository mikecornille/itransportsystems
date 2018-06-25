@php
	$count = count($achTotals);
@endphp







@for ($i = 0; $i < $count; $i++)
    {{ $achTotals[$i] }} <br>
@endfor