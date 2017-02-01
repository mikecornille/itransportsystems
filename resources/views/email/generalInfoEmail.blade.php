<?php

$formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", \Auth::user()->cell);



?>


<!DOCTYPE html>
<html>
<head>
	<title>Internal Message</title>

	
</head>
<body>
<p style="font-size: 20px;">Good Morning/Afternoon Name,</p>
<p style="font-size: 16px;">Thank you for taking the time to speak with me.  I look forward to working with you and exceeding all your transportation needs.  We specialize in moving construction equipment and machinery throughout the US and Canada.  I can provide flatbeds, stepdecks, lowboys, etc to handle any type of freight you need shipped.  Contact me anytime at, Toll Free: 877-663-2200, Cell: {{ $formatted_number }}, or Email: {{ \Auth::user()->email }}.</p>

<br>


 <img style="width:300px; height:200px;" src="<?php echo $message->embed('images/conestoga.png'); ?>">
 <img style="width:300px; height:200px;" src="<?php echo $message->embed('images/oversize_load.png'); ?>">
 <img style="width:300px; height:200px;" src="<?php echo $message->embed('images/two_jcb_forklifts.png'); ?>">


<p style="font-size: 20px; text-align: center; font-weight: bold;">On top of providing transportation, we also offer a free online bidding tool...</p>
<p style="font-size: 18px; text-decoration: underline; text-align: center; font-weight: bold;">All-In-One Bidding Tool for Transporting Equipment/Machinery</p>
<ul style="font-size: 16px; text-align: center; list-style-type: none;"> 
	<li>-Quickly Generate Accurate Bids From Preferred Carriers and Brokers</li>
	<li>-Google Maps Built In</li>
	<li>-Equipment Database Built In</li>
	<li>-User Friendly Interface To Stay Organized</li>
</ul>


<p style="font-size: 18px; font-weight: bold; text-align: center;"><a href="https://vimeo.com/188853380">Click here for a short 2 minute video on how to get started</a></p>

<ul style="font-size: 16px; list-style-type: none; color: #6495ED;" id="signature">
	<li style="font-size: 18px; color: black; font-weight: bold;">Best Regards,</li>
	<br>
	<li style="color: black; font-size: 18px; font-weight: bold;">{{ \Auth::user()->name }}</li>
	<li>Lead Operations</li>
	<li>P: 630-832-6900 | C: {{ $formatted_number }} | {{ \Auth::user()->email }}</li>
	<li>International Transport Systems, Inc.</li>
	<li>111 N Addison Ave 2nd FL</li>
	<li>Elmhurst, IL 60126</li>
	<li><a href="http://www.transportload.com">HOME SITE</a></li>
	<li><a href="http://www.manageloads.com">QUOTE GENERATING SITE</a></li>
</ul>

<img style="margin-left: 50px;" src="<?php echo $message->embed('images/its_logo_162_150.png'); ?>">

</body>
</html>