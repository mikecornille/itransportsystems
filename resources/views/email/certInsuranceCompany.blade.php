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
<p>Can you please reply to this email with a current Cargo Insurance Certificate for:<p>
<ul>
<li><b>COMPANY:</b> {{ $info->company }}</li>
<li><b>ADDRESS:</b> {{ $info->address }}</li>
<li><b>CITY:</b> {{ $info->city . ', ' . $info->state . ' ' . $info->zip }}</li>
<li><b>MC #:</b> {{ $info->mc_number }}</li>
<li><b>DOT #:</b> {{ $info->dot_number }}</li>
<li><b>CONTACT:</b> {{ $info->contact }}</li>
<li><b>PHONE #:</b> {{ $info->phone }}</li>
</ul>
<p>Please list the below as the certificate holder:<p>
<ul>
<li><b>International Transport Systems, Inc.</b></li>
<li><b>111 North Addison Ave 2nd FL</b></li>
<li><b>Elmhurst, IL 60126</b></li>
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