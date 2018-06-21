@php
	$count = count($info);
@endphp







@for ($i = 0; $i < $count; $i++)
    Reference Number # {{ $info[$i] }} <br>
@endfor