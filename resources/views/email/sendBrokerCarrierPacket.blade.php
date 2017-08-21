<!DOCTYPE html>
<html>
<head>
	<title>Broker/Carrier Contract Request</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<p>{{ $info->contact }},</p>
<p>DOT # {{ $info->dot_number }}</p>
<p>Attached you will find the Broker/Carrier Contract from International Transport Systems, Inc.  Please fill out the Broker Agreement on the 3rd page and send it back along with your Updated Cargo Insurance showing International Transport Systems as certificate holder (address below), Authority, and W9 by email to {{ \Auth::user()->email }}</p>

<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>111 North Addison Ave 2nd FL</li>
<li>Elmhurst, IL 60126</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>