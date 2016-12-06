<!DOCTYPE html>
<html>
<head>
	<title>Update Customer</title>
	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<h3>Status Update on ITS PRO # {{ $info->id }}</h3>
<p>{{ $info->customer_contact }},</p>
<p>Below is a status update message on the load from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<p>REF # {{ $info->ref_number }}</p>
<p>PO # {{ $info->po_number }}</p>
<p>BOL # {{ $info->bol_number }}</p>
<h3>Status Update:</h3>
<p>{{ $info->update_customer_message }}</p>
<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>