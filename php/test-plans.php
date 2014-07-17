<?php
session_start ();
// store session data

?>


<!doctype html>
<html lang="en">
<head>
<meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<title>Personal Profile</title>
<style type="text/css">
body {
	background: white;
}

p.container-margin {
	margin: 1cm 2cm;
}

.center {
	width: auto;
	display: table;
	margin-left: 90%;
	margin-right: auto;
}

.text-center {
	text-align: center;
}

div.side-bar {
	margin: 2% 5% 2% 5%;
}

.nav-pills>li.active>a,.nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus
	{
	background-color: #5cb85c;
}

a {
	color: #5cb85c;
}

.nav .caret {
	border-top-color: #5cb85c;
	border-bottom-color: #5cb85c;
}

a:hover,a:focus {
	color: #4cae4c;
	text-decoration: underline;
}

.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus
	{
	background-color: #5cb85c;
}

:empty {
	background-color: white;
}
</style>
</head>

<body style=" background-image: url(../img/bg.jpg);background-position: top;">




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





<?php
// retrieve session data
$user_id = $_SESSION ['user_id'];
?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>


        <?php include 'test.php'; ?>
   <div class="container" style="background-color: white;">
		<p class="container-margin">
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4">
						<div class="user-thumb">
							<img width="160" height="160" alt="User"
								src= "../img/192519.jpg">
						</div>
					</div>

					<div class="col-lg-6">
						<h1><?php echo $user_name['name']?></h1>
						<p>
							<b> User_id :</b> <?php echo $user_name['id'] ?><br> <b>
								Reputation :</b> <?php echo $user_reputation['count']?><br> <b>
								User Statistics : </b> Note : <?php echo $user_note_num['count']?> Favorite Log : <?php echo $user_favor_num['count']?> Messages :
							<?php echo $user_log_comms_num['count']+$user_messages_num['count'];?>
						</p>
					</div>

					<div class="col-lg-2">
						<button type="button" class="btn btn-success" data-toggle="modal"
							data-target="#myEdit">Profile Edit</button>
						<div class="modal fade" id="myEdit" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myEditLabel">Personal Profile :
											Edit</h4>
									</div>
									<div class="modal-body">
										<form action="Personal_Profile_Edit.php" method ="post" role="form">
											<div class="form-group">
												<label for="exampleInputOldPassword1">Old Password</label> <input
													type="password" class="form-control"
													name= "OldPassword" placeholder="Password">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">New Email address</label> <input
													type="email" class="form-control" name="NewEmail"
													placeholder="Enter new email address">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">New Password</label> <input
													type="password" class="form-control"
													name="NewPassword1" placeholder="Password">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword2">New Password Confirm</label>
												<input type="password" class="form-control"
													name="NewPassword2"
													placeholder="Please re-enter your new password">
											</div>
											
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default"
											data-dismiss="modal">Close</button>
										<button  type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="side-bar">
					<div class="center">
						<!-- Button trigger modal -->
						<button class="btn btn-primary btn-lg" data-toggle="modal"
							data-target="#NewNote">Start a new plan!</button>

						<!-- Modal -->
						<div class="modal fade" id="NewNote" tabindex="-1" role="dialog"
							aria-labelledby="NewNoteLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="NewNoteLabel">New Note</h4>
									</div>
									<div class="modal-body">
                                       <form action="note_start.php" method ="post" role="form">
										<div class="input-group">
											<span class="input-group-addon">Note name :</span> <input
												type="text" name="note" class="form-control" placeholder="New Note Name">
										</div>
										<br> <br>

										<div class="input-group">
											<div class="input-group-btn">
												<label  type="button" class="btn btn-default">Days</label>

													
												
	
											</div>
											<input type="text" name="days" class="form-control">
										</div>
										<br> <br>

										<div class="input-group">
											<span class="input-group-addon">Description :</span> <input
												type="text" name ="description" class="form-control" placeholder="New York">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default"
											data-dismiss="modal">Close</button>
										<button type="submit" name="submit"class="btn btn-primary">Start</button>
										</form>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="main">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-justified">
						<li class="active"><a href="#note" data-toggle="tab">Note : <?php echo $user_note_num['count']; ?></a></li>
						<li><a href="#log" data-toggle="tab">Favorite Logs : <?php echo $user_favor_num['count'];?></a></li>
						<li class="dropdown "><a href="#Messages" id="Mytabdrop"
							class="dropdown-toggle" data-toggle="dropdown">Messages : <?php echo  $user_log_comms_num['count']+$user_messages_num['count']; ?> <b
								class="caret"></b></a>
							<ul class="dropdown-menu pull-right" role="menu"
								aria-labelledby="Mytabdrop">
								<li><a href="#log_comments" tabindex=-1 data-toggle="tab">Log
												comments : <?php echo $user_log_comms_num['count'];?></a></li>
								<li><a href="#message_reply" tabindex=-1 data-toggle="tab">Messages : <?php echo $user_messages_num['count']?></a></li>
							</ul></li>
				
				</div>
				</ul>
				<script>
						$(function () {
							$('#myTab li:eq(1) a').tab('show') 
							    
							  })
					     
                            </script>

				<div class="tab-content">
					<div class="tab-pane fade in active" id="note">
						<div class="page-header">
							<h1>Notes</h1>
						</div>
						<ul class="media-list">
							<?php
							while ( $user_note = mysql_fetch_array ( $user_note_result ) ) {
								?><li class="media"><a class="pull-left" href="#"> <img
									class="media-object" src=<?php echo  $user_note['log_path'];?> alt="">
							</a>
								<div class="media-body">
									<a href="#"><h4 class="media-heading"><?php echo $user_note['note_title'];?></h4></a>
										<?php echo $user_note['note_description']. "<br>".  $user_note['note_date'];?>
										</div></li>
							<hr>
										<?php }?>
							</ul>
					</div>
					<div class="tab-pane fade" id="log">
						<div class="page-header">
							<h1>Favorite Logs</h1>
						</div>
						<ul class="media-list">
							<?php
							while ( $user_favor = mysql_fetch_array ( $user_favor_result ) ) {
								?><li class="media"><a class="pull-left" href="#"> <img
									class="media-object" src="images/photos/22.jpg" alt="">
							</a>
								<div class="media-body">
									<a href="#"><h4 class="media-heading"><?php echo $user_favor['note_title']." DAY  : ".$user_favor['log_day'] ;?></h4></a>
										<?php echo $user_favor['log_description']. "<br>".  $user_favor['log_time'];?>
										</div></li>
							<hr>
										<?php }?>
							</ul>
					</div>

					<div class="tab-pane fade" id="log_comments">
						<div class="page-header">
							<h1>Log Comments</h1>
						</div>
						<ul class="media-list">
									<?php
									while ( $user_log_comms = mysql_fetch_array ( $user_log_comms_result ) ) {
										?><li class="media"><a class="pull-left" href="#"> <img
									class="media-object" src="images/photos/22.jpg" alt="">
							</a>
								<div class="media-body">
									<a href="#"><h4 class="media-heading"><?php echo $user_log_comms['name'];?></h4></a>
										<?php echo $user_log_comms['content']. "<br>".  $user_log_comms['comm_time'];?>
										</div></li>
							<hr>
										<?php }?>		
							</ul>
					</div>
					<div class="tab-pane fade" id="message_reply">
						<div class="page-header">
							<h1>Messages</h1>
							<ul class="media-list">
									<?php
									while ( $user_messages = mysql_fetch_array ( $user_messages_result ) ) {
										?><li class="media"><a class="pull-left" href="#"> <img
										class="media-object" src="images/photos/22.jpg" alt="">
								</a>
									<div class="media-body">
										<a href="#"><h4 class="media-heading"><?php echo $user_messages['name'];?></h4></a>
										<?php echo $user_messages['content']. "<br>".  $user_messages['comm_time'];?>
										</div></li>
								<hr>
										<?php }?>		
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		</p>
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
else{
     echo "<script>alert('please login first !!');location.href='../mainpage.htm'</script>";
}
?>	

</body>
</html>