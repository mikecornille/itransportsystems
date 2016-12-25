<?php 

use Carbon\Carbon;

$toString = Carbon::parse($info->billed_date)->addDays(25)->toFormattedDateString();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<style>



ul {
list-style-type: none;
}

table {

	width: 100%;
}

#amount_due {

	border-style: solid;
}

#invoice_address {
  position: absolute;
  top: 0px;
  left: 200px;
}

/*#its_logo {
  position: absolute;
  top: 10px;
  left: 10px;
}*/

.its_title {

	font-size: 20px;
	font-weight: bold;
}

</style>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div id="invoice_address">
	<ul>
		<li><h2><u><b><i>Invoice</i></b></u></h2></li>
		<li class="its_title"><i>International Transport Systems, Inc.</i></li>
		<li><i>111 North Addison Ave 2nd Floor</i></li>
		<li><i>Elmhurst, IL 60126</i></li>
		<li><i>PH: 877-663-2200 FX: 630-832-6901 Questions Email: lianey@itransys.com</i></li>
	</ul>
</div>

<hr style="height: 10px;">

<table>
  <tr>
    <td><b>CUSTOMER: {{ $info->customer_name }}</b></td>
    <td><b>BILLED DATE: {{ $info->billed_date }}</b></td>
  </tr>
	<tr>
    <td>ADDRESS: {{ $info->customer_address }}</td>
    <td>PRO NUMBER: {{ $info->id }}</td>
  </tr>

   <tr>
    <td>CITY/STATE: {{ $info->customer_city . ', ' . $info->customer_state . ' ' . $info->customer_zip }}</td>
    <td>PO #: {{ $info->po_number }}</td>
  </tr>

  <tr>
    <td>CONTACT: {{ $info->customer_contact }}</td>
    <td>BOL #: {{ $info->bol_number }}</td>
  </tr>
  <tr>
    <td>EMAIL: {{ $info->customer_email }}</td>
    <td>REF #: {{ $info->ref_number }}</td>
  </tr>
  <tr>
    <td>PHONE: {{ $info->customer_phone }}</td>
    <td></td>
  </tr>
  <tr>
    <td>FAX: {{ $info->customer_fax }}</td>
    <td></td>
  </tr>
</table>

<hr style="height: 10px;">

<h5><u><b>COMMODITY</b></u></h5>
<p>{{ $info->commodity }}</p>

<hr style="height: 10px;">

<table>
  <tr>
    <td><u><b>ORIGIN</b></u></td>
    <td><u><b>DESTINATION</b></u></td>
  </tr>
  <tr>
    <td>COMPANY: {{ $info->pick_company }}</td>
    <td>COMPANY: {{ $info->delivery_company }}</td>
  </tr>
  <tr>
    <td>ADDRESS: {{ $info->pick_address }}</td>
    <td>ADDRESS: {{ $info->delivery_address }}</td>
  </tr>
  <tr>
    <td>CONTACT: {{ $info->pick_contact }}</td>
    <td>CONTACT: {{ $info->delivery_contact }}</td>
  </tr>
  <tr>
    <td>EMAIL: {{ $info->pick_email }}</td>
    <td>EMAIL: {{ $info->delivery_email }}</td>
  </tr>
  <tr>
    <td>PHONE: {{ $info->pick_phone }}</td>
    <td>PHONE: {{ $info->delivery_phone }}</td>
  </tr>
</table>

<hr style="height: 10px;">

@if (!$info->invoice_notes == null)
<h5><u><b>SPECIAL NOTES</b></u></h5>
<p>{{ $info->invoice_notes }}</p>
<hr style="height: 10px;">
@else

@endif


@if (!$info->add_stops == null)
<h5><u><b>ADDITIONAL STOPS</b></u></h5>
<p>{{ $info->add_stops }}</p>
@else

@endif

<h2 class="text-center" id="amount_due"><i>AMOUNT DUE:</i> ${{ $info->amount_due }}.00 paid by {{ $toString }}</h2>
<h4 class="text-center"><u>THANK YOU FOR YOUR BUSINESS!</u></h4>
<h4 class="text-center"><u>HOME SITE: <i>TRANSPORTLOAD.COM</i> CUSTOMER TOOL: <i>MANAGELOADS.COM</i></u></h4>

</body>
</html>