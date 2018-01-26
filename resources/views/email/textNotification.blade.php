<!DOCTYPE html>
<html>
<head>
	<title>Status Request</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>

<h3>You received a Text Message on ITS PRO # {{ $info->id }}</h3>

<a href="{{ 'http://itransportsystems.com/edit/url?id=' . $info->id }}" />





<h3>Current Short Status:</h3>
<p>{{ $info->quick_status_notes }}</p>
<ul>

</body>
</html>