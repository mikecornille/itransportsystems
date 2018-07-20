@php
	$count = count($info);
@endphp





<h3>Revenue - Organized By Reference Number</h3>

@for ($i = 0; $i < $count; $i++)
    Reference # {{ $info[$i] }} <br>
@endfor