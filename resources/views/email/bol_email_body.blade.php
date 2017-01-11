<!DOCTYPE html>
<html>
<head>
	<title>Email BOL</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<h3>Bill of Lading from ITS regarding PRO # {{ $info->id }}</h3>

<p>Below is a Bill of Lading on the load from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>
<p>Driver must use the attached Bill of Lading for the above load.  If the freight cannot be secured properly call 630-832-6900 immediately.  Upon delivery, driver must have the receiver sign the bill of lading.</p>
<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>