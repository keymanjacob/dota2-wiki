<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="container">    
    
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

    if(!empty($_GET['logeid'])){
        echo "<br><form action='editlog.php?logeid=$_GET[logeid]' method='post'>
        new title&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' name='edit_title'><br><br>
        new description<textarea rows='5' cols='50' name='edit_description'></textarea>
        <input class='btn btn-default' type='submit' name='submit' value='update'>
         </form>";
        if(!empty($_POST['edit_title'])){
            $title=strip_tags($_POST['edit_title']);
            $title=addslashes($title);
            $sql="update log set log_title ='$title' where log_id='$_GET[logeid]'";
            $db->send_sql($sql);
            echo "<script>alert('updated !!');location.href='writepage.php'</script>";
        }
        if(!empty($_POST['edit_description'])){
            $descript=strip_tags($_POST['edit_description']);
            $descript=addslashes($descript);
            $sql="update log set log_description ='$descript'  where log_id='$_GET[logeid]'";
            $db->send_sql($sql);
            echo "<script>alert('updated !!');location.href='writepage.php'</script>";
        }

    }

?>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>