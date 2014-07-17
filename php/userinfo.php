<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/10/13
 * Time: 3:36 PM
 */
 

 
  if(isset($_SESSION['note_id'])&&!empty($_SESSION['note_id'])){
 
 
 
 
$sql1="select user_id from note where note_id='$_SESSION[note_id]'";
$rec1=$db->send_sql($sql1);
$arraynoteid=array();
$k=0;
$row1=mysql_fetch_array($rec1);
$userid=$row1[0];
    $sql2="select user_name from user where user_id = '$userid'";
    $rec2=$db->send_sql($sql2);
    $row2=mysql_fetch_array($rec2);
    $username=$row2[0];
    echo "<blockquote class='pull-top'>
    <p>
       $username
    </p>";
    $sql3="select count(log_id) from log where user_id = '$userid'";
    $rec3=$db->send_sql($sql3);
   $row3=mysql_fetch_array($rec3);
    $placecount=$row3[0];
    echo "<span class='glyphicon glyphicon-plane'></span><small>I've visited <cite> $placecount </cite>places</small></blockquote>";




    $sql4="select * from note where user_id='$userid'";
    $rec4=$db->send_sql($sql4);
    while($row4=mysql_fetch_array($rec4)){
        global $arraynoteid;
        global $k;
        $noteid=$row4[0];
        $notetitle=$row4[3];
        $notedescript=$row4[4];
        $arraynoteid[$k]=$noteid;
        $sql5="select log_path from log where note_id='$noteid'";
        $rec5=$db->send_sql($sql5);
        $row5=mysql_fetch_row($rec5);
        $picpath=$row5[0];
        echo "<div class='media'>
    <a class='pull-left' href='".$picpath."'>
        <img class='media-object favorPic' src='".$picpath."' alt='note pic'>
    </a>
    <div class='media-body'>
        <h5 class='media-heading'>".$notetitle."</h5>".
        $notedescript."
        <form action='readpage.php?noteid=".$arraynoteid[$k]."' method='post'>
        <input type='submit' class='btn btn-info btn-xs' value='view'/>
    </div>
</div>";
    $k++;}

}else{
    echo "error in userinfo";
    
}
?>


