<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/10/13
 * Time: 9:54 PM
 */


if(isset($_SESSION['note_id'])&&!empty($_SESSION['note_id'])){


    $sql="select note_title from note where note_id='$_SESSION[note_id]'";
    $rec=$db->send_sql($sql);
    $row=mysql_fetch_row($rec);
    $title=$row[0];
    echo "<h3>$title</h3>";
        }
        else{echo" no note id";}
        
?>