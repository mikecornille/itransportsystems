<!DOCTYPE html>
<html>
<head>
	<title>Rate Confirmation</title>

<style>

ul {

	list-style-type: none;
}

</style>
</head>
<body>
<p>{{ $info->carrier_contact }},</p>
<p><b>DRIVER MUST HAVE LONG SLEEVE SHIRT, LONG PANTS, STEEL TOED SHOES, SAFETY VEST, SAFETY GLASSES, AND HARD HAT.  NO PETS ALLOWED.</b></p>
<p>Attached is the Load Confirmation for PRO # {{ $info->id }} from {{ $info->pick_city }}, {{ $info->pick_state }} to {{ $info->delivery_city }}, {{ $info->delivery_state }}</p>

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