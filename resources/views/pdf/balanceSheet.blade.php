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
  <center><h4>{{ $start_date }} to {{ $end_date }}</h4></center>
</div>

 <table>
  
  <tr>
    <th><i>Freight Sales</i></th>
    <th>{{ '$' . number_format($sales, 2) }}</th>
  </tr>
  <tr>
    <th><i>Freight Cost</i></th>
    <th>{{ '$' . number_format($cost, 2) }}</th>
  </tr>
  <tr>
    <th><i>Gross Profit</i></th>
    <th>{{ '$' . number_format($gross_profit, 2) }}</th>
  </tr>
 </table>


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
    <tr>
    <th><i>Carrier Invoices (Approved Not Paid)</i></th>
    <th>{{ '$' . number_format($accounts_payable_total, 2) }}</th>
  </tr>
  
  <tr>
    <th><i>Distributions</i></th>
    <th>{{ '$-' . number_format($distributions, 2) }}</th>
  </tr>
  
  
 
 </table>

<div>
  <center><h4>ITS Maker Expenses By Sub Categories {{ $start_date }} to {{ $end_date }}</h4></center>
</div>

<table>


@for ($i = 0; $i < count($info['info']); $i++)

@if ($info['info'][$i][0] == 0)

@else
    
<tr>
    <th>{{ $info['info'][$i][1] }}</th>
    <th>{{ '$' . number_format($info['info'][$i][0], 2) }}</th>
</tr>

@endif
      
@endfor

</table>

<div>
  <center><h4>Expenses Total{{ $start_date }} to {{ $end_date }}</h4></center>
</div>

 <table>
  
  <tr>
    <th><i>Expenses Total</i></th>
    <th>{{ '$' . number_format($expenses_total, 2) }}</th>
  </tr>
  

 </table>

</body>
</html>