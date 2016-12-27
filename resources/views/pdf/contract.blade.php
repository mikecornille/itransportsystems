<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

ul {
list-style-type: none;
}

#rate_con_address {
  position: absolute;
  top: 0px;
  left: 200px;
}

.its_title {
	font-size: 20px;
	font-weight: bold;
}

.page-break {
    page-break-after: always;
}

.ten_requirements {
	font-size: 12px;
}

/*.carrier_rate {

	border: 1px solid black;
}*/

table {

	width: 100%;
}

.text_sections {
	margin-top: 10px;
}

#latch_des {
	font-size: 12px;
	font-style: italic;
}


</style>

</head>
<body>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div id="rate_con_address">
	<ul>
		<li><h4><u><b><i>Load Confirmation (NOT A <strike>BILL OF LADING</strike>)</i></b></u></h4></li>
		<li class="its_title"><i>International Transport Systems, Inc.</i></li>
		<li><i>111 North Addison Ave 2nd Floor</i></li>
		<li><i>Elmhurst, IL 60126</i></li>
		<li><i>PH: 877-663-2200 FX: 630-832-6901 Email Invoices: molly@itransys.com</i></li>
	</ul>
</div>

<table style="margin-top: 30px;">
  <tr>
    <td><b>CARRIER: {{ $info->carrier_name }} MC # {{ $info->carrier_mc }}</b></td>
    <td>CREATED DATE: {{ $info->creation_date }}</td>
  </tr>
  <tr>
    <td>ADDRESS: {{ $info->carrier_address }}</td>
    <td>PRO NUMBER: {{ $info->id }}</td>
  </tr>
  <tr>
    <td>CONTACT: {{ $info->carrier_contact }}</td>
    <td><b>CARRIER RATE: ${{ $info->carrier_rate }}.00</b></td>
  </tr>
  <tr>
    <td>EMAIL: {{ $info->carrier_email }}</td>
    <td>BOL #: {{ $info->bol_number }}</td>
  </tr>
  <tr>
    <td>PHONE: {{ $info->carrier_phone }}</td>
    <td>REF #: {{ $info->ref_number }}</td>
  </tr>
  <tr>
    <td>FAX: {{ $info->carrier_fax }}</td>
    <td></td>
  </tr>
  <tr>
    <td>DRIVERS NAME: {{ $info->carrier_driver_name }}</td>
    <td></td>
  </tr>
  <tr>
    <td>DRIVERS CELL: {{ $info->carrier_driver_cell }}</td>
    <td></td>
  </tr>
  <tr>
    <td style="font-size: 15px;"><b><i>TRAILER TYPE: {{ $info->trailer_type }}</i></b></td>
    <td></td>
  </tr>
</table>


<table class="text_sections">
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
    <td>PHONE: {{ $info->pick_phone }}</td>
    <td>PHONE: {{ $info->delivery_phone }}</td>
  </tr>
   <tr>
    <td><b><i><u>PICK DATE/TIME: {{ $info->pick_date . ' ' . $info->pick_time }}</u></i></b></td>
    <td><b><i><u>DELIVERY DATE/TIME: {{ $info->delivery_date . ' ' . $info->delivery_time }}</u></i></b></td>
  </tr>
</table>


<p id="latch_des">***CHECK ALL LATCHES AND ENGINE COVERS BEFORE LEAVING THE SHIPPER, MAKE SURE LOADED WITH COWLING / COVER HINGES TOWARD FRONT, LATCHES TOWARD REAR TO ENSURE THEY DO NOT BLOW OPEN IN TRANSIT***</p>


<div class="text_sections">
	<p><u><b>COMMODITY</b></u></p>
	<p>{{ $info->commodity }}</p>
</div>


@if (!$info->add_stops == null)
<div class="text_sections">
<h5><u><b>ADDITIONAL STOPS</b></u></h5>
<p>{{ $info->add_stops }}</p>
</div>
@else

@endif

<div class="text_sections">
<h5><u><b>SPECIAL NOTES</b></u></h5>
<p>{{ $info->special_ins }}</p>
</div>

<h5 class="text-center"><b>ONCE DELIVERED CALL 877-663-2200 TO PROVIDE THE NAME OF WHO SIGNED FOR THE SHIPMENT</b></h5>
<h4 class="text-center"><b><u>** DO NOT USE AS A DELIVERY RECEIPT / THIS IS NOT A BILL OF LADING **</u></b></h4>
<p class="text-center"><i>Page 1 of 2</i></p>

<div class="page-break"></div>

<div id="rate_con_ref_numbers" style="margin-top: 20px;">
	<ul>
		<li><b>CREATED DATE: {{ $info->creation_date }}</b></li>
		<li><b>PRO NUMBER: {{ $info->id }}</b></li>
		<li><b>CARRIER RATE: ${{ $info->carrier_rate }}.00</b></li>
	</ul>
</div>

<div id="rate_con_address">
	<ul>
		<li class="its_title"><i>International Transport Systems, Inc.</i></li>
		<li><i>111 North Addison Ave 2nd Floor</i></li>
		<li><i>Elmhurst, IL 60126</i></li>
		<li><i>PH: 877-663-2200 FX: 630-832-6901 Email Invoices: molly@itransys.com</i></li>
	</ul>
</div>


<h2 class="text-center" style="margin-top: 20px;"><u>SERVICE REQUIREMENTS</u></h2>

<p class="ten_requirements"><b>1. PERSONAL PROTECTIVE EQUIPMENT (PPE) REQUIRES THAT DRIVERS MUST HAVE A LONG SLEEVE SHIRT, LONG PANTS, STEEL TOED BOOTS, SAFETY VEST, SAFETY GLASSES, AND HARD HAT ON THEIR PERSON WHEN ON SITE.  FAILURE TO ARRIVE ON SITE PRE-DRESSED WITH ALL PPE WILL RESULT IN A $250.00 FINE.  INITIALIZE_______</b></p>

<p class="ten_requirements">2. DRIVERS MUST CONDUCT THEMSELVES IN A PROFESSIONAL MANNER AND MUST AVOID ANY CONFLICT OR DEBATE WITH THE SHIPPER AND RECEIVER.  IF ANY SITUATION ARISES THE DRIVER IS TO CALL 630-832-6900 IMMEDIATELY.  INITIALIZE_______</p>

<p class="ten_requirements">3. DRIVERS MUST CONFIRM THEY LOADED THE SPECIFIED COMMODITY DESCRIPTION, PIECE COUNT, AND IDENTIFYING NUMBERS.  IF THERE IS A DISCREPANCY CALL 630-832-6900.  INITIALIZE________</p>

<p class="ten_requirements">4. DRIVERS MUST SECURE THE LOAD PER THE SHIPPERS INSTRUCTIONS FOR SAFE AND SECURE TRANSPORT WITH CHAINS OR STRAPS.  MINIMUM OF 1 CHAIN FOR EVERY 5,000LBS OF EQUIPMENT.  TRAILER MUST NOT HAVE BROKEN FLOOR BOARDS.  INITIALIZE_______</p>

<p class="ten_requirements">5. DRIVERS MUST MAKE SURE THEY ARE LEGAL HEIGHT BEFORE LEAVING SHIPPER.  IF OVER-HEIGHT PLEASE CALL 630-832-6900.  INITIALIZE_______</p>

<p class="ten_requirements">6. IF THE INSTRUCTIONS ON INTERNATIONAL TRANSPORT SYSTEMS RATE CONFIRMATION CONFLICTS WITH THE INSTRUCTIONS ON THE SHIPPERS BILL OF LADING, CONTACT THE BROKER IMMEDIATELY AT 630-832-6900.  DO NOT LEAVE SHIPPER UNTIL DISCREPANCY IS RESOLVED.  INITIALIZE_______</p>

<p class="ten_requirements">7. ALL RATES AGREED UPON BY INTERNATIONAL TRANSPORT SYSTEMS AND THE CARRIER ARE CONFIDENTIAL AND NOT TO BE DISCUSSED WITH OTHER COMPANIES OR DRIVERS.  INITIALIZE_______</p>

<p class="ten_requirements">8. DOUBLE BROKERING AND SOLICITING THE SHIPPER ARE PROHIBITED.  INITIALIZE_______</p>

<p class="ten_requirements">9. CARRIER AGREES THE DRIVER HAS ENOUGH HOURS TO MEET TIME FRAME SPECIFIED ON THE RATE CONFIRMATION AND FMCSA HOURS REGULATIONS.  INITIALIZE_______</p>

<p class="ten_requirements">10. ALL ACCESSORIAL CHARGES MUST BE PRE APPROVED BY INTERNATIONAL TRANSPORT SYSTEMS.  INITIALIZE_______</p>

<h4>ACCEPTANCE SIGNATURE_____________________</h4>
<h4>PRINTED NAME_____________________</h4>
<h4>DATE SIGNED_____________________</h4>

<h2 class="text-center" style="margin-top: 20px;"><u>BILLING REQUIREMENTS</u></h2>
<p class="ten_requirements">PLEASE EMAIL YOUR INVOICE ALONG WITH SIGNED PROOF OF DELIVERY TO MOLLY@ITRANSYS.COM.  ALL DOCUMENTS MUST BE LEGIBLE AND CLEAR IN A SINGLE ATTACHED PDF FILE.  IF YOU WOULD LIKE TO BE PAID WITHIN 1 WEEK PLEASE WRITE "QUICK PAY" ON YOUR INVOICE AND DEDUCT 5% FROM THE TOTAL AMOUNT DUE.</p>

<h5 class="text-center"><b>ONCE DELIVERED CALL 877-663-2200 TO PROVIDE THE NAME OF WHO SIGNED FOR THE SHIPMENT</b></h5>
<h4 class="text-center"><b><u>** DO NOT USE AS A DELIVERY RECEIPT / THIS IS NOT A BILL OF LADING **</u></b></h4>
<p class="text-center"><i>Page 2 of 2</i></p>


</body>
</html>