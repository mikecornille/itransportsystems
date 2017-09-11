@php 

$count = count($info);

$count = $count - 1;


@endphp

<!DOCTYPE html>
<html>
<head>
<title>Current Carrier Safety Report</title>

<style>

ul {

	list-style-type: none;
}
</style>
</head>
<body>

<p>This email contains all the carriers we currently have hauling for us.  Special attention is needed if you find a carrier with missing info or high safety scores (especially 1-2 truck operations).</p>

<h2>To Be Loaded</h2>

<p>As of {{ $info[0][0]['fmcsa_time'] }} the OOS national average for driver was {{ $info[0][0]['oos_driver_national'] }} and vehicle was {{ $info[0][0]['oos_vehicle_national'] }}</p>

<ul>
@for ($i = 0; $i <= $count; $i++)
    
<li>Company: {{ $info[$i][0]['company'] }}</li>
<li>ID #: {{ $info[$i][0]['id'] }}</li>
<li>DOT #: {{ $info[$i][0]['dot_number'] }}</li>
<li>Allowed to Operate: {{ $info[$i][0]['allowed_to_operate'] }}</li>
<li>Operation Type: {{ $info[$i][0]['operation_type'] }}</li>
<li>FMCSA Last Updated: {{ $info[$i][0]['fmcsa_time'] }}</li>
<li>Crashes: {{ $info[$i][0]['crashes'] }}</li>
<li>Fatal Crashes: {{ $info[$i][0]['fatal_crashes'] }}</li>
<li>Number of Drivers: {{ $info[$i][0]['number_of_drivers'] }}</li>
<li>Number of Power: {{ $info[$i][0]['number_of_power'] }}</li>
<li>OOS Driver: {{ $info[$i][0]['oos_driver_company'] }}</li>
<li>OOS Vehicle: {{ $info[$i][0]['oos_vehicle_company'] }}</li>
<li>Google Results: {{ $info[$i][0]['google_carrier'] }}</li>
<br><br>
    

@endfor
</ul>




</body>
</html>