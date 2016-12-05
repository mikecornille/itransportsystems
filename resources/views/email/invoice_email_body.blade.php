<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>

<style>

ul {

	list-style-type: none;
}

</style>
</head>
<body>
<p>{{ $info->carrier_contact }},</p>

<p>International Transport Systems Invoice for PRO # {{ $info->id }} from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>



<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>