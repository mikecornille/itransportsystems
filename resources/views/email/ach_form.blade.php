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

<p>Thank you for hauling our shipment.  Below is a link that will allow you to submit your ACH payment information.  Please verify your company's information below and click the link.</p>

<ul>
<li><b>Company:</b> {{ $info->company }}</li>
<li><b>DOT #:</b> {{ $info->dot_number }}</li>
<li><b>Address:</b> {{ $info->address }}</li>
<li><b>City:</b> {{ $info->city }}</li>
<li><b>State:</b> {{ $info->state }}</li>
<li><b>Zip:</b> {{ $info->zip }}</li>
<li><b>Your Form:</b><a href="{{ route('hauler.ach.form', $info->ach_token) }}">ACH Info Form Link</li>

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