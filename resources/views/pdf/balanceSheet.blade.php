@PHP

$qb_checking_account = 107118.31;
$qb_saving_account = 482312.68;
$qb_accounts_receivable = 1233012.51;
$qb_allowance_for_bad_debts = -12174.55;
$qb_other_receivable_damage = 850.00;
$qb_rent_deposit = 4192.71;

$qb_total_current_assets = $qb_checking_account + $qb_saving_account + $qb_accounts_receivable + $qb_allowance_for_bad_debts + $qb_other_receivable_damage + $qb_rent_deposit;

$qb_accounts_payable = 890607.60;
$qb_accrued_state_income_tax = -6471.00;
$qb_capital_stock = 2000.00;
$qb_distributions = -2279067.56;
$qb_retained_earnings = 2912947.32;
$qb_net_income = 295295.30;

$qb_total_liability_equity = $qb_accounts_payable + $qb_accrued_state_income_tax + $qb_capital_stock + $qb_distributions + $qb_retained_earnings + $qb_net_income;


@ENDPHP

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>


th, td {
    padding: 3px;
}

th {
  width:200px;
}


</style>

</head>
<body>



<div id="its_logo">
	<img src="images/its_logo_162_150.png" class="img-responsive" alt="ITS Logo">
</div>

<div>
	<center><h4>Balance Sheet from Quickbooks as of April 30, 2018</h4></center>
</div>

<table>
  <tr>
  	<th><u>ASSETS</u></th>
  </tr>
  <tr>
    <th><i>MB Checking Account</i></th>
    <th>{{ '$' . number_format($qb_checking_account, 2) }}</th>
  </tr>
  <tr>
    <th><i>MB Saving Account</i></th>
    <th>{{ '$' . number_format($qb_saving_account, 2) }}</th>
  </tr>
  <tr>
    <th><i>Accounts Receivable</i></th>
    <th>{{ '$' . number_format($qb_accounts_receivable, 2) }}</th>
  </tr>
  <tr>
    <th><i>Allowance for Bad Debts</i></th>
    <th>{{ '$' . number_format($qb_allowance_for_bad_debts, 2) }}</th>
  </tr>
  <tr>
    <th><i>Other Receivable Damage</i></th>
    <th>{{ '$' . number_format($qb_other_receivable_damage, 2) }}</th>
  </tr>
  <tr>
    <th><i>Rent Deposit</i></th>
    <th>{{ '$' . number_format($qb_rent_deposit, 2) }}</th>
  </tr>
  <tr>
    <th><i>Total Current Assets</i></th>
    <th>{{ '$' . number_format($qb_total_current_assets, 2) }}</th>
  </tr>
  
 
 </table>

 <table>
  <tr>
    <th><u>LIABILITIES AND EQUITY</u></th>
  </tr>
  <tr>
    <th><i>Accounts Payable</i></th>
    <th>{{ '$' . number_format($qb_accounts_payable, 2) }}</th>
  </tr>
  <tr>
    <th><i>Accrued State Income Tax</i></th>
    <th>{{ '$' . number_format($qb_accrued_state_income_tax, 2) }}</th>
  </tr>
  <tr>
    <th><i>Capital Stock</i></th>
    <th>{{ '$' . number_format($qb_capital_stock, 2) }}</th>
  </tr>
  <tr>
    <th><i>Distributions</i></th>
    <th>{{ '$' . number_format($qb_distributions, 2) }}</th>
  </tr>
  <tr>
    <th><i>Retained Earnings</i></th>
    <th>{{ '$' . number_format($qb_retained_earnings, 2) }}</th>
  </tr>
  <tr>
    <th><i>Net Income</i></th>
    <th>{{ '$' . number_format($qb_net_income, 2) }}</th>
  </tr>
  <tr>
    <th><i>Total Liabilites and Equity</i></th>
    <th>{{ '$' . number_format($qb_total_liability_equity, 2) }}</th>
  </tr>
  
 
 </table>

<hr>

<div>
  <center><h4>ITS Maker Data with QB $ Amounts {{ $start_date }} to {{ $end_date }}</h4></center>
</div>

 <table>
  
  <tr>
    <th><i>Ledger (Accrual) (Deposits - Payments)</i></th>
    <th>{{ '$' . number_format($mb_checking_account_total, 2) }}</th>
  </tr>
  <tr>
    <th><i>Money Market</i></th>
    <th>{{ '$' . number_format($mb_money_market_total, 2) }}</th>
  </tr>
  <tr>
    <th><i>Billed Customer Invoices (Payment Not Received)</i></th>
    <th>{{ '$' . number_format($accounts_receivable_total, 2) }}</th>
  </tr>
  
  
  
 
 </table>

  <table>
  
  <tr>
    <th><i>Carrier Invoices (Approved Not Paid)</i></th>
    <th>{{ '$' . number_format($accounts_payable_total, 2) }}</th>
  </tr>
  
  <tr>
    <th><i>Distributions</i></th>
    <th>{{ '$-' . number_format($distributions, 2) }}</th>
  </tr>
  
  
 
 </table>



</body>
</html>