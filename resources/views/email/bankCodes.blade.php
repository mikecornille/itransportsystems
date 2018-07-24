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


<p>Bank Codes</p>

<ul>
<li><b>Other Deposit:</b> 174</li>
<li><b>Check Paid:</b> 475</li>
<li><b>ACH Credit Received:</b> 142</li>
<li><b>Pre-authorized ACH Debit (auto): </b> 455</li>
<li><b>Incoming Money Transfer:</b> 195</li>
<li><b>Miscellaneous Fees (analysis charge):</b> 698</li>
<li><b>Miscellaneous Credit:</b> 399</li>
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