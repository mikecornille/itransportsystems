<!DOCTYPE html>
<html>
<head>
	<title>Colleague Carrier Info</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>

<p>Hello {{ $info->colleague_email }},</p>

<h3><u>Specific Load Notes</u></h3>
<ul>
<li><b>Load Route:</b> {{ $info->load_route }}</li>
<li><b>Carrier Rate:</b> {{ $info->current_carrier_rate }}</li>
<li><b>Trailer Type:</b> {{ $info->current_trailer_type }}</li>
<li><b>Current City:</b> {{ $info->current_city_location }}</li>
<li><b>Miles From Pick:</b> {{ $info->current_miles_from_pick }}</li>
<li><b>Delivery Schedule:</b> {{ $info->delivery_schedule }}</li>
<li><b>Additional Notes:</b> {{ $info->load_info }}</li>
</ul>


<h3><u>Carrier Permanent Notes</u></h3>
<p>{{ $info->permanent_notes }}</p>

<h3><u>Carrier Data Information</u></h3>
<ul>
<li><b>Company Name:</b> {{ $info->company }}</li>
<li><b>DOT #:</b> {{ $info->dot_number }}</li>
<li><b>MC #:</b> {{ $info->mc_number }}</li>
<li><b>Address:</b> {{ $info->address }} - {{ $info->city }}, {{ $info->state }} {{ $info->zip }}</li>
<li><b>Contact Name:</b> {{ $info->name }}</li>
<li><b>Email:</b> {{ $info->email }}</li>
<li><b>Phone:</b> {{ $info->phone }}</li>
<li><b>Driver Name:</b> {{ $info->driver_name }}</li>
<li><b>Driver Phone:</b> {{ $info->driver_phone }}</li>

</ul>

<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>