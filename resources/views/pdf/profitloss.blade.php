<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<!-- Latest compiled and minified CSS -->

<style>

ul{
    list-style-type: none;
}


</style>

</head>
<body>



<h3>Ordinary Income/Expense</h3>
<ul>
	<li>Income</li>
        <ul>
            <li>Freight Sales {{ $freight_sales }}</li>
        </ul>
    <li>Cost of Goods Sold</li>
	   <ul>
            <li>Freight Cost {{ $freight_cost }}</li>
        </ul>
</ul>
<ul>
    <li>Gross Profit {{ $difference_sales_cost }}</li>
</ul>
	
<ul>
    <li>Expense</li>
        <ul>
            <li>Dues and Subscriptions {{ $dues_and_sub }}</li>
        </ul>
</ul>

</body>
</html>