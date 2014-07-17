<?php session_start();?>


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
    
    
    include("../include.inc.php");
    $db = new database();
    $db->setup("root","90fgh314","localhost","mydb");
    

$error = false;
//password


if(!fillout($_POST)){
    
    if(!isset($_POST['username'])||empty($_POST['username']))
    {
        warning('please input name!');
    }
        if(!isset($_POST['email'])||empty($_POST['email']))
    {
        warning('please input email!');
    }    if(!isset($_POST['password'])||empty($_POST['password']))
    {
        warning('please input password!');
    }    if(!isset($_POST['passconfirm'])||empty($_POST['passconfirm']))
    {
        warning('please input password!');
    }
    
}
else{
//username
if(isset($_POST["username"])&&!empty($_POST["username"])){

    $Username=strip_tags($_POST["username"]);
    $Username=addslashes($Username);
    
    $query = "SELECT user_id FROM user WHERE user_name='$Username'";

    $result = $db->send_sql($query);


if(isset($result)){
    $row = mysql_fetch_array($result);
      if(!empty($row[0])){
            $error=true;
            warning('User already exists!');
            }
}
 
    
}

//password
if(isset($_POST["password"])&&!empty($_POST["password"])&&isset($_POST["passconfirm"])&&!empty($_POST["passconfirm"])){
    if(strlen($_POST["password"])>16||strlen($_POST["password"])<6){
        $error=true;
        $num=strlen($_POST["password"]);
        warning("Password should has 6-16  characters ");
    }

   $password=$_POST["password"]; 
   $Confirm=$_POST["passconfirm"];
   
   if($password!==$Confirm){
    
    warning('Password not match!');
    $error=true;
 }

}


//email
if(isset($_POST["email"])&&!empty($_POST["email"])){
    
        $Email=strip_tags($_POST["email"]);
        $Email=addslashes($Email);
    
        $query = "SELECT * FROM user WHERE user_email='$Email'";
        $result = $db->send_sql($query);
if($result){
    $row = mysql_fetch_array($result);
    if(!empty($row[0])){
            $error=true;
            warning('Email already exists!');
            }
}
 
    
}

 if($error===false){
    
    
    $Username=strip_tags($Username);
    $Username=addslashes($Username);
    $Email=strip_tags($Email);
    $Email=addslashes($Email);
    $password=strip_tags($password);
    $password=addslashes($password);
    $password=sha1($password);
    $query = "INSERT INTO user(user_name,user_email,user_password) VALUES ('$Username','$Email','$password')";
    $result=$db->send_sql($query);
    echo("<div class='alert alert-success'>Congratulation! Sign up success!</div>");
    $_SESSION['username']=$Username;
    $_SESSION['user_id']=$db->insert_id();
    echo("<div class='alert alert-info'><a href='../../Dota2_index.php' class='alert-link'>GO back to main page</a></div>");
    
 }
 
}



function warning($p){
    
    echo '<div class="alert alert-danger">'.$p.'</div>';
}

function fillout($post){
    
    foreach ($post as $key=>$value){
        if((!isset($key))||($value=='')){
            return false;
        }
    }
    
    return true;
}

?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>









