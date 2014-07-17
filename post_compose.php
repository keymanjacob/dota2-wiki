<?php
session_start();
ob_start();


if(!isset($_SESSION['login_name']))
{
//echo "Welcome back! ".$_SESSION['user'];
	unset($_SESSION['login_name']);  
	session_destroy();  
	$redirect_page = "login.php";
	header("Cache-Control: private, must-revalidate, max-age=0");
	header("Pragma: no-cache");
	header('Location: '.$redirect_page);


}
else
{

//echo "you cannot see this page without logging in!!!";
	$welcome = true;
	$owner_id = $_SESSION['user_id'];
	$owner_name = $_SESSION['login_name'];
	require_once("php/include.inc.php");
	$db = new database();
	$db->setup("root","90fgh314","localhost","mydb");
	$db->connect();
}



?>





<?php


if(isset($_POST['topic'])&&isset($_POST['content']))
{
	$title = addslashes($_POST['topic']);
	$content =addslashes($_POST['content']);
	$sql = "insert into post(owner_id,owner_name,title,content) values('$owner_id','$owner_name','$title','$content');";
	$sql2 = "commit;";
	$res = $db->send_sql($sql);
	$res2 = $db->send_sql($sql2);
	$red2 = "posts.php";
	header('Location: '.$red2);
}else{
	
}



?>
