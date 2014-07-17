<?php

session_start();

?>


	


<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset = "utf-8"/>
		<title>Dota2 Wikipedia</title>
		<link rel="stylesheet" href="css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="css/Dota2_index.css" >
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script>    
        
        function login( x ){
      var a = document.createElement("a");
      var text = document.createTextNode("Hi! "+x+". Welcome back!");
      a.appendChild(text);
      a.href="./php/personal/personalPage.php";
      
      var par = document.getElementById("para");
      var st = document.getElementById("signin");
      par.replaceChild(a,st);
       
    }
    
        function logout(){
      var a = document.createElement("a");
      var text = document.createTextNode("|  Logout");
      a.appendChild(text);
      a.href="./php/Logout.php";
      
      var par = document.getElementById("para2");
      var st = document.getElementById("signup");
      par.replaceChild(a,st);
       
    }</script>
  <script>
  var fb_name = "";
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '868368846523675',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!'+response.email;
        fb_name = response.name;
        //alert(fb_name);
        $("#fb_form").attr("action","php/user/SignIn.php?fbn="+fb_name+"&flag=777");
        showBtn();
    });
  }
  if(fb_name==""||fb_name==null){

  }else{
    //alert(fb_name);
    

  }
</script>






        <style>
            
            .herobig{
                position: absolute;
                left: 10px;
                top: 20px;
                width:0px;
                -webkit-transition:width 0.3s linear 0s;
                transition:width 0.3s linear 0s;
                z-index:10;
            }
            .heros:hover + .herobig{
                width:360px;
            }

            table{
              color: #c49d00;
            }
            #ktv{
              margin-top: -30px;
            }
            
          #fb_lg{
            display: none;
            
          }


            .flip3D{ 
                width:180px; 
                height:150px; 
                margin:10px; 
                float:left; 
                margin:15px;}
            .flip3D > .front{
                position:absolute;
                -webkit-transform: perspective( 600px ) rotateY( 0deg );
                transform: perspective( 600px ) rotateY( 0deg );
                background:#FC0; width:180px; height:150px; border-radius: 7px;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                transition: -webkit-transform .5s linear 0s;
                transition: transform .5s linear 0s;
            }
            .flip3D > .back{
                position:absolute;
                -webkit-transform: perspective( 600px ) rotateY( 180deg );
                transform: perspective( 600px ) rotateY( 180deg );
                background: #80BFFF; width:180px; height:150px; border-radius: 7px;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                transition: -webkit-transform .5s linear 0s;
                transition: transform .5s linear 0s;
            }
            .flip3D:hover > .front{
                -webkit-transform: perspective( 600px ) rotateY( -180deg );
                transform: perspective( 600px ) rotateY( -180deg );
            }
            .flip3D:hover > .back{
                -webkit-transform: perspective( 600px ) rotateY( 0deg );
                transform: perspective( 600px ) rotateY( 0deg );
            }
            .flip{
                width: 180px;
                height: 150px;
                
            }
            @media (min-width: 768px){
    .navbar-nav{
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float:none;
    }
}
@media (max-width: 977px){
    #this-carousel-id{
      margin-top: 100px;
    }
}
@media (max-width: 768px){
    #this-carousel-id{
      margin-top: 40px;
    }
}


        </style>


        <script>


       $(document).ready(function(){
        
        $("#br").hover(function(){

         $(this).attr("src","./icon/2.png");
        });
        
        $("#br").mouseleave(function(){

         $(this).attr("src","./icon/1.png");
        });


       });

       function showBtn(){

      $("#fb_btn").hide();
    $("#fb_lg").show();
    
       }

       </script>
	</head>
	<body class="container">


<?php
if(isset($_SESSION['login_name'])){
    
    $name=$_SESSION['login_name'];
    $_SESSION['valid_user']=$_SESSION['login_name'];
    
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

?>	
        

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
                    <a  class="navbar-brand " href="Dota2_index.php"><img id="br" src="./icon/1.png" width="130" height="33"></a>
                </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
                        <li class=""><a href="php/user/persons.php">MYPROFILE</a></li>
                        <li class=""><a href="heros.html#/items">ITEMS</a></li>
                        <li class=""><a href="heros.html">HEROPEDIA</a></li>

                        <li class=""><a href="forum.php">FORUM</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MORE<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="chat.php">CHATROOM</a></li>
                                <li><a href="php/friend/friend.php">My Friends</a></li>
                                <li><a href="php/email/email.php">Email Center</a></li>


                                <li class="divider"></li>
                                <li><a href="puzzle.html">Puzzle Games</a></li>        
                            </ul>
                        </li>
                        <li id="para"><a id="signin" href="#" data-toggle="modal" data-target="#SignIn">Login in</a></li>
                        
                        <li id="para2"><a id="signup" href="#" data-toggle="modal" data-target="#SignUp"> &nbsp;&nbsp;Sign up </a></li>
      </ul>


    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
        

        
          <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign in now!</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="./php/user/SignIn.php" method="post" role="form">
       
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
       <input type="submit" value="Submit" class="btn btn-default" >
      
        </form>
         <fb:login-button scope="public_profile,email" id="fb_btn"  onlogin="checkLoginState();">
</fb:login-button>
<form id="fb_form" action="" method = "POST"><input id="fb_lg" type="submit" value="Facebook" class="btn btn-primary" >
      </form>
      <script>

        
      </script>
      <div id="status">
</div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="SignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign in now!</h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="./php/user/SignUp.php" method="post" role="form">
       
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
     
       <input type="submit" value="Submit" class="btn btn-default" >

        </form>
        
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
        
    <?php
        
        if(!empty($name)){
       
    ?>
    <script type="text/javascript" >
    var x = "<?php echo $name ?>";
    login(x);
    logout();
   
    </script>
    <?php 
                          }
    ?>	
        
        
        <section  class="row">
        <div id="this-carousel-id" class="carousel slide col-md-10 col-md-offset-1"><!-- class of slide for animation -->
            <ol class="carousel-indicators">
                <li data-target="#this-carousel-id" data-slide-to="0" class="active"></li>
                <li data-target="#this-carousel-id" data-slide-to="1"></li>
                <li data-target="#this-carousel-id" data-slide-to="2"></li>
                <li data-target="#this-carousel-id" data-slide-to="3"></li>
                <li data-target="#this-carousel-id" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active"><!-- class of active since it's the first item -->
                    <img class="slidesshow" src="dd.jpg" alt="" />
                    <div class="carousel-caption">
                        <p class="illus"></p>
                    </div>
                </div>
                <div class="item">
                    <img class="slidesshow" src="p.jpg" alt="" />
                    <div class="carousel-caption">
                        <p class="illus">Phantom Assassin</p>
                    </div>
                </div>
                <div class="item">
                    <img class="slidesshow" src="sven.png" alt="" />
                    <div class="carousel-caption">
                        <p class="illus">Sven</p>
                    </div>
                </div>
                <div class="item">
                    <img class="slidesshow" src="invoker.png" alt="" />
                    <div class="carousel-caption">
                        <p class="illus">Invoker</p>
                    </div>
                </div>
                <div class="item">
                    <img class="slidesshow" src="ww.png" alt="" />
                    <div class="carousel-caption">
                        <p class="illus">Lina VS Crystal Maiden</p>
                    </div>
                </div>

            </div><!-- /.carousel-inner -->
<!--  Next and Previous controls below
    href values must reference the id for this carousel -->
    <a class="carousel-control left" href="#this-carousel-id" data-slide="prev"><div class="inccc"><img class="myicn" src="l.png" alt=""></div></a>
    <a class="carousel-control right" href="#this-carousel-id" data-slide="next"><div class="inccc"><img class="myicn" src="r.png" alt=""></div></a>
</div><!-- /.carousel -->


</section>
<section id="intro" class="row">
    <article class="col-md-10 col-md-offset-1">
        <p id="D2">Defense of the Ancients 2</p>
        <section class="row">

            <div class="col-md-4 hidden-sm hidden-xs" id="myTypingText"></div>
            <div class="col-md-4 hidden-lg hidden-md" style="color:white;" >Dota 2 is a multiplayer online battle arena (MOBA) video game and the stand-alone sequel to the Defense of the Ancients (DotA) mod. Developed by Valve Corporation, the game was officially released on July 9, 2013 as a free-to-play title for Microsoft Windows, concluding a beta testing phase that began in 2011.</div>
            <hr><aside class="col-md-8"><img id="intros" src="D1.jpg" alt=""></aside>
        </section>

        <section class="row"> 
            <aside class="col-md-8"><img id="intros2" src="D2.jpg" alt=""></aside>

            <div class="col-md-4 hidden-sm hidden-xs" id="myTypingText2"></div>
            <div class="col-md-4 hidden-lg hidden-md" style="color:white;">Each match of Dota 2 is independent and involves two teams, both containing five players and each occupying a stronghold at either end of the map. Located in each stronghold is a building called the "Ancient"; to win, a team must destroy the enemy's Ancient.</div>
         </section>
         <section class="row last">
            <hr>
            <p class="section_name hidden-sm hidden-xs">Popular heros</p>
            <p class="col-md-6 row hidden-sm hidden-xs">

                <img id="1" class="col-md-4 heros" src="img2/0.jpg" alt="">
                <img class="herobig" src="img2/0.jpg" alt="">
                <img id="2" class="col-md-4 heros" src="img2/1.jpg" alt="">
                <img class="herobig" src="img2/1.jpg" alt="">
                <img id="3" class="col-md-4 heros" src="img2/2.jpg" alt="">
                <img class="herobig" src="img2/2.jpg" alt="">
                <img id="4" class="col-md-4 heros" src="img2/3.jpg" alt="">
                <img class="herobig" src="img2/3.jpg" alt="">
                <img id="5" class="col-md-4 heros" src="img2/4.jpg" alt="">
                <img class="herobig" src="img2/4.jpg" alt="">
                <img id="6" class="col-md-4 heros" src="img2/5.jpg" alt="">
                <img class="herobig" src="img2/5.jpg" alt="">
                <img id="7" class="col-md-4 heros" src="img2/6.jpg" alt="">
                <img class="herobig" src="img2/6.jpg" alt="">
                <img id="8" class="col-md-4 heros" src="img2/7.jpg" alt="">
                <img class="herobig" src="img2/7.jpg" alt="">
                <img id="9" class="col-md-4 heros" src="img2/8.jpg" alt="">
                <img class="herobig" src="img2/8.jpg" alt="">
                <img id="10" class="col-md-4 heros" src="img2/9.jpg" alt="">
                <img class="herobig" src="img2/9.jpg" alt="">
                <img id="11" class="col-md-4 heros" src="img2/10.jpg" alt="">
                <img class="herobig" src="img2/10.jpg" alt="">
                <img id="12" class="col-md-4 heros" src="img2/11.jpg" alt="">
                <img class="herobig" src="img2/11.jpg" alt="">
                
                 
            </p>
            <p class="col-md-6 row">

                <p id="msg" class="hidden-sm hidden-xs"><strong>EARTHSHAKER</strong> <BR>Like a golem or gargoyle, Earthshaker was one with the earth but now walks freely upon it. Unlike those other entities, he created himself through an act of will, and serves no other master. In restless slumbers, encased in a deep seam of stone, he became aware of the life drifting freely above him. He grew curious. During a season of tremors, the peaks of Nishai shook themselves loose of avalanches, shifting the course of rivers and turning shallow valleys into bottomless chasms. When the land finally ceased quaking, Earthshaker stepped from the settling dust, tossing aside massive boulders as if throwing off a light blanket. He had shaped himself in the image of a mortal beast, and named himself Raigor Stonehoof. He bleeds now, and breathes, and therefore he can die. But his spirit is still that of the earth; he carries its power in the magical totem that never leaves him. 
                    
                </p>
                
                 
            </p>
            <table class="table table-hover col-sm-12 hidden-lg hidden-md ">
        <thead>
          <tr>
            <th style="font-size:1.5em;">Popular Heros </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="heros.html#/hero/Earthshaker">EarthShaker</a></td>
          </tr>
          <tr>
            <td><a href="heros.html#/hero/Windranger">WindRanger</a></td>
          </tr>
          <tr>
            <td><a href="heros.html#/hero/Pudge">Pudge</a></td>
          </tr>
          <tr>
            <td><a href="heros.html#/hero/Drow%20Ranger">Drow Ranger</a></td>
          </tr>
          <tr>
            <td><a href="heros.html#/hero/Sniper">Sniper</a></td>
          </tr>
        </tbody>
      </table>
<table id="ktv" class="table table-hover col-sm-12 hidden-lg hidden-md ">
        <thead>
          <tr>
            <th style="font-size:1.5em;">Check these stunning sets!!! </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="">Aria of the Wild Wind Set</a></td>
          </tr>
          <tr>
            <td><a href="">Regalia of the Wraith Lord Set</a></td>
          </tr>
          <tr>
            <td><a href="">Warrior's Retribution Set</a></td>
          </tr>
          <tr>
            <td><a href="">The Paleogeneous Punisher Set</a></td>
          </tr>
          <tr>
            <td><a href="">Vestments of the Fallen Princess</a></td>
          </tr>
          <tr>
            <td><a href="">Warrior's Retribution Set</a></td>
          </tr>
        </tbody>
      </table>



             
        </section>
        <hr>
        <div class="row hidden-sm hidden-xs">
            
            <p id="set">Check these stunning sets!!!</p>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="cm2.png" alt=""></div>
                <div class="front"><img class="flip" src="cm.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="ld2.png" alt=""></div>
                <div class="front"><img class="flip" src="ld.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="ln2.png" alt=""></div>
                <div class="front"><img class="flip" src="ln.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="ck2.png" alt=""></div>
                <div class="front"><img class="flip" src="ck.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="cc2.png" alt=""></div>
                <div class="front"><img class="flip" src="cc.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="wr2.png" alt=""></div>
                <div class="front"><img class="flip" src="wr.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="pa2.png" alt=""></div>
                <div class="front"><img class="flip" src="pa.png" alt=""></div>

            </div>
            <div class="flip3D col-xs-4">
                <div class="back"><img class="flip" src="lc2.png" alt=""></div>
                <div class="front"><img class="flip" src="lc.png" alt=""></div>

            </div>
        </div>
        
    </article>


</section>



   
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
        <li><a href="http://www.dota2.com/news/updates/">more</a></li>
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
        <li><a href="https://www.facebook.com/dota2?ref=br_tf"><img class="icn_footer" src="fb.png" alt=""></a><a href="https://twitter.com/DOTA2"><img class="icn_footer" src="tr.png" alt=""></a><a href="http://page.renren.com/dota"><img class="icn_footer" src="rr.png" alt=""></a><a href="http://www.weibo.com/dota2comcn#1400075187625"></a><a href="http://www.weibo.com/dota2comcn#1400075187625"><img class="icn_footer" src="wb.png" alt=""></a></li>
        <li>Donate For Our Website!</li>
    </ul>
        




    </footer>


		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script>
        
        /*
        $(".heros" ).hover(
            function() {
            $("#msg").html("datadsadsadsadasdsadsadasd");
            
        });
        $(".heros" ).mouseleave(
            function() {
            $("#msg").html("IO");
            
        });
*/
        $( "#1" ).hover(
            function() {
                $("#msg").html( "<strong>EARTHSHAKER</strong> <BR>Like a golem or gargoyle, Earthshaker was one with the earth but now walks freely upon it. Unlike those other entities, he created himself through an act of will, and serves no other master. In restless slumbers, encased in a deep seam of stone, he became aware of the life drifting freely above him. He grew curious. During a season of tremors, the peaks of Nishai shook themselves loose of avalanches, shifting the course of rivers and turning shallow valleys into bottomless chasms. When the land finally ceased quaking, Earthshaker stepped from the settling dust, tossing aside massive boulders as if throwing off a light blanket. He had shaped himself in the image of a mortal beast, and named himself Raigor Stonehoof. He bleeds now, and breathes, and therefore he can die. But his spirit is still that of the earth; he carries its power in the magical totem that never leaves him." );
           
        });
        $( "#2" ).hover(
            function() {
                $("#msg").html( "<strong>SVEN</strong> <br>Sven is the bastard son of a Vigil Knight, born of a Pallid Meranth, raised in the Shadeshore Ruins. With his father executed for violating the Vigil Codex, and his mother shunned by her wild race, Sven believes that honor is to be found in no social order, but only in himself. After tending his mother through a lingering death, he offered himself as a novice to the Vigil Knights, never revealing his identity. For thirteen years he studied in his father's school, mastering the rigid code that declared his existence an abomination. Then, on the day that should have been his In-Swearing, he seized the Outcast Blade, shattered the Sacred Helm, and burned the Codex in the Vigil's Holy Flame. He strode from Vigil Keep, forever solitary, following his private code to the last strict rune. Still a knight, yes...but a Rogue Knight. He answers only to himself. " );
           
        });
        $( "#3" ).hover(
            function() {
                $("#msg").html( "<strong>TINY</strong> <br>Coming to life as a chunk of stone, Tiny's origins are a mystery on which he continually speculates. He is a Stone Giant now, but what did he used to be? A splinter broken from a Golem's heel? A shard swept from a gargoyle-sculptor's workshop? A fragment of the Oracular Visage of Garthos? A deep curiosity drives him, and he travels the world tirelessly seeking his origins, his parentage, his people. As he roams, he gathers weight and size; the forces that weather lesser rocks, instead cause Tiny to grow and ever grow.   " );
           
        });
        $( "#4" ).hover(
            function() {
                $("#msg").html( "<strong>KUNKKA</strong> <br>As The Admiral of the mighty Claddish Navy, Kunkka was charged with protecting the isles of his homeland when the demons of the Cataract made a concerted grab at the lands of men. After years of small sorties, and increasingly bold and devastating attacks, the demon fleet flung all its carnivorous ships at the Trembling Isle. Desperate, the Suicide-Mages of Cladd committed their ultimate rite, summoning a host of ancestral spirits to protect the fleet. Against the demons, this was just barely enough to turn the tide. As Kunkka watched the demons take his ships down one by one, he had the satisfaction of wearing away their fleet with his ancestral magic. But at the battle's peak, something in the clash of demons, men and atavistic spirits must have stirred a fourth power that had been slumbering in the depths. The waves rose up in towering spouts around the few remaining ships..." );
           
        });
        $( "#5" ).hover(
            function() {
                $("#msg").html( "<strong>BEASTMASTER</strong> <br>Karroch was born a child of the stocks. His mother died in childbirth; his father, a farrier for the Last King of Slom, was trampled to death when he was five. Afterward Karroch was indentured to the king's menagerie, where he grew up among all the beasts of the royal court: lions, apes, fell-deer, and things less known, things barely believed in. When the lad was seven, an explorer brought in a beast like none before seen. Dragged before the King in chains, the beast spoke, though its mouth moved not. Its words: a plea for freedom. The King only laughed and ordered the beast perform for his amusement; and when it refused, struck it with the Mad Scepter and ordered it dragged to the stocks. Over the coming months, the boy Karroch sneaked food and medicinal draughts to the wounded creature, but only managed to slow its deterioration..." );
           
        });
        $( "#6" ).hover(
            function() {
                $("#msg").html( "<strong>DRAGON KNIGHT</strong> <br>After years on the trail of a legendary Eldwurm, the Knight Davion found himself facing a disappointing foe: the dreaded Slyrak had grown ancient and frail, its wings tattered, its few remaining scales stricken with scale-rot, its fangs ground to nubs, and its fire-gouts no more threatening than a pack of wet matchsticks. Seeing no honor to be gained in dragon-murder, Knight Davion prepared to turn away and leave his old foe to die in peace. But a voice crept into his thoughts, and Slyrak gave a whispered plea that Davion might honor him with death in combat. Davion agreed, and found himself rewarded beyond expectation for his act of mercy: As he sank his blade in Slyrak's breast, the dragon pierced Davion's throat with a talon. As their blood mingled, Slyrak sent his power out along the Blood Route, sending all its strength and centuries of wisdom to the knight..." );
           
        });
        $( "#7" ).hover(
            function() {
                $("#msg").html( "<strong>CLOCKWERK</strong> <br>Rattletrap descends from the same far-flung kindred as Sniper and Tinker, and like many of the Keen Folk, has offset his diminutive stature through the application of gadgetry and wit. The son of the son of a clockmaker, Rattletrap was many years apprenticed to that trade before war rode down from the mountains and swept the plains villages free of such innocent vocations. Your new trade is battle, his dying father told him as the village of their ancestors lay in charred and smoking ruins. It is a poor tradesman who blames his tools, and Rattletrap was never one to make excuses. After burying his father among the ruins of their village, he set about to transform himself into the greatest tool of warfare that any world had ever seen. He vowed to never again be caught unprepared, instead using his talents to assemble a suit of powered Clockwerk armor..." );
           
        });
        $( "#8" ).hover(
            function() {
                $("#msg").html( "<strong>OMNIKNIGHT</strong> <br>Purist Thunderwrath was a hard-fighting, road-worn, deeply committed knight, sworn to the order in which he had grown up as squire to elder knights of great reputation. He had spent his entire life in the service of the Omniscience, the All Seeing One. Theirs was a holy struggle, and so embedded was he in his duty that he never questioned it so long as he had the strength to fight and the impetuous valor that comes with youth. But over the long years of the crusade, as his elders passed away and were buried in sorry graves at the side of muddy tracks, as his bond-brothers fell in battle to uncouth creatures that refused to bow to the Omniscience, as his own squires were chewed away by ambush and plague and bad water, he began to question the meaning of his vows--the meaning of the whole crusade..." );
           
        });
        $( "#9" ).hover(
            function() {
                $("#msg").html( "<strong>HUSKAR</strong> <br>Emerging from the throes of the sacred Nothl Realm, Huskar opened his eyes to see the prodigal shadow priest Dazzle working a deep incantation over him. Against the ancient rites of the Dezun Order, Huskar's spirit had been saved from eternity, but like all who encounter the Nothl he found himself irrevocably changed. No longer at the mercy of a mortal body, his very lifeblood became a source of incredible power; every drop spilled was returned tenfold with a fierce, burning energy. However this newfound gift infuriated Huskar, for in his rescue from the Nothl, Dazzle had denied him a place among the gods. He had been denied his own holy sacrifice. In time the elders of the order sought to expand their influence and Huskar, they agreed, would be a formidable tool in their campaign. Yet becoming a mere weapon for the order that denied him his birthright only upset him further. As the first embers of war appeared on the horizon, he fled his ancestral home..." );
           
        });
        $( "#10" ).hover(
            function() {
                $("#msg").html( "<strong>ALCHEMIST</strong> <br>The sacred science of Chymistry was a Darkbrew family tradition, but no Darkbrew had ever shown the kind of creativity, ambition, and recklessness of young Razzil. However, when adulthood came calling he pushed aside the family trade to try his hand at manufacturing gold through Alchemy. In an act of audacity befitting his reputation, Razzil announced he would transmute an entire mountain into gold. Following two decades of research and spending and preparation, he failed spectacularly, quickly finding himself imprisoned for the widespread destruction his experiment wrought. Yet Razzil was never one to take a setback lightly, and sought escape to continue his research. When his new cellmate turned out to be a fierce ogre, he found just the opportunity he needed. After convincing the ogre not to eat him, Razzil set about carefully concocting a tincture for it to drink, made from the moulds and mosses growing in the prison stone work. In a week's time, it seemed ready..." );
           
        });
        $( "#11" ).hover(
            function() {
                $("#msg").html( "<strong>BREWMASTER</strong> <br>Deep in the Wailing Mountains, in a valley beneath the Ruined City, the ancient Order of the Oyo has for centuries practiced its rites of holy reverie, communing with the spirit realm in grand festivals of drink. Born to a mother's flesh by a Celestial father, the youth known as Mangix was the first to grow up with the talents of both lineages. He trained with the greatest aesthetes of the Order, eventually earning, through diligent drunkenness, the right to challenge for the title of Brewmaster, that appellation most honored among the contemplative malt-brewing sect. As much drinking competition as mortal combat, Mangix for nine days drank and fought the elder master. For nine nights they stumbled and whirled, chugged and struck, until at last the elder warrior collapsed into a drunken stupor, and a new Brewmaster was named..." );
           
        });
        $( "#12" ).hover(
            function() {
                $("#msg").html( "<strong>TREANT PROTECTOR</strong> <br>Far to the west, in the mountains beyond the Vale of Augury, lie the remains of an ancient power, a fount of eldritch energy nestled deep in the high woods. It is said that the things that grow here, grow strangely. To the forces of nature this is a sacred place, made to stay hidden and unknown. Many are the traps and dangers of this land. There are all-consuming grasses, crossbred fauna and poisonous flowers, but none are so fierce as the mighty Treant Protectors. These ageless, titanic beings, charged with keeping the peace in this dangerous land, ensure that none within encroach without reason, and none without poach their secrets. For time untold they tended to their holy ground, uninterrupted, only dimly aware of the changing world beyond. Yet inevitably the wider world grew aware of this untamed land, and with each passing winter the outsiders grew bolder." );
           
        });


        </script>   
        <script>
        var myString = "Dota 2 is a multiplayer online battle arena (MOBA) video game and the stand-alone sequel to the Defense of the Ancients (DotA) mod. Developed by Valve Corporation, the game was officially released on July 9, 2013 as a free-to-play title for Microsoft Windows, concluding a beta testing phase that began in 2011.";
        var myArray = myString.split("");

        var loopTimer;
        function frameLooper() {
            if(myArray.length > 0) {
                document.getElementById("myTypingText").innerHTML += myArray.shift();
            } else {
                clearTimeout(loopTimer); 
                return false;
            }
            loopTimer = setTimeout('frameLooper()',35);
        }
        frameLooper();


        var anotherstring = "Each match of Dota 2 is independent and involves two teams, both containing five players and each occupying a stronghold at either end of the map. Located in each stronghold is a building called the \"Ancient\"; to win, a team must destroy the enemy's Ancient.";
        var newArray = anotherstring.split("");

        var loopTimer2;
        function frameLooper2() {
            if(newArray.length > 0) {
                document.getElementById("myTypingText2").innerHTML += newArray.shift();
            } else {
                clearTimeout(loopTimer2); 
                return false;
            }
            loopTimer2 = setTimeout('frameLooper2()',40);
        }
        frameLooper2();
 
        </script>
        
	</body>


</html>