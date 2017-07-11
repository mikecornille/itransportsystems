<!DOCTYPE html>
<html>
<head>
	

	<style>

	ul {

	list-style-type: none;
}


	</style>

</head>
<body>
<h3>Important Message:</h3>
<h4>International Transport Systems will arrange a rollback to safely assist the unload on the shipment from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}.  Please allow for open and accurate communication so we can schedule accordingly.  Towable boom lifts, by nature of their configuration, can be difficult to unload even if your truck has ramps.  Please call or email ITS when the driver is 1 hour from delivery.</h4>

<h5>General Load info:</h5>
<ul>
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