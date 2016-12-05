<!DOCTYPE html>
<html>
<head>
	<title>Internal Message</title>
</head>
<body>
<h3>Internal message regarding PRO # {{ $info->id }}</h3>
<p>Good Day,</p>
<p>Below is a message on the load from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<h3>Message:</h3>
<p>{{ $info->internal_message }}</p>
<ul style="list-style-type: none;">
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>