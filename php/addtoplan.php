
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
 * Date: 12/10/13
 * Time: 7:50 PM
 */
session_start();

include("include.inc.php");
$dbhost = "localhost";
$dbuser = "guangji";
$dbpass = "1990";
$dbname="mydb";

$db=new database();
$db->setup($dbuser,$dbpass,$dbhost,$dbname);
if(isset($_GET['addlogid'])){
    echo "<div class='container'><form action='addtoplan.php?logid=".$_GET["addlogid"]."' method='post'>
        add to which day?<input type='text' name='day'><br>
        <input class='btn btn-default' type='submit' name='submit' value='comfirm'>
         </form></div>";

}
if(isset($_POST['submit'])){
    if(!empty($_POST['day'])){
    if(is_numeric($_POST['day'])){
    $sql="select * from log where log_id = '$_GET[logid]'";
    $rec=$db->send_sql($sql);
    $row=mysql_fetch_row($rec);
    $logtitle=$row[3];
    $logdescript=$row[4];
    $logpath=$row[5];
    $logtime=$row[6];
    $logday=$_POST['day'];
    $logplace=$row[8];
    $logstate=$row[9];
    $logcountry=$row[10];
    $sql="INSERT INTO log(note_id, user_id, log_title, log_description, log_path, log_time, log_day, log_place, log_state, log_country) VALUES ('$_SESSION[new_note_id]','$_SESSION[user_id]','$logtitle','$logdescript','$logpath',now(),'$logday','$logplace','$logstate','$logcountry')";
    $db->send_sql($sql);
    echo "<script>alert('added to your plan !!');location.href='writepage.php'</script>";
    }
    else
        echo"<script>alert('must be a number like 1/2/3/4..... !!');location.href='writepage.php'";
    }
}
?>



 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>