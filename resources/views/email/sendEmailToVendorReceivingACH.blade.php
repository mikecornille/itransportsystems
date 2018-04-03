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

<p>You will see an ACH payment within the next 1-2 business days with a reference # of {{ $info->id }} settling the shipment listed below:</p>

<ul>
<li><b>Carrier:</b> {{ $info->carrier_name }}</li>
<li><b>Lane:</b> {{ $info->pick_city . ', ' . $info->pick_state . ' to ' . $info->delivery_city . ', ' . $info->delivery_state }}</li>
<li><b>Pick Date:</b> {{ $info->pick_date }}</li>
<li><b>Delivery Date:</b> {{ $info->delivery_date }}</li>
</ul>
<ul>
<li><b>Amount Due:</b> {{ $info->carrier_rate }}</li>
<li><b>Payment Method:</b> {{ $info->payment_method }}</li>
<li><b>Vendor Invoice #:</b> {{ $info->vendor_invoice_number }}</li>
<li><b>Vendor Invoice Date:</b> {{ $info->vendor_invoice_date }}</li>
<li><b>Invoice Received Date:</b> {{ $info->approved_carrier_invoice }}</li>
</ul>

<ul>
<li>Thank You,</li>
<li>Liane</li>
<li>lianey@itransys.com</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>