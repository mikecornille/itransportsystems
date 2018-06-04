@php 

$count = count($info);

$count = $count - 1;


@endphp


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




<ul>
	@for ($i = 0; $i <= $count; $i++)
    	<li>Company: {{ $info[$i][1] }}</li>
    	<li>ID: {{ $info[$i][2] }}</li>
		<li>Total Billed: ${{ $info[$i][0] }}.00</li>
		<li>Total Paid: ${{ $info[$i][3] }}.00</li>
		<li>Total Profit: ${{ $info[$i][4] }}.00</li>
		<li>Profit Margin: {{ $info[$i][5] }}%</li>
		
		<br><br>
	@endfor
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