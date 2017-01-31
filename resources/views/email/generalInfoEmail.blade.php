<!DOCTYPE html>
<html>
<head>
	<title>Internal Message</title>

	<style>



	#signature {

	list-style-type: none;
}
	</style>
</head>
<body>
<p style="font-size: 20px;">Good Morning/Afternoon Name,</p>
<p style="font-size: 16px;">Thank you for taking the time to speak with me.  I look forward to working with you and exceeding all your transportation needs.  We specialize in moving construction equipment and machinery throughout the US and Canada.  I can provide flatbeds, stepdecks, lowboys, etc to handle any type of freight you need shipped.</p>



 <img style="width:400px; height:200px;" src="<?php echo $message->embed('images/conestoga.png'); ?>">
 <img style="width:400px; height:200px; border-left-style: solid; border-right-style: solid;" src="<?php echo $message->embed('images/oversize_load.png'); ?>">
 <img style="width:400px; height:200px;" src="<?php echo $message->embed('images/two_jcb_forklifts.png'); ?>">


<p style="font-size: 20px;">Do you need more control and tools to manage your freight?  Check out our free system below!</p>
<p style="font-size: 18px;">All-In-One Bidding Tool for Transporting Equipment/Machinery</p>
<ul style="font-size: 16px;"> 
	<li>Quickly Generate Accurate Bids From Your Preferred Carriers and Brokers</li>
	<li>Google Maps Built In</li>
	<li>Your Store Location Information Built In</li>
	<li>Equipment Database Built In</li>
	<li>User Friendly Interface To Stay Organized</li>
</ul>


<a href="https://vimeo.com/188853380">Click here for a short video (2:30) on how to get started!</a>


<ul style="font-size: 16px;" id="signature">
	<li>Thank You,</li>
	<li>{{ \Auth::user()->name }}</li>
	<li>{{ \Auth::user()->email }}</li>
	<li>International Transport Systems, Inc.</li>
	<li>PH: 630-832-6900</li>
</ul>
</body>
</html>