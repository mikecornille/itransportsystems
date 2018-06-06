@PHP
$total_checking_saving = $mbFinancialBalance + $mm_FinancialBalance + $accounts_receivable;
@ENDPHP	

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
  	<th><u>ASSETS</u></th>
    <th><u>{{ $start_date }} to {{ $end_date }}</u></th>
  </tr>
  <tr>
  	<td>MB Finanacial</td>
    <td>${{ $mbFinancialBalance }}</td>
  </tr>
  <tr>
    <td>Money Market</td>
    <td>${{ $mm_FinancialBalance }}</td>
  </tr>
  

  <tr>
  	<td>Accounts Receivable</td>
    <td>${{ $accounts_receivable }}</td>
  </tr>
  <tr>
    <td><b><i>Total Assets</i></b></td>
    <td><b><i>${{ $total_checking_saving }}</i></b></td>
  </tr>
  
  <tr>
  	<th><u>LIABILITIES & EQUITY</u></th>
    <th><u>{{ $start_date }} to {{ $end_date }}</u></th>
  </tr>
  <tr>
  	<th>LIABILITIES</th>
    <th></th>
  </tr>
  <tr>
    <td>Accounts Payable</td>
    <td>${{ $accounts_payable }}</td>
  </tr>
  <tr>
    <td><b><i>Total Accounts Payable</i></b></td>
    <td><b><i>${{ $accounts_payable }}</i></b></td>
  </tr>

  <tr>
  	<th>EQUITY</th>
    <th></th>
  </tr>
  <tr>
    <td>Capital Stock</td>
    <td>${{ $capital_stock }}</td>
    
  </tr>
  <tr>
    <td>Distributions</td>
    <td>${{ $distributions }}</td>
    
  </tr>
  <tr>
    <td>Retained Earnings</td>
    <td>${{ $retained_earnings }}</td>
    
  </tr>
  <tr>
    <td>Net Income</td>
    <td>${{ $net_income }}</td>
    
  </tr>
  <tr>
    <td><b><i>Total Equity</i></b></td>
    <td><b><i>${{ $total_equity }}</i></b></td>
  </tr>

</table>



</body>
</html>