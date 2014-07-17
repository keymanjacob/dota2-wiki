<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/9/13
 * Time: 11:42 AM
 */



$sqlnote="select day_spend from note where note_id='$_SESSION[new_note_id]'";

$dayspend=$db->send_sql($sqlnote);

$arrayelogid=array();
$arrayetitle=array();
$arrayedescript=array();
$j=0;

if(isset($_SESSION['new_note_id'])&&!empty($_SESSION['new_note_id'])){

while($row1=mysql_fetch_array($dayspend)){
    $days=$row1[0];
    for($day=1;$day<=$days;$day++){
        echo"<div class='panel panel-success'>
    <div class='panel-heading'>
        <h3 class='panel-title' id='day $day'>day $day</h3>
    </div>";
        $sqlcard="select log_id from log where note_id='$_SESSION[new_note_id]' and log_day= '$day' order by log_id";
        $result=$db->send_sql($sqlcard);
        while($row2=mysql_fetch_array($result)){
            $log_ids=$row2[0];
            $sqllog="select * from log where log_id='$log_ids'";
            $result2=$db->send_sql($sqllog);
            while($row3=mysql_fetch_array($result2)){
            global $j;
            global $arrayelogid;
            global $arrayetitle;
            global $arrayedescript;
            $log_path=$row3[5];
            $log_title=$row3[3];
            $log_descript=$row3[4];
            $user_id=$row3[1];
            $log_id=$row3[2];
            $arrayedescript[$j]=$log_descript;
            $arrayetitle[$j]=$log_title;
            $arrayelogid[$j]=$log_id;
            $arraydlogid[$j]=$log_id;
            ?>

            <div class="panel-body">
            <div class="media favorCard" >
            <a class="pull-left" href="<?php echo "$log_path";?>">
                <img class="media-object cardPic" src="<?php echo "$log_path";?>" alt="picture here" >
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo "$log_title";?></h4>
                <h5><?php echo "$log_descript";?></h5>
                <p>
                <form action="editlog.php?logeid=<?php echo $arrayelogid[$j];?>" method="post">
                    <p><input type="submit" class="btn btn-warning btn-sm" value="edit"/>
                </form>
                <form action="deletelog.php?logdid=<?php echo $arrayelogid[$j];?>" method="post">
                    <input type="submit" class="btn btn-warning btn-sm" value="delete"/>
                </form>
                </p>
            </div>
            </div><?php $j++;}}}}}else
            
            {
                echo"error in writecard";
            }?>