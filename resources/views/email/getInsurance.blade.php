<!DOCTYPE html>
<html>
<head>
	<title>Insurance Request</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<p>{{ $info->name }},</p>
<p>Please Email or Fax Your Updated Certificate of Cargo Insurance.  The certificate we have expired(s) on {{ $info->cargo }}</p>
<p><b>Email:</b> {{ \Auth::user()->email }}</p>
<p><b>Fax:</b> 630-832-6901</p>
<p>Our certificate holder address is in the signature below.</p>
<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>111 N Addison Ave 2nd Floor</li>
<li>Elmhurst, IL 60126</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>