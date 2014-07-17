<?php
    if(!$_GET['location_name']){
        echo "error!";
    }
else if($_GET['location_name']){


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<iframe width="800" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?echo $_GET['location_name'];?>&amp;aq=0&amp;oq=time+s&amp;sll=&amp;sspn=&amp;ie=UTF8&amp;hq=&amp;hnear=<?echo $_GET['location_name'];?>&amp;t=m&amp;ll=&amp;spn=&amp;z=16&amp;output=embed"></iframe><br />
</body>
</html><?php echo $_GET['location_name'];}?>