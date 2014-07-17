<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/10/13
 * Time: 7:19 PM
 */

if(isset($_SESSION['user_id'])){
$uid=$_SESSION['user_id'];    


$sql="select user_name from user where user_id ='$uid'";
$rec=$db->send_sql($sql);
$p=0;
$favorlogid=array();
$row=mysql_fetch_row($rec);
$username=$row[0];
echo "<blockquote class='pull-top'>
    <p>
       $username
    </p>";
$sql2="select count(log_id) from log where user_id = '$uid'";
$rec2=$db->send_sql($sql2);
$row2=mysql_fetch_array($rec2);
$placecount=$row2[0];
echo "<span class='glyphicon glyphicon-plane'></span><small>I've visited <cite> $placecount </cite>places</small></blockquote>";

$sql3="select log_id from favorite where user_id= '$uid'";
$rec3=$db->send_sql($sql3);
while($row3=mysql_fetch_array($rec3)){
    global $p;
    global $favorlogid;
    $logid=$row3[0];
    $favorlogid[$p]=$row3[0];

    $sql4="select * from log where log_id='$logid'";
    $rec4=$db->send_sql($sql4);
    $row4=mysql_fetch_row($rec4);
    $picpath=$row4[5];
    $logtitle=$row4[3];
    $logdecript=$row4[4];


    echo " <div class='media'>
                <a class='pull-left' href='".$picpath."'>
    <img class='media-object favorPic' src='".$picpath."' alt='picture here'>
                </a>
                <div class='media-body'>
                    <h5 class='media-heading'>".$logtitle."</h5>
            ".$logdecript."
                <form action='addtoplan.php?addlogid=".$favorlogid[$p]."' method ='post'>
                    <input type='submit' class='btn btn-info btn-xs' value='add to plan'/></form>
                </div>

            </div>";

$p++;}

}

else{echo"<h1>$uid<h1>";}
?>