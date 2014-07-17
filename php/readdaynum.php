<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/10/13
 * Time: 2:31 PM
 */



$sqlnote="select day_spend from note where note_id='$_SESSION[note_id]'";
$dayspend=$db->send_sql($sqlnote);
   
while($row=mysql_fetch_array($dayspend)){
    $days=$row[0];
    for($day=1;$day<=$days;$day++){
        ?>
        <li><a href="#day<?php echo $day;?>">day<?php echo $day;?></a></li>
    <?php }}
   
    
    
    ?>