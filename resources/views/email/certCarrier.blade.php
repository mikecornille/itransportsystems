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
<p>Please contact your Cargo Insurance provider and have them email a copy of the certificate to {{ \Auth::user()->email }}<p>
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