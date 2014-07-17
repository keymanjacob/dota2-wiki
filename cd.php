<html>

<head>



    <title>'Coming Soon'</title>

    <script type="text/javascript" src="ads.js"></script>

    <style type="text/css"> 

	@import "jquery/jquery.countdown.css";

	#defaultCountdown { width: 240px; height: 45px; -moz-border-radius: 5px; border-radius: 5px; margin-left: 80px;} 

    </style> 

    <script type="text/javascript" src="ads.js"></script>





<script type="text/javascript">

$(function () {

// new Date(year, mth - 1, day, hr, min, sec)

// year --> year the event will occur

// mth --> month the event will occur

// day --> day the event will occur

// hr --> hour the event will occur

// min --> min the event will occur

// sec --> sec the event will occur

var newserver = new Date(2012, 8 - 1, 13, 19); 

$('#defaultCountdown').countdown({until: newserver}); 

 

$('#removeCountdown').toggle(function() { 

        $(this).text('Re-attach'); 

        $('#defaultCountdown').countdown('destroy'); 

    }, 

    

    function() { 

        $(this).text('Remove'); 

        $('#defaultCountdown').countdown({until: newserver}); 

    } 

);



});

</script>

</head>



<body>

<div id="mx">	

	

	<?php echo '<p> Site coming soon.' .'<br>';?>

	<?php echo '</p>'; ?>

	<div id="defaultCountdown"></div>

	<?php echo '<br>'; ?>

</div>





</body>

</html>