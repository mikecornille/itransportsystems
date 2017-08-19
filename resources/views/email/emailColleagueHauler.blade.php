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

<p>Hello {{ $info->email_colleague_carrier }},</p>
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
<h3><u>Carrier Data Information</u></h3>
<ul>
<li><b>Company Name:</b> {{ $info->company }}</li>
<li><b>Operation Type:</b> {{ $info->operation_type }}</li>
<li><b>Number of Drivers:</b> {{ $info->number_of_drivers }}</li>
<li><b>Number of Trucks:</b> {{ $info->number_of_power }}</li>
<li><b>MC #:</b> {{ $info->mc_number }}</li>
<li><b>Address:</b> {{ $info->address }} - {{ $info->city }}, {{ $info->state }} {{ $info->zip }}</li>
<li><b>Contact Name:</b> {{ $info->contact }}</li>
<li><b>Email:</b> {{ $info->email }}</li>
<li><b>Phone:</b> {{ $info->phone }}</li>
<li><b>Driver Name:</b> {{ $info->driver_name }}</li>
<li><b>Driver Phone:</b> {{ $info->driver_phone }}</li>
</ul>
<h3><u>!!!IMPORTANT CARRIER SAFETY INFO!!!</u></h3>
<ul>
<li><b>ITS Pulled Data (should always be same day you are viewing this email):</b> {{ $info->fmcsa_time }}</li>
<li><b>ITS Active Status:</b> {{ $info->active }}</li>
<li><b>FMCSA Active Status:</b> {{ $info->allowed_to_operate }}</li>
<li><b>Fatal Crashes:</b> {{ $info->fatal_crashes }}</li>
<li><b>General Crashes:</b> {{ $info->crashes }}</li>
<li><b>Google Results:</b> {{ $info->google_carrier }}</li>
<li><b>OOS Driver National Avg:</b> {{ $info->oos_driver_national }}</li>
<li><b>OOS Driver Carrier:</b> {{ $info->oos_driver_company }}</li>
<li><b>OOS Vehicle National Avg:</b> {{ $info->oos_vehicle_national }}</li>
<li><b>OOS Vehicle Carrier:</b> {{ $info->oos_vehicle_company }}</li>
</ul>
<h3><u>Carrier Permanent Notes</u></h3>
<p>{{ $info->permanent_notes }}</p>
<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>