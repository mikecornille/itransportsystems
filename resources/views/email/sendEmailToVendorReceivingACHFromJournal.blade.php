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

<p>You will see an ACH payment within the next 1-2 business days with a reference # of {{ $info->id }} settling the invoice listed below:</p>

<ul>
<li><b>Account Name:</b> {{ $info->account_name }}</li>
<li><b>Reference Number:</b> {{ $info->reference_number }}</li>
<li><b>Invoice Date:</b> {{ $info->invoice_date_journal }}</li>
<li><b>Memo:</b> {{ $info->memo }}</li>
<li><b>Amount Due:</b> {{ $info->payment_amount }}</li>
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