<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/9/13
 * Time: 11:42 AM
 */
 
 
 if(isset($_SESSION['note_id'])&&!empty($_SESSION['note_id'])){
$sqlnote="select day_spend from note where note_id='$_SESSION[note_id]'";
$dayspend=$db->send_sql($sqlnote);
$arrayuserid=array();
$arraylogid=array();
$localstring=array();
$i=0;
while($row1=mysql_fetch_array($dayspend)){
$days=$row1[0];
for($day=1;$day<=$days;$day++){
    echo"<div class='panel panel-success'>
    <div class='panel-heading'>
        <h3 class='panel-title' id='day $day'>day $day</h3>
    </div>";
$sqlcard="select log_id from log where note_id='$_SESSION[note_id]' and log_day= '$day' order by log_id";
$result=$db->send_sql($sqlcard);
while($row2=mysql_fetch_array($result)){
    $log_ids=$row2[0];
    $sqllog="select * from log where log_id='$log_ids'";
    $result2=$db->send_sql($sqllog);
    while($row3=mysql_fetch_array($result2)){
    global $i;
    global $arraylogid;
    global $arrayuserid;
    global $localstring;
    $log_path=$row3[5];
    $log_title=$row3[3];
    $log_descript=$row3[4];
    $user_id=$row3[1];
    $log_id=$row3[2];
    $log_place=$row3[8];
    $log_state=$row3[9];
    $log_country=$row3[10];
    $arraylogid[$i]=$log_id;
    $arrayuserid[$i]=$user_id;
    $localstring[$i]="$log_place,+$log_state,+$log_country";


?>

                    <div class="panel-body">
                    <div class="media favorCard" >
                             <a class="pull-left" href="<?php echo "$log_path";?>">
                                 <img class="media-object cardPic" src="<?php echo "$log_path";?>" alt="picture here" >
                             </a>
                             <div class="media-body">
                                 <h4 class="media-heading"><?php echo "$log_title";?></h4>
                                 <p><?php echo "$log_descript";?><p/>
                                 <form action="locationmap.php?location_name=<?php echo $localstring[$i];?>" method="post">
                                <p><input type="submit" class="btn btn-warning btn-sm" value="show on map"/>
                                     </form>
                                 <form action="addtofavor.php?log_id=<?php echo $arraylogid[$i];?>" method="post">
                                     <input type="submit" class="btn btn-warning btn-sm" value="add to favorite"/>
                                 </form>
                                 </p>
                             </div>
                        </div><?php  $i++;}}}}}
                        
                            else{
        echo "no note id in onecard";
        
    }
    
                        
                        ?>