<!DOCTYPE html>
<html>
<head>
	<title>Email Carrier</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>

<h4>Thank you for your interest in this shipment!  Please answer the questions below and a representitive will call you back shortly.  You can copy and paste the below template and fill in the answers.</h4>

<h3>Company Info</h3>
<ul>
<li>Dispatcher Name:</li>
<li>Dispatcher Phone:</li>
<li>Driver Name:</li>
<li>Driver Cell #:</li>
<li>Insurance Company Email (for Certificate Holder Requests):</li>
</ul>

<h3>Remit To Info (Please enter where we send the checks for payment)</h3>
<ul>
<li>Remit Name:</li>
<li>Remit Address:</li>
<li>Remit City:</li>
<li>Remit State:</li>
<li>Remit Zip:</li>
</ul>

<h3>Specific Load Info</h3>
<ul>
<li>What city is your driver currently in:</li>
<li>Is he/she empty or do they need to get off loaded:</li>
<li>What time could they pick up:</li>
<li>What trailer type will you use for this load (please specify length of trailer and type):</li>
<li>How many chains does the driver have:</li>
<li>Does the driver have Personal Protective Equipment (PPE):</li>
<li>When do you plan on delivering this shipment:</li>
</ul>


<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>111 N Addison Ave 2nd FL</li>
<li>Elmhurst, IL 60126</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>