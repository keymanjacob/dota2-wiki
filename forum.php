<?php
session_start();
ob_start();



?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset = "utf-8"/>
    <title>Dota2 Wikipedia</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/Dota2_index.css" >
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    




    <?php 



if(!isset($_SESSION['login_name']))
{
//echo "Welcome back! ".$_SESSION['user'];
    unset($_SESSION['login_name']);  
    session_destroy();  
    $redirect_page = "Dota2_index.php";
    header("Cache-Control: private, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header('Location: '.$redirect_page);


}
else
{
    $name = $_SESSION['login_name'];
    $iid = md5($_SESSION['user_id']);

    if (isset($_GET['mypost'])&&($_GET['mypost']==$iid))
    {

        $welcome = true;
        $owner_id = $_SESSION['user_id'];
        $owner_name = $_SESSION['login_name'];
        require_once("php/include.inc.php");
        $db = new database();
        $db->setup("root","90fgh314","localhost","mydb");
        $db->connect();

        $sql = "select * from post where owner_id = '$owner_id'; ";
        $res = $db->send_sql($sql);

        ?>
        <script>
        

        $(document).ready(function(){
            $("#act").removeClass("active");
            $("#uact").addClass("active");
        });
        


        </script>

<?php
        
    }else
    {
        $welcome = true;
        $owner_id = $_SESSION['user_id'];
        $owner_name = $_SESSION['login_name'];
        require_once("php/include.inc.php");
        $db = new database();
        $db->setup("root","90fgh314","localhost","mydb");
        $db->connect();

        $sql = "select * from post where 1; ";
        $res = $db->send_sql($sql);






    }
    


    

}

    ?>
    <style>
    #act2{
        display: none;
    }
    .zz{
        z-index: 1;
    }
    #paside{
        position: fixed;
    }
    #allposts{
        
        margin-bottom: 50px;
    }
    .profile{
        width: 100%;
    }
    .pp{
        font-size: 1.2em;
    }
    .ppt{
        font-size: 0.9em;
        color: green;
    }
    a .aa{
        color: green;
    }
    #posts{
        margin-top: 5%;
        opacity: 1;
        color: rgba(33, 33, 33, 0.97);
        height: 100%;
        min-height: 360px;
        
        
    }
    .each_post{
        background-color: white;
        margin-bottom: 3px;
    }
    @media (min-width: 768px){
    .navbar-nav{
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float:none;
    }
}
@media (max-width: 1000px){
    #nav111 {
    margin-top: 100px;
}
}
@media (max-width: 768px){
    #paside {
    display: none;
}
#nav111 {
    margin-top: 60px;
}
#act{
        display: inline-block;
        
        border-radius: 5px; 
    
}
#uact{
        display: inline-block;
        
        border-radius: 5px; 
    
}
#act2{
        display: inline-block;
        background-color:#133e13;
        border-radius: 5px; 
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

       </script>
</head>
<body class="container">

    <div id="nav111" class = "row">

       
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
                                <li><a href="#">Puzzle Games</a></li>
                            </ul>
                        </li>
                         <li id="para"><a id="signin" href="#" data-toggle="modal" data-target="#SignIn">Hi! <?php echo $name;?>. Welcome back!</a></li>
                        
                        <li id="para2"><a href="logout.php" > &nbsp;&nbsp;log out </a></li>
            </ul>


    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>


        <!--  end of nav bar -->
        <div id = "posts" class="col-md-10 col-md-offset-1 col-sm-11 col-sm-offset-1 row">
           


            <section id = "paside" class="col-md-2 col-sm-2 row">
            

                    <div class="thumbnail row">
                        <?php 
                        $sqlz = "select * from user where user_id = '$owner_id';";
                        $resz = $db->send_sql($sqlz);
                        $reszz = mysql_fetch_array($resz);
                        $prolink = $reszz['prolink'];
                        $myname = $reszz['user_name'];
                        $time = $reszz['Time'];


                        ?>
                        <img class="profile" src="<?php echo "php/user/".$prolink;?>" alt="">
                        <div class="caption">
                            <h3><?php echo $myname;?></h3>
                            <p><?php echo $time;?></p>
                            <p><a href="compose.php" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 btn btn-primary" role="button">Compose</a> <br><br><a href="php/user/persons.php" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 btn btn-default" role="button">My Profile</a><br></p>
                        </div>
                    </div>



            
              
           </section>



           










           <section id="allposts" class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-3 row">
            
            <ul class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 list-unstyled nav-tabs">
                <li id="act" class="active"><a href="forum.php">All Posts</a></li>
                <li id="uact" class=""><?php echo "<a href=\"forum.php?mypost=".md5($_SESSION['user_id'])."\">My Posts</a>";?></li>
                <li id="act2" class=""><a href="compose.php">Compose</a></li>
            </ul>




            
            <?php 
while($res2=mysql_fetch_array($res)){
    $title = $res2['title'];
    $owner_name = $res2['owner_name'];
    $post_time = $res2['post_time'];
    $post_id = $res2['post_id'];
    $owner_id = $res2['owner_id'];





    
    $receiving = 201;

    
     echo "<a class=\"col-md-11 col-md-offset-1 aa\" href='each_post.php?pid=".$post_id."&on=".$owner_name."&oid=".$owner_id."'><section class=\"panel panel-default\"><section class=\"panel-heading\">
    <strong class=\"panel-title pp\">".$title."</strong></section><p class=\"panel-body ppt\">Composer: ".$owner_name."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Date: ".$post_time."</p></section></a>";

    

}

?> 
           

           </section>
           
            




        
        </div>


    </div>
    
    <div class="modal fade" id="info">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p><h1>Brief Intro to DotA 2</h1></p>
        </div>
        <div class="modal-body">
          <div id="form_head" class="row">
            <p class="form_text col-md-8 row">
                <label class="col-md-4" for="name">Your Name &nbsp;</label><input class="col-md-6" id="name" type="text"><br>
                <label class="col-md-4" for="email">Email Address &nbsp;</label><input class="col-md-6" id="email" type="text"><br>
                <label class="col-md-4" for="passwd">Password &nbsp;</label><input class="col-md-6" id="passwd" type="text"><br>
                <label class="col-md-4" for="qr">QR Code &nbsp;</label><input class="col-md-6" id="qr" type="text"><br>
                
            </p>
            <p id="qrcd" class="col-md-4">
                不认识汉字就滚
            </p>
            <p class="col-md-12 row">
            <button class="col-md-3 btn btn-primary">Sign in</button>
            <button class="col-md-3 col-md-offset-1 btn btn-default">Reset</button>
            <button class="col-md-3 col-md-offset-1 btn btn-default">Sign up</button>
            </p>
            
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">close</button>
           <button class="btn btn-primary" data-dismiss="modal">I know it</button>
        </div>
      </div>
    </div>
  </div>









    <footer id="ftr" class="row">
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
            <li><img class="icn_footer" src="fb.png" alt=""><img class="icn_footer" src="tr.png" alt=""><img class="icn_footer" src="rr.png" alt=""><img class="icn_footer" src="wb.png" alt=""></li>
            <li>Donate For Our Website!</li>
        </ul>





    </footer>
       

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>