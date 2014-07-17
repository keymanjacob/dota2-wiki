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
session_start();

include("include.inc.php");
$db = new database();
$db->setup("root","admin","localhost","mydb");
echo $_FILES['log_picture']['name'];






if($_POST['submit']){
   if($_FILES["log_picture"]["error"]>0){
       echo "Error uploading!";
   }
   $uploaddir="../img/";
   $type=array("jpg","gif","png","jpeg");
   $a=strtolower(extendname($_FILES['log_picture']['name']));
   if(!in_array($a,$type)){
       echo "jpg/gif/png/jpeg only!";
   }
   else{

       $uploadfile=$uploaddir.$_FILES['log_picture']['name'];
       if(move_uploaded_file($_FILES['log_picture']['tmp_name'],$uploadfile)){
        $uploaddir="img/";
        $uploadfile=$uploadfile=$uploaddir.$_FILES['log_picture']['name'];
        $_POST['title']=strip_tags($_POST['title']);
        $_POST['title']=addslashes($_POST['title']);
        $_POST['description']=strip_tags($_POST['description']);
        $_POST['description']=addslashes($_POST['description']);
        $query = "UPDATE image SET title='$_POST[title]', description='$_POST[description]', image_url='$uploadfile' WHERE image_id='$_POST[image_id]' ";
        $db->send_sql($query);
           echo "<div class='alert alert-info'><a href='../1.php' class='alert-link'>GO back to main page</a></div>";
       }


   }

}

function extendname($filename){
   return substr(strrchr($filename,"."),1);
}
?>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>