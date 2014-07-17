<?php
session_start();
ob_start();


if(!isset($_SESSION['user']))
	{
		//echo "Welcome back! ".$_SESSION['user'];
		unset($_SESSION['login']);  
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
		$uuid = $_SESSION['user_id'];
		$uun = $_SESSION['user'];
		include("../include.inc.php");
        $db = new database();
        $db->setup("root","90fgh314","localhost","mydb");
		//$sql = "select * from email where receiver = '$uuid'; ";
		//$res = $db->send_sql($sql);
		$sor = $_GET['srsr'];




		$email_id = $_GET['eid'];
		$to = $_GET['sn'];
		$from = $_GET['sn'];
		$sql = "select * from email where email_id = '$email_id';";
		$res = $db->send_sql($sql);
		$res2 = mysql_fetch_array($res);
		//echo "dsadasdsa";

	}



?>


<!DOCTYPE html>
<html>
	<head>
		<title>checking emails</title>
		

			<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/Dota2_index.css" >
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

	

		<style>
	footer{
  width: 103%;
 
}

.icn_footer {
width: 80px;
margin: 10px;
height: 80px;
}
	div.welcome{
		color: white;
		position: relative;
		top: 100px;
		left: 3px;
		float: left;
		z-index: 1;



	}
	h4{
		color: red;
	}
	h1{
		color: white;
		font-family: 'Vollkorn','serif';
		color:#999;
	}
	label{
		color:white;
	}
	@media (min-width: 768px){
		.navbar-nav{
			margin: 0 auto;
			display: table;
			table-layout: fixed;
			float:none;
		}
	}

	element.style {
background-color: #222;
}
.panel-default {
border-color: #000;
background-color: #222;
}

	</style>
	</head>
	<body class="container" link = "#FF9933" vlink = "#FF9933" alink = "#FF9933">
		
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header ">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a  class="navbar-brand " href="../../Dota2_index.php"><img id="br" src="../../icon/1.png" width="130" height="33"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
          <li class=""><a href="../user/persons.php">MYPROFILE</a></li>
                        <li class=""><a href="../../heros.html#/items">ITEMS</a></li>
                        <li class=""><a href="../../heros.html">HEROPEDIA</a></li>

                        <li class=""><a href="../../forum.php">FORUM</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MORE<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../../chat.php">CHATROOM</a></li>
                                <li><a href="../friend/friend.php">My Friends</a></li>
								<li><a href="email.php">Email Center</a></li>

                                <li class="divider"></li>
                                <li><a href="#">Puzzle Games</a></li>

            </ul>
          </li>
          <li id="para"><a id="signin" href="#" data-toggle="modal" data-target="#SignIn">Hi <?php echo $_SESSION['user'];?></a></li>

          <li id="para2"><a id="signup" href="#" data-toggle="modal" data-target="#SignUp"> &nbsp;&nbsp;Log out</a></li>
        </ul>


      </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
  </nav>

<br>
<br>
<br>
<div class="panel panel-default" ><div class="panel-body"><div class="page-header"><h1>Message</h1></div></div></div>

		<div class="whole panel panel-default" >
			
			<div class="down row panel-body ">	
				<div class="left  col-lg-3 ">
					<ul id="bar" class="nav nav-pills nav-stacked" >
						<li class="li1"><a href="email.php">Inbox</a></li>
						<li class="li2"><a href="email-1.php">Compose</a></li>
						<li class="li3"><a href="email-3.php">Sent</a></li>
					</ul>		
				</div>
				<div class="right col-lg-7">

					<div class="panel panel-default">
						<div class="panel-body" style="background-color:white; border-radius:4px;">
					<div class="content">
						<div id = "showmessage">

						<?php 

						if($sor == 100)
						{
							$subject = $res2['subject'];
						//$to = $res2['receiver'];
						$time = $res2['send_date'];
						$content = $res2['mail'];

						echo '<b class="input-group">Subject: '.$subject.'</b><br/><b class="input-group">From: '.$from.'</b><br/><b class="input-group">When: '.$time.'</b><br/><b class="input-group">Content: </b><br><textarea row=10>'.$content.'</textarea>';

					}else if($sor==201)
					{
						$subject = $res2['subject'];
						//$from = $res2['sender'];
						$time = $res2['send_date'];
						$content = $res2['mail'];

						echo '<b>Subject: </b>'.$subject.'<br/><b>To: </b>'.$to.'<br><b>When: </b>'.$time.'<br/><b>Content: </b><br><p>'.$content.'</p>';
						
					}






						?>



						</div>

					</div>
					
					</div>

					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<footer class="row">
    <p id ="main_footer">&copy; all rights reserved 2014 Guanhua Fan, Guangji Wang, Zhengfei Duan</p><hr>
    <p class="col-md-3" id = "p_footer">
        <b style="color:orange; font-size:1.5em;">Like our Website?</b><br><BR>
        If you're ready to rock harder than your rivals in game, get in touch with us today!</li><BR>
        <br><br><b>CONTACT US</b>

    </p>


    <ul class="col-md-3 list-unstyled" id = "p_footer">
        <li><b>RECENT UPDATES</b></li>
        <li>&#10146;Dota2 Update 4/25/2014</li>
        <li>&#10146;Dota2 Update 3/18/2014</li>
        <li>&#10146;Dota2 Update 2/29/2014</li>
        <li><a href="#">more</a></li>
    </ul>

    <ul class="col-md-5 list-unstyled">
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Check Policy</button>
                <button type="button" class="btn btn-success">Add Bookmark</button>
                <button type="button" class="btn btn-warning">Tell Your Friends</button>
            </div>
        </li>
        <li>  <br></li>
        <li><img class="icn_footer" src="../../fb.png" alt=""><img class="icn_footer" src="../../tr.png" alt=""><img class="icn_footer" src="../../rr.png" alt=""><img class="icn_footer" src="../../wb.png" alt=""></li>
        <li>Donate For Our Website!</li>
    </ul>
        




    </footer>
			
		</div>
	</body>
	<footer>
		
	</footer>
</html>