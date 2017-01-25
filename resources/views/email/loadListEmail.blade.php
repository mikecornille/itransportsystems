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

<?php
$currentDateTime = '08/04/2010 22:15:00';
$newDateTime = date('A', strtotime($currentDateTime));
?>
<p>Good @if($newDateTime === 'PM') Afternoon @else Morning @endif [INSERT NAME],</p>

<p>Thank you for this opportunity, below is the quotation you requested containing all parameters unique to this shipment.</p>

<ul>
<li>Customer: {{ $info->customer }}</li>
<li>Lane: {{ $info->pick_city . ', ' . $info->pick_state . ' to ' . $info->delivery_city . ', ' . $info->delivery_state }}</li>
<li>Commodity: {{ $info->commodity }}</li>
<li>Dimensions: {{ $info->length . 'ft x ' . $info->width . 'ft x ' . $info->height . 'ft ' . $info->weight . 'lbs.'}}</li>
<li>Pick Date: {{ $info->pick_date . ' ' . $info->pick_time }}</li>
<li>Delivery Date: {{ $info->delivery_date . ' ' . $info->delivery_time }}</li>
<li>Trailer Type: {{ $info->trailer_type }}</li>
<li>Special Notes: {{ $info->special_instructions }}</li>
<li><b>Rate: ${{ $info->billing_money }}.00 flat rate, no additional costs</b></li>
</ul>

<p>If you would like to proceed with transportation or have questions please respond back in one of these ways: click reply to this email, generate an email to {{ \Auth::user()->email }}, or call 877-663-2200 and ask for {{ \Auth::user()->name }}.</p>

<ul>
<li>Thank You!</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>