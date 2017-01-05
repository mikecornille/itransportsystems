<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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

.legal {
	font-size: 9px;
}

#pick_and_deliver {
	margin-top: 40px;
}

</style>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div id="invoice_address">
	<ul>
		<li><h2><u><b><i>Bill Of Lading</i></b></u></h2></li>
		<li class="its_title"><i>International Transport Systems, Inc.</i></li>
		<li><i>PH: 877-663-2200</i></li>
		<li><i>EMAIL: OPERATIONS@ITRANSYS.COM</i></li>
		<li><b>PAYMENT PRE-PAID BOL # {{ $info->id }}</b></li>
	</ul>
</div>

<table id="pick_and_deliver">
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
    <td>{{ $info->pick_city . ', ' . $info->pick_state . ' ' . $info->pick_zip }}</td>
    <td>{{ $info->delivery_city . ', ' . $info->delivery_state . ' ' . $info->delivery_zip }}</td>
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

<h5><u><b>COMMODITY</b></u></h5>
<p>{{ $info->commodity }}</p>

<hr style="height: 10px;">

<h5><u><b>SPECIAL NOTES</b></u></h5>
<p>{{ $info->invoice_notes }}</p>

<hr style="height: 10px;">

<h5><u><b>ADDITIONAL STOPS</b></u></h5>
<p>{{ $info->add_stops }}</p>

<p class="legal">RECEIVED, subject individually determined rates or contracts that have been agreed upon in writing between the carrier and shipper, if applicable, otherwise to the classifications and lawfully filed tariffs in effect on the date of issue of this Bill of Lading, the property described, in apparent good order, except as noted (contents and condition of contents of packages unknown), marked, consigned and destined as indicated, which said carrier (the word carrier being understood throughout this contract as meaning any person or corporation in possession of the property under contract) agrees to carry to the listed consignee and destination. It is mutually agreed, as to each carrier of all or any said property over all or any portion of said route to destination, and as to each party at any time interested in all or any of said property, that every service to be performed hereunder shall be subject to all the terms and conditions of the Uniform Domestic Straight Bill of Lading set forth (1) in Uniform Freight Classification in effect on the date hereof, if this is a rail or rail-water shipment, or (2) in the applicable motor carrier classification or tariff if this is a motor carrier shipment. Shipper is familiar with all the terms and conditions of the said bill of lading, set forth in the classification or tariff which governs the transportation of this shipment, and the said terms and conditions are hereby agreed to by the shipper and accepted for itself and its assigns. If Shipper and Carrier have entered into a master agreement, or if Shipper and Carrier subsequent to the date of this bill of lading enter into a master agreement, the terms contained herein shall be subject to the terms of such master agreement.</p>

<p>DRIVER NAME:________________________________DATE:___________</p>
<p>DRIVER SIGNATURE____________________________</p>
<p>SHIPPER NAME:________________________________DATE:___________</p>
<p>SHIPPER SIGNATURE____________________________</p>
<p>CONSIGNEE NAME:________________________________DATE:___________</p>
<p>CONSIGNEE SIGNATURE____________________________</p>




</body>
</html>