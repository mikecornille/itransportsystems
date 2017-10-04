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

<h3>CUT AND PASTE THE EMAILS BELOW IN THE BCC FIELD AND DELETE FROM BODY OF MESSAGE</h3>


<p>You did a load for us in the past so I wanted to offer this one to you.</p>

<p>We have an available load picking up in {{ $info->pick_city }}, {{ $info->pick_state }} going to {{ $info->delivery_city }}, {{ $info->delivery_state }}.</p>

<p>We are shipping a {{ $info->commodity }} at a total length and weight of {{ $info->length . 'ft x ' . $info->width . 'ft x ' . $info->height . 'ft ' . $info->weight . 'lbs'}}.</p>

<p>This load requires a {{ $info->trailer_type }} or similar.</p>

<p>This is just a courtesy email, no need to respond if you don't have any availability.</p>


<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>