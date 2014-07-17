
<?php
session_start();
if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
include("include.inc.php");
$dbhost = "localhost";
$dbuser = "guangji";
$dbpass = "1990";
$dbname="mydb";

$db=new database();
$db->setup($dbuser,$dbpass,$dbhost,$dbname);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap.min.css">
	</head>
    <style>
    .card {
    height:auto;
    overflow-y:auto;
        }
        .cardPic {
    height:100px;
        }
        .favorPic{
            height:60px;}
        .headPic{
        height:100px;}
        .favorCard{
         border: 1px solid rgba(128, 128, 128, 0.33);}
        .myCard{
         border: 1px solid rgba(128, 128, 128, 0.33);
        background-color:#c8f9fd;}
    
    
    </style>
	<body style=" background-image: url(../img/bg.jpg);background-attachment:fixed;">
	        
            <script type="text/javascript" >
    
    function login( x ){
      var a = document.createElement("a");
      var text = document.createTextNode("Hi! "+x+". Welcome back!");
      a.appendChild(text);
      a.href="test-plans.php";
      
      var par = document.getElementById("para");
      var st = document.getElementById("signin");
      par.replaceChild(a,st);
       
    }
    
        function logout(){
      var a = document.createElement("a");
      var text = document.createTextNode("|  Logout");
      a.appendChild(text);
      a.href="Logout.php";
      
      var par = document.getElementById("para2");
      var st = document.getElementById("signup");
      par.replaceChild(a,st);
       
    }
        
    </script>
    
    <div style="position:relative; ">	
    <nav class="navbar navbar-inverse navbar-fixed-top" ;role="navigation"  ">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../mainpage.htm">My Travel</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="#">Main page</a></li>
    </ul>
    <form action="../1.php" class="navbar-form navbar-right" method="post" role="search"  >
      <div class="form-group">
        <input type="text" name="search_result" class="form-control" placeholder="Search">
      </div>
      <input type="submit"  class="btn btn-default" value="Sumbit" />
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li id="para"><a id="signin" href="#" data-toggle="modal" data-target="#SignIn">sign in</a></li>
      <li id="para2"><a id="signup" href="#" data-toggle="modal" data-target="#SignUp">| &nbsp;&nbsp;sign up </a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
</div>

<div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign in now!</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="SignIn.php" method="post" role="form">
       
          <div class="form-group">
          <label for="Username" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
           <input type="username" class="form-control" name="lusername" id="inputName" placeholder="Username">
         </div>
         </div>
       
 
      <div class="form-group">
       <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="lpassword" id="password" placeholder="Password">
      </div>
     </div>
       <input type="submit" value="test" class="btn btn-default" >
        </form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<br><br><br>

<div class="modal fade" id="SignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign in now!</h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="SignUp.php" method="post" role="form">
       
          <div class="form-group">
          <label for="Username" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
           <input type="username" class="form-control" name="username"id="inputName" placeholder="Username">
         </div>
         </div>
        
      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
         <div class="col-sm-10">
           <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
         </div>
      </div>
  
      <div class="form-group">
       <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
     </div>
     
      <div class="form-group">
       <label for="Confirm" class="col-sm-2 control-label">Confirm</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="passconfirm" placeholder="Please input password again">
      </div>
     </div>
     
       <input type="submit" value="test" class="btn btn-default" >

        </form>
        
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
  <div class="container" style="background-color: white;">
	<div class="row">
		<div class="col-lg-8">
			<h3>
				Trip to NYC
			</h3>
		</div>
		<div class="col-lg-4">
         <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                    Post your experience 
                                </button>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">My review</h4>
                                </div>
                                    <div class="modal-body">
                                        <form action="myexperience.php" enctype="multipart/form-data" method="POST">

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Title" name="log_title">
                                            </div>
                                            <div class="form-group">
                                                name of place: <input type="text" class="form-control" name="log_place">
                                            </div>
                                            <div class="form-group">
                                                in which state: <input type="text" class="form-control" name="log_state">
                                            </div>
                                            <div class="form-group">
                                                in which Country: <input type="text" class="form-control" name="log_country">
                                            </div>
                                            <div class="form-group">
                                                On day(): <input type="text" class="form-control" name="log_day">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Picture</label>
                                                <input type="file" name="log_picture" id="exampleInputFile">
                                                <p class="help-block">png/jpg/jpeg only</p>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" placeholder="Description" name="log_description"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-default" value="Post" name="submit"/>
                                        </form>
                                    </div>

                                    </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1" style="height:500px;" id="navExample">
             <ul class="nav nav-pills nav-stacked" >
            <?php include("writedaynum.php");?>
        </ul>   
		</div>
		<div class="col-lg-9 scrollspy-example" data-spy="scroll" data-target="#navExample" data-offset="50" style="height:800px;overflow-y:auto;">
			<ul class="list-group">
				<li class="col-lg-12 list-group-item">
                    <?php include("writeonecard.php");?>
				</li>
      
			</ul>
		</div>
		<div class="col-lg-2" style="height:500px;overflow:auto;">
			<img alt="140x140" src="../img/2.jpg" class="img-circle headPic" />
			<?php include("favoritecards.php");?>
                
            </div>
            
		</div>
	</div>
	
</div>
        
             	<?php
if(isset($_SESSION['valid_user'])){
    
    $name=$_SESSION['valid_user'];
    
}


if(!empty($name)){
   
    ?>
    <script type="text/javascript" >
    var x = "<?php echo $name ?>";
    login(x);
    logout();
    </script>

<?php 
}
}
else{
     echo "<script>alert('please login first !!');location.href='../mainpage.htm'</script>";
}
?>	 
        

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
</html>