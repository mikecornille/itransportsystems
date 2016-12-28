<!DOCTYPE html>
<html>
<head>
	<title>Internal Message</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<p>Good Day,</p>
<p>Below is a message regarding the load from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<h3>Specific Message:</h3>
<p>{{ $info->internal_message }}</p>
<h3>Internal Notes:</h3>
<p>{{ $info->internal_notes }}</p>
<h3>Additional Load Information</h3>
<ul>
<li><b>Invoice Creator:</b> {{ $info->created_by }}</li>
<li><b>PRO #:</b> {{ $info->id }}</li>
<li><b>PO #:</b> {{ $info->po_number }}</li>
<li><b>BOL #:</b> {{ $info->bol_number }}</li>
<li><b>REF#:</b> {{ $info->ref_number }}</li>
<li><b>Carrier:</b> {{ $info->carrier_name }}</li>
<li><b>Carrier Contact:</b> {{ $info->carrier_contact }}</li>
<li><b>Carrier Phone:</b> {{ $info->carrier_phone }}</li>
<li><b>Carrier Email:</b> {{ $info->carrier_email }}</li>
<li><b>Driver Name:</b> {{ $info->carrier_driver_name }}</li>
<li><b>Driver Cell:</b> {{ $info->carrier_driver_cell }}</li>
<li><b>Trailer Type:</b> {{ $info->trailer_type }}</li>
<li><b>Pick Status:</b> {{ $info->pick_status }}</li>
<li><b>Scheduled Pick Date:</b> {{ $info->pick_date . ' ' . $info->pick_time }}</li>
<li><b>Delivery Status:</b> {{ $info->delivery_status }}</li>
<li><b>Scheduled Delivery Date:</b> {{ $info->delivery_date . ' ' . $info->delivery_time }}</li>
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