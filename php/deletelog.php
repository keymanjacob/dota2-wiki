<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/9/13
 * Time: 11:05 PM
 */

include("include.inc.php");
$dbhost = "localhost";
$dbuser = "guangji";
$dbpass = "1990";
$dbname="mydb";

$db=new database();
$db->setup($dbuser,$dbpass,$dbhost,$dbname);
if(!empty($_GET['logdid'])){
    $sql="delete from log where log_id ='$_GET[logdid]'";
    $db->send_sql($sql);
    echo "<script>alert('deleted !! what the hell!!');location.href='writepage.php'</script>";

}

?>