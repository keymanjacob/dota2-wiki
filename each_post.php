<?php
session_start();
ob_start();


if(!isset($_SESSION['login_name']))
{
//echo "Welcome back! ".$_SESSION['user'];
    unset($_SESSION['login_name']);  
    session_destroy();  
    $redirect_page = "login.php";
    header("Cache-Control: private, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header('Location: '.$redirect_page);


}
else
{
    $post_id = $_GET['pid'];
    $owner_name = $_GET['on'];
    $owner_id = $_GET['oid'];
    
    $name = $_SESSION['login_name'];

    $welcome = true;
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['login_name'];
    require_once("php/include.inc.php");
    $db = new database();
    $db->setup("root","90fgh314","localhost","mydb");
    $db->connect();

    $sql = "select * from post where post_id = '$post_id'; ";
    $res = $db->send_sql($sql);

    $res2=mysql_fetch_array($res);
    $title = $res2['title'];
    $post_time = $res2['post_time'];
    $content = $res2['content'];
    $msg = "";


    $sql11 = "select * from post_comment where post_id = '$post_id'; ";
    $res11 = $db->send_sql($sql11);


    $sql14 = "select * from user where user_id = '$owner_id';";
    $res14 = $db->send_sql($sql14);
    $res15=mysql_fetch_array($res14);
    $prolink = $res15['prolink'];

    $friend = 0;
    $sql51 = "select * from relationship where follower = '$user_id' and followee = '$owner_id'";
    $res31 = $db->send_sql($sql51);    



    if($owner_id==$user_id)
        {
            $friend = 2;
        }
        else if(mysql_fetch_array($res31))
        {
            $friend = 1;
        }else{
            $friend = 0;
        }

    
    if (isset($_POST['content'])&&(!empty($_POST['content']))) {
        $new_content = $_POST['content'];
        $new_content = addslashes($new_content);
        $new_content = strip_tags($new_content);
        $sql12 = "insert into post_comment(post_id,content,ctr_id,ctr_name) values('$post_id','$new_content','$user_id','$user_name');";
        $sql13 = "commit;";
        $res12 = $db->send_sql($sql12);
        $res13 = $db->send_sql($sql13);
        $redirect_page2 = "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid'];
        header('Location: '.$redirect_page2);
        
    }else{
        $msg = "Please type in something!";
    }




    

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

    .tl{
        font-size: 1.5em;
        color: rgb(62, 83, 115);
        background-color:rgb(237, 218, 190);
    }
    .ct{
        height: 250px;
        font-size: 1.1em;
        color: rgb(50, 51, 35);
        background-color:rgba(247, 245, 242, 0.93);
        margin-bottom: 29px;
        padding: 15px;
        margin-top: 0px;
        
    }
    .cm{
        margin-top: 0px;
        height: 160px;
        font-size: 1.1em;
        color: rgb(41, 29, 25);
        background-color:rgba(255, 253, 250, 0.93); 
        margin-bottom: 30px;
        border-radius: 5px;

    }
    .cm2{
        margin-top: 0px;
        padding-top: 10px;
        height: 160px;
        font-size: 1.1em;
        color: rgb(41, 29, 25);
        background-color:rgba(255, 253, 250, 0.93); 
        margin-bottom: 30px;
        border-radius: 5px;

    }
    .hh{
         background-color: black; height: 1px; border: 0;
    }
    .tlt{
        font-size: 1.4em;
    }
    .tlc{
        font-size: 0.7em;
    }
    *{
        font-family:'Vollkorn','serif';
    }



    #cmt{
        margin-bottom: 10px;
    }
    .ig{
        width: 100%;
    }



    #content{
    padding: 0;
    margin: 0;
   width: 100%;
   min-width: 100%;
   max-width: 100%;

  height:140px; 
  min-height:140px;  
  max-height:140px;
  margin-bottom: 10px;
}
.tx{color: black;
width: 100%;
margin: 0;
}
    #posts{
        margin-top: 1%;
        opacity: 1;
        color: white;
        height: 100%;

        margin-bottom: 2%;
        
    }
    .nnd{
    margin-left: 0px;
        margin-top: 20px;

}
.nmd{
    margin-left: 0px;
        margin-top: 20px;

}
    .sig_cp{
        margin-top:2%;
        height:350px;
        }
    .each_post{
        background-color: rgba(93, 80, 80, 0.8);
        margin-bottom: 3px;
        height: 100%;
        border-bottom: 40px rgba(93, 80, 80, 0) solid ;

    }
    @media (min-width: 768px){
    .navbar-nav{
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float:none;
    }
}

@media (min-width: 1200px) {
    .ct{
        margin-top: 0px;
    }
    
}
.nnd{
    margin-left: 0px;
        margin-top: 20px;

}
.nmd{
    margin-left: 0px;
        margin-top: 20px;

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
            
           




             
            <section class="each_post sig_cp col-md-12 row">
               <br><br>
               <section class="row">
                   <div class="col-xs-2 "><img class="ig" src="<?php echo "php/user/".$prolink;?>" alt=""></div>
                            <div class="col-xs-10 col-xs-offset-0 tl">
                                <?php echo "<strong class=\"tlt\">".$title."</strong>";?>
                                <br><?php echo "<p class=\"tlc\">Posted Date:  ".$post_time."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Composer: ".$owner_name."</p>";?>
                            </div>
               </section>


               <section class="row">
                <?php echo "<div class=\"col-xs-2 \"><form action=\"each_post.php?pid=".$post_id."&on=".$owner_name."&oid=".$owner_id."\" method=\"post\">";?>

                <?php if($friend==0)
                {
                    echo '<input id="ad1" class="nmd btn btn-primary" type="submit" name="addfriend" value="follow" /></form></div>';
                    if("follow"==$_POST['addfriend'])
                    {
                        $sql66 = "insert into relationship (follower, followee) values('$user_id','$owner_id');";
                        $sql77 = "commit;";
                        $res99 = $db->send_sql($sql66);
                        $res88 = $db->send_sql($sql77);
//$res = $db->send_sql($sql7);
                        $red2 = "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid'];
//$red2 = "a.php";
                        header('Location: '.$red2);
                    }
                }else if($friend==1)
                {
                    echo '<input id="ad1" class="nmd btn btn-danger" type="submit" name="addfriend" value="stop following" /></form></div>';

                    if("stop following"==$_POST['addfriend'])
                    {
                        $sql6 = "delete from relationship where follower = '$user_id' and followee = '$owner_id';";
                        $sql7 = "commit;";
                        $res9 = $db->send_sql($sql6);
                        $res = $db->send_sql($sql7);
                        $red2 = "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid'];
//$red2 = "a.php";
                        header('Location: '.$red2);
                    }
                }else{
                    echo '<input id="ad" class="nnd btn btn-success" type="submit" name="Yourself" value="Yourself" /></form></div>';


                }

                ?>
                   <div class="col-xs-10  ct">
                                <?php echo "<p>".$content."</p>";?>
                            </div>
               </section>
                            
                            
                            











                            
                            <hr class="col-xs-11 col-xs-offset-0">






                            <p class="col-xs-10 col-xs-offset-1"> COMMENTS </p>
                            <?php 
                                while ($res9=mysql_fetch_array($res11)) {
                                    $ctr_id = $res9['ctr_id'];
                                    $ctr_name = $res9['ctr_name'];
                                    $comment_time = $res9['comment_time'];
                                    $ctr_content = $res9['content'];

                                    $sql201 = "select * from user where user_id = '$ctr_id';";
                                    $res201 = $db->send_sql($sql201);
                                    $res21 = mysql_fetch_array($res201);
                                    $prolinkk = $res21['prolink'];



                                    echo "<div class=\"col-xs-2 \"><img class=\"ig\" src=\"php/user/".$prolinkk."\" alt=\"\"></div><div class=\"col-xs-10 col-xs-offset-0 cm\"><br>".$ctr_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;said at:&nbsp;".$comment_time.": <hr class=\"hh\">".$ctr_content."<br></div>
                            ";
                                }






                            ?>
                                <?php 
                                    $new_id = $_SESSION['user_id'];
                                    $sql202 = "select * from user where user_id = '$new_id';";
                                    $res202 = $db->send_sql($sql202);
                                    $res23 = mysql_fetch_array($res202);
                                    $prolinkr = $res23['prolink'];



                                ?>
                            
                                <div class="col-xs-2 "><img class="ig" src="<?php echo "php/user/".$prolinkr;?>" alt=""></div>
                                <div class="col-xs-10 col-xs-offset-0 cm2"><form action="<?php echo "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid']."\" method=\"post\"";?>"><textarea  class="tx" name = "content" id="content" value="" size="100%" maxlength="200"  placeholder=""></textarea><input id="cmt" class="col-md-3 col-md-offset-1 col-xs-3 col-xs-offset-1 btn btn-primary" type="submit" value="Submit"><input class="col-md-3 col-md-offset-3 col-xs-3 col-xs-offset-3 btn btn-warning" type="reset" value="reset"></form>
                                </div>
                         



                        
                      
                       



            </section>
            
            

            <?php


            if(isset($_POST['topic'])&&isset($_POST['content']))
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
    $('#cmt').click(function(){
        //alert('Please complete all blank fields!');
        var tp = $("#content").val();

        //alert("this is tp:"+tp);
        
        if(tp==""||tp==null){
            alert('Please complete all blank fields!');
        }


    });



    </script>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>