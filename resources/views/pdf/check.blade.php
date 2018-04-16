@PHP



function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return ucwords(implode(' ', $words));
}

$rateSpelledOut = convertNumberToWord($info->carrier_rate);

date_default_timezone_set("America/Chicago");
$today = date("n/j/Y"); 

@ENDPHP

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

div.dollar {
    position: fixed;
    bottom: 673;
    right: 0;
    width: 100px;
    
}

div.memo {
    position: fixed;
    bottom: 565;
    left: 40;
    width: 500px;
    
}

div.payTo {
    position: fixed;
    bottom: 677;
    left: 50;
    width: 500px;
    
}

div.dollarSpelledOut {
    position: fixed;
    bottom: 650;
    width: 500px;
    
}

div.sig {
    position: fixed;
    bottom: 605;
    right: 0;
    width: 200px;
    
}

div.checkDate {
    position: fixed;
    bottom: 700;
    right: 0;
    width: 100px;
    
}

div.remitToAddress {
	position: fixed;
    bottom: 630;
    right: 500;
    width: 300px;
}

div.midTable {
position: fixed;
    bottom: 490;
    width: 800px;
}

div.lowTable {
	position: fixed;
    bottom: 210;
    width: 800px;
}

</style>

</head>
<body>



<div class="remitToAddress">
<ul style="list-style-type: none;">
	<li>{{ $info->remit_name }}</li>
	<li>{{ $info->remit_address }}</li>
	<li>{{ $info->remit_city . ', ' . $info->remit_state . ' ' . $info->remit_zip  }}</li>
</ul>
	
</div>

<div class="payTo">
{{ $info->carrier_name }}
</div>

<div class="checkDate">
{{ $today }}
</div>

<div class="dollarSpelledOut">
 {{ $rateSpelledOut . ' and 00/100'}}
</div>

<div class="memo">
{{ $info->quick_status_notes }}
</div>

<div class="dollar">
{{ $info->carrier_rate }}.00
</div>

<div class="sig">
	<img src="images/liane.png">
</div>

<div class="midTable">
<p>{{ $info->carrier_name . ' - ' . $today }}</p>
<table style="width:100%">
  <tr>
    <th>Invoice Date</th>
    <th>Type</th> 
    <th>Reference</th>
    <th>Original Amt.</th>
    <th>Balance Due</th> 
    <th>Payment</th>
  </tr>
  <tr>
    <td>{{ $info->vendor_invoice_date }}</td>
    <td>Bill</td> 
    <td>{{ $info->vendor_invoice_number }}</td>
    <td>${{ $info->carrier_rate }}.00</td>
    <td>${{ $info->carrier_rate }}.00</td>
    <td>${{ $info->carrier_rate }}.00</td>
  </tr>
  
</table>
<p>Check Amount - ${{ $info->carrier_rate }}.00</p>
<p>Memo - {{ $info->quick_status_notes }}</p>
</div>

<div class="lowTable">
<p>{{ $info->carrier_name . ' - ' . $today }}</p>
<table style="width:100%">
  <tr>
    <th>Invoice Date</th>
    <th>Type</th> 
    <th>Reference</th>
    <th>Original Amt.</th>
    <th>Balance Due</th> 
    <th>Payment</th>
  </tr>
  <tr>
    <td>{{ $info->vendor_invoice_date }}</td>
    <td>Bill</td> 
    <td>{{ $info->vendor_invoice_number }}</td>
    <td>${{ $info->carrier_rate }}.00</td>
    <td>${{ $info->carrier_rate }}.00</td>
    <td>${{ $info->carrier_rate }}.00</td>
  </tr>
  
</table>
<p>Check Amount - ${{ $info->carrier_rate }}.00</p>
<p>Memo - {{ $info->quick_status_notes }}</p>
</div>

</body>
</html>