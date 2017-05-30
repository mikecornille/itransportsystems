<!DOCTYPE html>
<html>
<head>
	<title>Broker Carrier Contract Request</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<p>{{ $info->name }},</p>
<p>MC # {{ $info->mc_number }}</p>
<p>Attached you will find the Broker/Carrier Contract from International Transport Systems, Inc.  Please fill out the Broker Agreement on the 3rd page and send it back along with your Updated Cargo Insurance, Authority, and W9 via fax 630-832-6901 or email {{ \Auth::user()->email }}</p>

<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>