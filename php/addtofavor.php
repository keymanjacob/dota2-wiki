<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/9/13
 * Time: 11:27 AM
 */
session_start();

if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
include("include.inc.php");
$dbhost = "localhost";
$dbuser = "guangji";
$dbpass = "1990";
$dbname="mydb";

$db=new database();
$db->setup($dbuser,$dbpass,$dbhost,$dbname);
if(!$_GET['log_id']){
    "<script>alert('Error adding!!!');location.href='readpage.php'</script>";
}
else if($_GET['log_id']){
$userid=addslashes($_SESSION['user_id']);
$logid=addslashes($_GET['log_id']);
$sqlfavor="insert into favorite(user_id,log_id) values('$userid','$logid')";
    $db->send_sql($sqlfavor);
    echo "<script>alert('added !!');location.href='readpage.php'</script>";
}}

else{
    echo "<script>alert('please login first !!');location.href='readpage.php'</script>";
}
?>
