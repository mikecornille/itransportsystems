<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>



table {
    width: 100%;
}

th {
    height: 50px;
}


</style>

</head>
<body>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div>
	<center><h4>Balance Sheet for International Transport Systems, Inc. {{ $start_date }} to {{ $end_date }}</h4></center>
</div>

<table>
  <tr>
  	
    <th>ASSETS</th>
    <th>{{ $start_date }} to {{ $end_date }}</th>
  </tr>
  <tr>
  	
    <td>MB Finanacial</td>
    <td>${{ $mbFinancialBalance }}</td>
  </tr>
  <tr>
    
    <td>Money Market</td>
    <td>${{ $mm_FinancialBalance }}</td>
  </tr>
  
</table>

</body>
</html>