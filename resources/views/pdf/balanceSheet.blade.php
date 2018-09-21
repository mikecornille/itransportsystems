@PHP

setlocale(LC_MONETARY, 'en_US');

$total_assets = $mb_checking_account_total + $mb_money_market_total + $accounts_receivable_total + $rent_deposit;

@ENDPHP

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>



/*table {
    width: 100%;
}

th {
    height: 50px;
}*/

th, td {
    padding: 5px;
}


</style>

</head>
<body>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div>
	<center><h4>Balance Sheet International Transport Systems, Inc. {{ $start_date }} to {{ $end_date }}</h4></center>
</div>

<table>
  <tr>
  	<th><u>ASSETS</u></th>
    <th><u>{{ $start_date }} to {{ $end_date }}</u></th>
  </tr>
  <tr>
    <th>Current Assets</th>
  </tr>
  <tr>
    <th>MB Checking Account</th>
    <th>{{ '$' . number_format($mb_checking_account_total, 2) }}</th>
  </tr>
  <tr>
    <th>MB Money Market</th>
    <th>{{ '$' . number_format($mb_money_market_total, 2) }}</th>
  </tr>
 <tr>
    <th>Accounts Receivable</th>
    <th>{{ '$' . number_format($accounts_receivable_total, 2) }}</th>
  </tr>
  <tr>
    <th>Rent Deposit</th>
    <th>{{ '$' . number_format($rent_deposit, 2) }}</th>
  </tr>
  <tr>
    <th>Total Assets</th>
    <th>{{ '$' . number_format($total_assets, 2) }}</th>
  </tr>

  <tr>
    <th><u>LIABILITIES</u></th>
    <th><u>{{ $start_date }} to {{ $end_date }}</u></th>
  </tr> 
  <tr>
    <th>Accounts Payable</th>
    <th>{{ '$' . number_format($accounts_payable_total, 2) }}</th>
  </tr>
  <tr>
    <th><u>EQUITY</u></th>
    <th><u>{{ $start_date }} to {{ $end_date }}</u></th>
  </tr> 
  <tr>
    <th>Capital Stock</th>
    <th>{{ '$' . number_format($capital_stock, 2) }}</th>
  </tr>
  <tr>
    <th>Distributions</th>
    <th>{{ '$' . number_format($distributions, 2) }}</th>
  </tr>
  <tr>
    <th>Net Income</th>
    <th>{{ '$' . number_format($net_income, 2) }}</th>
  </tr>
</table>



</body>
</html>