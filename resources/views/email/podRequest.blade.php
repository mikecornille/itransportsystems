<!DOCTYPE html>
<html>
<head>
	<title>POD Request</title>
</head>
<body>
<h3>We need your Freight Invoice to pay you ${{ $info->carrier_rate }}</h3>
<p>{{ $info->carrier_contact }},</p>
<p>Please Send Invoice with Signed Bill of Lading on PRO # {{ $info->id }} from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<p>The amount you are due is ${{ $info->carrier_rate }}</p>
<ul style="list-style-type: none;">
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>