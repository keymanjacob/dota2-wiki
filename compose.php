<?php
session_start();
ob_start();


if(!isset($_SESSION['login_name']))
{
    unset($_SESSION['login_name']);  
    session_destroy();  
    $redirect_page = "login.php";
    header("Cache-Control: private, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header('Location: '.$redirect_page);


}
else
{
    $name=$_SESSION['login_name'];

    $welcome = true;
    $owner_id = $_SESSION['user_id'];
    $owner_name = $_SESSION['login_name'];
    require_once("php/include.inc.php");
    $db = new database();
    $db->setup("root","90fgh314","localhost","mydb");
    $db->connect();
}



?>


<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset = "utf-8"/>
    <title>Dota2 Wikipedia</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/Dota2_index.css" >
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    
    <style>
    #content{

  width: 100%; 
  min-width:100%; 
  max-width:100%; 

  height:400px; 
  min-height:400px;  
  max-height:400px;
}
.tx{color: black;}
    #posts{
        margin-top: 2%;
        opacity: 1;
        color: white;
        height: 600px;

        margin-bottom: 2%;
        
    }
    .sig_cp{
        margin-top:2%;
        height:350px;
        }
    .each_post{
        background-color: rgba(93, 80, 80, 0.8);
        margin-bottom: 3px;
        height: 600px;
    }
    @media (min-width: 768px){
    .navbar-nav{
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float:none;
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
        <div id = "posts" class="col-md-10 col-md-offset-1 row">
           
           <section class="col-md-12 row">
            
            




             
            <section class="each_post sig_cp col-md-12">
               <br><br>
                    <form class="form-horizontal" action="compose.php" method="post" role="form">

                        <div class="form-group">
                            <label for="topic" class="col-sm-1 control-label"><strong>Topic</strong></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control tx" name="topic" id="topic" placeholder="Some interesting topic">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="content" class="col-sm-1 control-label"><strong>Content</strong></label>
                            <div class="col-sm-10">
                                <textarea class="tx" name = "content" id="content" value="" size="500" maxlength="500"  placeholder=""></textarea>
                            </div>
                        </div>
                         



                        
                      
                        <button id="checkct" class ="col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1 btn btn-success">Post</button><button class ="col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1 btn btn-info" type="reset" value="Reset">Reset</button>

                    </form>


                




            </section>
            
            

            <?php


            if(isset($_POST['topic'])&&isset($_POST['content'])&&(!empty($_POST['topic']))&&(!empty($_POST['content'])))
            {
               $title = addslashes($_POST['topic']);
               $content =addslashes($_POST['content']);
               $sql = "insert into post(owner_id,owner_name,title,content) values('$owner_id','$owner_name','$title','$content');";
               $sql2 = "commit;";
               $res = $db->send_sql($sql);
               $res2 = $db->send_sql($sql2);
               $red2 = "forum.php";
               header('Location: '.$red2);
           }else{
               
           }



           ?>

           </section>
           
            




        
        </div>


    </div>
    
    









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
            <li><img class="icn_footer" src="fb.png" alt=""><img class="icn_footer" src="tr.png" alt=""><img class="icn_footer" src="rr.png" alt=""><img class="icn_footer" src="wb.png" alt=""></li>
            <li>Donate For Our Website!</li>
        </ul>





    </footer>

    <script>
    $('#checkct').click(function(){
        var tp = document.getElementById('topic').value;
        var cnt = document.getElementById('content').value;

        if(tp==""||cnt==""||tp==null||cnt==null){
            alert('Please complete all blank fields!');
        }


    });



    </script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>