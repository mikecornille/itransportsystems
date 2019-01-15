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
  <center><h4>Profit and Loss {{ $start_date }} to {{ $end_date }}</h4></center>
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
    <center><h4>Expenses By Sub Categories {{ $start_date }} to {{ $end_date }}</h4></center>
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

<tr>
    <th>Expenses Total</th>
    <th>{{ '$' . number_format($expenses_total, 2) }}</th>
</tr>

</table>
<hr>
<table>
<tr>
    <th>Net Income</th>
    <th>{{ '$' . number_format($net_income, 2) }}</th>
</tr>
</table>


<div>
  <center><h4>Balance Sheet {{ $start_date }} to {{ $end_date }}</h4></center>
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
    <th><i>Accounts Receivable</i></th>
    <th>{{ '$' . number_format($accounts_receivable_total, 2) }}</th>
  </tr>

  <tr>
    <th><i>Allowance for Bad Debts</i></th>
    <th>{{ '-$' . number_format($bad_debts, 2) }}</th>
  </tr>
   <tr>
    <th><i>Receivable Damage</i></th>
    <th>{{ '$' . number_format($receivable_damage, 2) }}</th>
  </tr>

  <tr>
    <th><i>Accumulated Depr Office Equip</i></th>
    <th>{{ '-$' . number_format($accum_office, 2) }}</th>
  </tr>
  <tr>
    <th><i>Accumulated Depr Mach Equipment</i></th>
    <th>{{ '-$' . number_format($accum_mach, 2) }}</th>
  </tr>
   <tr>
    <th><i>Machinery and Equipment</i></th>
    <th>{{ '$' . number_format($machineryAndEquipment, 2) }}</th>
  </tr>
  <tr>
    <th><i>Office Equipment</i></th>
    <th>{{ '$' . number_format($officeEquipment, 2) }}</th>
  </tr>

  <tr>
    <th><i>Rent Deposit</i></th>
    <th>{{ '$' . number_format($rentDeposit, 2) }}</th>
  </tr>
  

  <tr>
    <th><i>Total Assets</i></th>
    <th>{{ '$' . number_format($assets_total, 2) }}</th>
  </tr>


  </table>

  <hr>

  <table>

    
    <tr>
    <th><i>Accounts Payable</i></th>
    <th>{{ '$' . number_format($accounts_payable_total, 2) }}</th>
  </tr>

   <tr>
    <th><i>Accrued State Income Tax</i></th>
    <th>{{ '-$' . number_format($accrued_state, 2) }}</th>
  </tr>

  <tr>
    <th><i>Capital Stock</i></th>
    <th>{{ '$' . number_format($capital_stock, 2) }}</th>
  </tr>
  
  <tr>
    <th><i>Distributions</i></th>
    <th>{{ '$-' . number_format($distributions, 2) }}</th>
  </tr>

   <tr>
    <th><i>Retained Earnings</i></th>
    <th>{{ '$' . number_format($retained_earnings, 2) }}</th>
  </tr>
  
  <tr>
    <th>Net Income</th>
    <th>{{ '$' . number_format($net_income, 2) }}</th>
</tr>

<tr>
    <th>Total Liabilities and Equity</th>
    <th>{{ '$' . number_format($liability_total, 2) }}</th>
</tr>
  
 
 </table>



 

</body>
</html>