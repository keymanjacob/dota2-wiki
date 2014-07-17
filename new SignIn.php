<?php 
session_start();
?>
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

include("../include.inc.php");
    $db = new database();
    $db->setup("root","90fgh314","localhost","mydb");



if(isset($_GET['fbn'])&&isset($_GET['flag'])){
  $fb_name = $_GET['fbn'];

}else{
  
}

    





if(!fillout($_POST))
{
     if(!isset($_POST['lusername'])||empty($_POST['lusername']))
    {
        warning('please input name!');
    }
    if(!isset($_POST['lpassword'])||empty($_POST['lpassword']))
    {
        warning('please input password!');
    }
    else{
       $name=strip_tags($_POST['lusername']);
       $name=addslashes($name);
       $query="SELECT * FROM user WHERE user_name='$name'";
       $result=$db->send_sql($query);
       $row=mysql_fetch_array($result);
       if(empty($row[0])){
        
        warning('No such user!');
        echo("<div class='alert alert-info'><a href='../mainpage.htm' class='alert-link'>GO back to main page</a></div>");
       
       }
       else{
       $password=$_POST['lpassword'];
       $query="SELECT user_password,user_id FROM user WHERE user_name='$name'";
       $result=$db->send_sql($query);
       $row=mysql_fetch_array($result);
       if($row[0]=== sha1($password)){
        $_SESSION['login_name']=$name;
        $_SESSION['user_id']=$row[1];
        echo("<div class='alert alert-success'>Congratulation! Sign in success!<a href='../../Dota2_index.php' class='alert-link'> Go to mainpage</a>  </div>");
                
       }
        else{
          warning('Wrong password!'); 
          echo("<div class='alert alert-info'><a href='../../Dota2_index.php' class='alert-link'>GO back to main page</a></div>");
        }
       }   
     }
    
}

function fillout($post){
    
    foreach ($post as $key=>$value){
        if((!isset($key))||($value=='')){
            return false;
        }
    }
   }
   
   function warning($p){
    
    echo '<div class="alert alert-danger">'.$p.'</div>';
}
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>
