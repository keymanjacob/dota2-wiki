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



    include("php/include.inc.php");
    $db = new database();
    $db->setup("root","90fgh314","localhost","mydb");



if(isset($_SESSION['user'])){
      unset($_SESSION['valid_user']);  
      session_destroy();  
       echo("<div class='alert alert-success'>Congratulation! Sign in success!<a href='Dota2_index.php' class='alert-link'> Go to mainpage</a>  </div>");
}else{

echo("<div class='alert alert-warning'>Please Login!<a href='Dota2_index.php' class='alert-link'> Go to mainpage</a>  </div>");

}
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>