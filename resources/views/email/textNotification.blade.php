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

<h3>You received a Text Message on ITS PRO # {{ $load->id }}</h3>


<a href="http://itransportsystems.com/edit/url?id=91770">Click to here to jump to load</a>



<h3>Current Short Status:</h3>
<p>{{ $load->quick_status_notes }}</p>
<ul>

</body>
</html>