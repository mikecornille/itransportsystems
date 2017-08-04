<!DOCTYPE html>
<html>
<head>
	<title>Rate Confirmation</title>

<style>

ul {

	list-style-type: none;
}

.ten_requirements {
	font-size: 12px;
}

.text_sections {
	margin-top: 10px;
}

table {
  border: 2px solid black;
  display: inline-block;
}

</style>
</head>
<body>
<p>{{ $info->carrier_contact }},</p>

<p>If you prefer not to print out and sign the attached PDF contract you may agree electronically.  Please read through the entire message and reply with: I, [insert your name] , agree this email correspondence is a legally binding contract.</p>

<p><b>CARRIER AGREES THE DRIVER'S E-LOG DISPLAYS THE CORRECT DATE, LOCATION, SUFFICIENT ENGINE/DRIVER HOURS, AND SUFFICIENT MILES TO MEET THE TIME FRAME SPECIFIED ABOVE.  CARRIER AGREES ALL FMCSA REGULATIONS PERTAINING TO DRIVER'S E-LOG ARE MET.</b></p>

<p><b>DRIVER MUST HAVE LONG SLEEVE SHIRT, LONG PANTS, STEEL TOED SHOES, SAFETY VEST, SAFETY GLASSES, AND HARD HAT.  NO PETS ALLOWED.</b></p>

<table style="margin-top: 30px;">
  <tr>
    <td><b>CARRIER:</b> {{ $info->carrier_name }} MC # {{ $info->carrier_mc }}</td>
    <td><b>CREATED DATE:</b> {{ $info->creation_date }}</td>
  </tr>
  <tr>
    <td><b>ADDRESS:</b> {{ $info->carrier_address }}</td>
    <td><b>PRO NUMBER:</b> {{ $info->id }}</td>
  </tr>
  <tr>
    <td><b>CONTACT:</b> {{ $info->carrier_contact }}</td>
    <td><b>CARRIER RATE:</b> ${{ $info->carrier_rate }}.00</td>
  </tr>
  <tr>
    <td><b>EMAIL:</b> {{ $info->carrier_email }}</td>
    <td><b>BOL #:</b> {{ $info->bol_number }}</td>
  </tr>
  <tr>
    <td><b>PHONE:</b> {{ $info->carrier_phone }}</td>
    <td><b>REF #:</b> {{ $info->ref_number }}</td>
  </tr>
  <tr>
    <td><b>FAX:</b> {{ $info->carrier_fax }}</td>
    <td></td>
  </tr>
  <tr>
    <td><b>DRIVERS NAME:</b> {{ $info->carrier_driver_name }}</td>
    <td></td>
  </tr>
  <tr>
    <td><b>DRIVERS CELL:</b> {{ $info->carrier_driver_cell }}</td>
    <td></td>
  </tr>
  <tr>
    <td style="font-size: 15px;"><b>TRAILER TYPE:</b> {{ $info->trailer_type }}</td>
    <td></td>
  </tr>
</table>


<table class="text_sections">
  <tr>
    <td><u><b>ORIGIN</b></u></td>
    <td><u><b>DESTINATION</b></u></td>
  </tr>
  <tr>
    <td><b>COMPANY:</b> {{ $info->pick_company }}</td>
    <td><b>COMPANY:</b> {{ $info->delivery_company }}</td>
  </tr>
  <tr>
    <td><b>ADDRESS:</b> {{ $info->pick_address }}</td>
    <td><b>ADDRESS:</b> {{ $info->delivery_address }}</td>
  </tr>
  <tr>
    <td>{{ $info->pick_city . ', ' . $info->pick_state }}</td>
    <td>{{ $info->delivery_city . ', ' . $info->delivery_state }}</td>
  </tr>
  <tr>
    <td><b>CONTACT:</b> {{ $info->pick_contact }}</td>
    <td><b>CONTACT:</b> {{ $info->delivery_contact }}</td>
  </tr>
  <tr>
    <td><b>PHONE:</b> {{ $info->pick_phone }}</td>
    <td><b>PHONE:</b> {{ $info->delivery_phone }}</td>
  </tr>
   <tr>
    <td><b>PICK DATE/TIME:</b> {{ $info->pick_date . ' ' . $info->pick_time }}</td>
    <td><b>DELIVERY DATE/TIME:</b> {{ $info->delivery_date . ' ' . $info->delivery_time }}</td>
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

<h2 class="text-center" style="margin-top: 20px;"><u>SERVICE REQUIREMENTS</u></h2>

<p class="ten_requirements"><b>1. PERSONAL PROTECTIVE EQUIPMENT (PPE) REQUIRES THAT DRIVERS MUST HAVE A LONG SLEEVE SHIRT, LONG PANTS, STEEL TOED BOOTS, SAFETY VEST, SAFETY GLASSES, AND HARD HAT ON THEIR PERSON WHEN ON SITE.  FAILURE TO ARRIVE ON SITE PRE-DRESSED WITH ALL PPE WILL RESULT IN A $250.00 FINE.  INITIALIZE_______</b></p>

<p class="ten_requirements">2. CARRIER AGREES THE DRIVER'S E-LOG DISPLAYS THE CORRECT DATE, LOCATION, SUFFICIENT ENGINE/DRIVER HOURS, AND SUFFICIENT MILES TO MEET THE TIME FRAME SPECIFIED ABOVE.  CARRIER AGREES ALL FMCSA REGULATIONS PERTAINING TO DRIVER'S E-LOG ARE MET. INITIALIZE_______</p>

<p class="ten_requirements">3. DRIVERS MUST CONDUCT THEMSELVES IN A PROFESSIONAL MANNER AND MUST AVOID ANY CONFLICT OR DEBATE WITH THE SHIPPER AND RECEIVER.  IF ANY SITUATION ARISES THE DRIVER IS TO CALL 630-832-6900 IMMEDIATELY.  INITIALIZE_______</p>

<p class="ten_requirements">4. DRIVERS MUST CONFIRM THEY LOADED THE SPECIFIED COMMODITY DESCRIPTION, PIECE COUNT, AND IDENTIFYING NUMBERS.  IF THERE IS A DISCREPANCY CALL 630-832-6900.  INITIALIZE________</p>

<p class="ten_requirements">5. DRIVERS MUST SECURE THE LOAD PER THE SHIPPERS INSTRUCTIONS FOR SAFE AND SECURE TRANSPORT.  MINIMUM OF 1 CHAIN FOR EVERY 5,000LBS OF EQUIPMENT UNLESS OTHERWISE SPECIFIED.  TRAILER MUST NOT HAVE BROKEN FLOOR BOARDS.  INITIALIZE_______</p>

<p class="ten_requirements">6. DRIVERS MUST MAKE SURE THEY ARE LEGAL HEIGHT BEFORE LEAVING SHIPPER.  IF OVER-HEIGHT PLEASE CALL 630-832-6900.  INITIALIZE_______</p>

<p class="ten_requirements">7. IF THE INSTRUCTIONS ON INTERNATIONAL TRANSPORT SYSTEMS RATE CONFIRMATION CONFLICTS WITH THE INSTRUCTIONS ON THE SHIPPERS BILL OF LADING, CONTACT THE BROKER IMMEDIATELY AT 630-832-6900.  DO NOT LEAVE SHIPPER UNTIL DISCREPANCY IS RESOLVED.  INITIALIZE_______</p>

<p class="ten_requirements">8. ALL RATES AGREED UPON BY INTERNATIONAL TRANSPORT SYSTEMS AND THE CARRIER ARE CONFIDENTIAL AND NOT TO BE DISCUSSED WITH OTHER COMPANIES OR DRIVERS.  INITIALIZE_______</p>

<p class="ten_requirements">9. DOUBLE BROKERING AND SOLICITING THE SHIPPER ARE PROHIBITED.  INITIALIZE_______</p>

<p class="ten_requirements">10. ALL ACCESSORIAL CHARGES MUST BE PRE APPROVED BY INTERNATIONAL TRANSPORT SYSTEMS.  WAITING TIME WILL NOT BE APPROVED IF THE CARRIER ARRIVES LATE TO THE SHIPPER OR CONSIGNEE.  INITIALIZE_______</p>

<h2><u>ADDITIONAL INFO</u></h2>

<p>The rate confirmation is for the broker and the carrier only.  DO NOT use it as a Bill of Lading (BOL).  Call or email when the driver is loaded at the shipper(s) and when unloaded at the destination(s).  We also request a copy of the signed Proof of Delivery (POD) to be sent to us once delivered.  It can be sent via fax (630-832-6901), E-mail, or picture text (630-750-1718).</p>

<p>Contact our accounting for invoicing inquiries.  They do offer Quick Pay options.  Accounting P#: 630-833-1618  E-mail: molly@itransys.com</p>

<ul>
<li><b>Adding us as a Certificate Holder:</b></li>
<li>International Transport Systems, Inc.</li>
<li>111 N Addison Ave 2nd Floor</li>
<li>Elmhurst, IL 60126</li>
<li>Phone: 877-663-2200</li>
</ul>

<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li>International Transport Systems, Inc.</li>
<li>PH: 630-832-6900</li>
</ul>


</body>
</html>