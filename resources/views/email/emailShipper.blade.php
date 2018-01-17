<!DOCTYPE html>
<html>
<head>
	<title>Email Shipper</title>

	<style>

	ul {

	list-style-type: none;
}
	</style>
</head>
<body>

<p>{{ $info->pick_contact }},</p>

<p>Below is information regarding the shipment we are coming in to pick up.</p>

<ul>
	<li><b>C/O International Transport Systems, Inc.</b></li>
	
	
	@if($info->trailer_for_search == "Flatbed" || 
		$info->trailer_for_search == "Stepdeck" ||
		$info->trailer_for_search == "Hot Shot" ||
		$info->trailer_for_search == "Lowboy" ||
		$info->trailer_for_search == "Landoll" ||
		$info->trailer_for_search == "Towing")
	
	<li><b>Trailer Type:</b> OPEN</li>

	@elseif($info->trailer_for_search == "Conestoga" || 
			$info->trailer_for_search == "Van" || 
			$info->trailer_for_search == "Straight Truck" || 
			$info->trailer_for_search == "Flatbed")

	<li><b>Trailer Type:</b> ENCLOSED</li>

	@elseif($info->trailer_for_search == "Power")

	<li><b>Trailer Type:</b> POWER ONLY</li>

	@elseif($info->trailer_for_search == "Auto Carrier")

	<li><b>Trailer Type:</b> AUTO CARRIER</li>

	@elseif($info->trailer_for_search == "Choose")

	<li><b>Trailer Type:</b> WILL NOTIFY</li>

	@endif
	

	<li><b>Driver's Name:</b> {{ $info->carrier_driver_name }}</li>
	<li><b>BOL Number:</b> {{ $info->bol_number }}</li>
	<li><b>Pick ETA:</b> {{ $info->pick_date . ' ' . $info->pick_time }}</li>
	<li><b>Delivery ETA:</b> {{ $info->delivery_date . ' ' . $info->delivery_time }}</li>
</ul>

<h3>Commodity for BOL # {{ $info->bol_number }}</h3>
<p>{{ $info->commodity }}</p>

<h3>Freight Route:</h3>

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
</table>



<p>If anything changes or does not look correct, please email or call right away.</p>
<ul>
<li>Thank You,</li>
<li>{{ \Auth::user()->name }}</li>
<li>{{ \Auth::user()->email }}</li>
<li style="font-size: 20px;"><b>International Transport Systems, Inc.</b></li>
<li>PH: 630-832-6900</li>
</ul>
</body>
</html>