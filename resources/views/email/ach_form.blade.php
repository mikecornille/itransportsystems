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
<p>Below is your link</p>
<h3>Specific Message:</h3>

<ul>
<li><b>Customer:</b> {{ $info->dot_number }}</li>
<li><b>Invoice Creator:</b> {{ $info->address }}</li>
<li><a href="{{ route('hauler.ach.form', $info->ach_token) }}">Form</li>

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