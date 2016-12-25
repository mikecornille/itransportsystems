<!DOCTYPE html>
<html>
<head>
	<title>Colleague Carrier Info</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>
<p>{{ $info->email }},</p>
<p>{{ $info->colleague_email }},</p>
<p>{{ $info->mc_number }},</p>
<p>{{ $info->cargo }},</p>
<p>{{ $info->load_info }},</p>
<p>{{ $info->permanent_notes }},</p>
<p>{{ $info->name }},</p>
<p>{{ $info->company }},</p>

<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>