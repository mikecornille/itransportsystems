<!DOCTYPE html>
<html>
<head>
	<title>Status Request</title>
</head>
<body>
<p>{{ $info->carrier_contact }},</p>
<p>Looking for a status update on PRO # {{ $info->id }} from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<p>Below is what we have on the schedule, please let me know the drivers progress.</p>

<ul style="list-style-type: none;">
<li>Pick Up Date: {{ $info->pick_date }}</li>
<li>Pick Up Time: {{ $info->pick_time }}</li>
<li>Pick Up Status: {{ $info->pick_status }}</li>
<li>Delivery Date: {{ $info->delivery_date }}</li>
<li>Delivery Time: {{ $info->delivery_time }}</li>
<li>Commodity: {{ $info->commodity }}</li>
</ul>

<ul style="list-style-type: none;">
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>