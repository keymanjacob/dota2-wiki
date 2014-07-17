<?php

session_start();



if(!isset($_SESSION['login_name']))
{
//echo "Welcome back! ".$_SESSION['user'];
    unset($_SESSION['login_name']);  
    session_destroy();  
    $redirect_page = "../../logout.php";
    header("Cache-Control: private, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header('Location: '.$redirect_page);


}
else{

$_SESSION['user'] = $_SESSION['valid_user'];
$name =$_SESSION['user']; 

include("../include.inc.php");
$db = new database();
$db->setup("root","90fgh314","localhost","mydb");


if(isset($name)){



  $query = "select prolink from user where user_name = '$name'";
  $result=$db->send_sql($query);
  $link = mysql_fetch_array($result);

  $link = $link['prolink'];

}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/Dota2_index.css" >
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>   

//ajax function

$(document).ready(function(){   
// $("#search_results").slideUp();   
$("#saveChange").click(function(e){   
  e.preventDefault();   
  ajax_search();   

});   
$("#inputName").keyup(function(e){   
  e.preventDefault();   
//ajax_search();   
});   


var outsideCheck = 1;


function ajax_search(){   

  var username = $("#showName").html();
  var email = $("#changeEmail").val();
  var fHero = $("#changeHero").val();
  var phone = $("#changePhone").val();
  var description = $("#changeDescription").val();
  var address = $("#address").val();
  var check = 1;
  function removeHTMLTags(htmlString){
    if(htmlString){
        var mydiv = document.createElement("div");
        mydiv.innerHTML = htmlString;

if (document.all) // IE Stuff
{
    return mydiv.innerText;

}   
else // Mozilla does not work with innerText
{
    return mydiv.textContent;
}                           
}
};


    if(phone.length==""||phone.length==null)
    {
      alert("phone cannot be empty");
    check = 0;
 }
 else{

  if(!$.isNumeric(phone)){

    alert("phone should be number!");
    check = 0;
  } 

  if(phone.length>9){
      alert("phone should be less than 10 digits"); 
    check = 0;  
  }

 }



   if(email ==""||phone.length==null){
      alert("email should not be empty");
     check = 0;
   }
  if(check ==1){ 
    $.post("./find.php",{u:username,e:email,p:phone,a:address,d:description,f:fHero},function(data){   
      if(data.length>0){   
        $("#search_results").html(data);   
      }   
    }   
    ) 
    }


    outsideCheck = check;
} 

  $("#edt").click(function(){
    $(".ps").hide();
    $(".input-group").show();
    $("#edt").hide();
    $("#saveChange").show();
 
    $("#changePhone").val($("#showPhone").html());
    $("#changeHero").val($("#showHero").html());        
    $("#changeEmail").val($("#showEmail").html());
    $("#changeDescription").val($("#showDescription").html());


  });

  $("#saveChange").click(function(){
    $(".ps").show();
    $(".input-group").hide();
    $("#edt").show();
    $("#saveChange").hide();


    if(outsideCheck==1){


    $("#showPhone").html(removeHTMLTags($("#changePhone").val()));
    $("#showHero").html(removeHTMLTags($("#changeHero").val()));        
    $("#showEmail").html(removeHTMLTags($("#changeEmail").val()));
    $("#showDescription").html(removeHTMLTags($("#changeDescription").val()));
    }
  });

});
//logged in user name   

function login( x ){
  var a = document.createElement("a");
  var text = document.createTextNode("Hi! "+x+". Welcome back!");
  a.appendChild(text);
  a.href="./personalInfo.php";

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

}

</script>


<!-- Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>


footer{}

.icn_footer {
width: 80px;
margin: 10px;
height: 80px;
}
.ps{
  height:100px;
}
#edt{
  position:relative;
  bottom:20px;        
  left:80%;
}


@media (min-width: 768px){
  .navbar-nav{
    margin: 0 auto;
    display: table;
    table-layout: fixed;
    float:none;
  }
}

.panel{

  background-color: black;
  color:white;

}

.panel-default>.panel-heading {
  color: #FFF;
  background-color: #222;
  border-color: #fff;

}
.panel-default {
border-color: #000;
background-color: #222;
}
</style>





</head>

<body class="container">


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
                        <li class=""><a href="persons.php">MYPROFILE</a></li>
                        <li class=""><a href="../../heros.html#/items">ITEMS</a></li>
                        <li class=""><a href="../../heros.html">HEROPEDIA</a></li>

                        <li class=""><a href="../../forum.php">FORUM</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MORE<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../../chat.php">CHATROOM</a></li>
                                <li><a href="../friend/friend.php">My Friends</a></li>
                                <li><a href="../email/email.php">Email Center</a></li>

                                <li class="divider"></li>
                                <li><a href="#">Puzzle Games</a></li>
                            </ul>
                        </li>
                         <li id="para"><a id="signin" href="#" >Hi! <?php echo $name;?>. Welcome back!</a></li>
                        
                        <li id="para2"><a href="../../logout.php" > &nbsp;&nbsp;log out </a></li>
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
          <form class="form-horizontal" action="../../php/user/SignIn.php" method="post" role="form">

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




  <div class="row">   


    <br>



    <ul class="list-group">
      <li>
        <div class="panel panel-default"> 
          <div class="panel-body" id="showUp">  
            <div class="page-header" >
              <h1>Personal profile <small>dota2</small></h1>
            </div>
            <img  id="userPicture" src="<?php echo $link ?>" alt="" width="400px" height="300px">
            <form id="uploadPic" role="form" method = "post" enctype = "multipart/form-data"><br><input  type = "file" name = "image"/><br><input id="uploadButton" class="btn btn-primary " type = "submit" name = "upload" value = "upload now"></form>
          </div>
        </div>
      </li>

      <form role="form" method="post">

        <div id="in" class="input-group form-group" style="display:none">
          <span class="input-group-addon">@Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
          <input id='changeEmail'  type="text" class="form-control" placeholder="Email">
        </div>

        <div id="in" class="input-group form-group" style="display:none">
          <span class="input-group-addon">@Favourite hero:</span>
          <input id='changeHero' type="text" class="form-control" placeholder="Favourite hero">
        </div>

        <div id="2" class="input-group form-group" style="display:none">
          <span class="input-group-addon">@Phone:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
          <input id='changePhone' type="text" class="form-control" pla  ceholder="Phone">
        </div>

        <div id="2" class="input-group form-group" style="display:none">
          <span class="input-group-addon">@Description:&nbsp&nbsp&nbsp&nbsp&nbsp</span>
          <textarea row="10" id='changeDescription' class="form-control" placeholder="Description"></textarea>
          
        </div>
        <div>
          <input class='btn btn-primary' type='submit' style='display:none' value='Save change' id='saveChange'/>
        </div>



      </form>
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

      <?php



$name = $_SESSION['user']; 
$query="SELECT * FROM user WHERE user_name ='$name'";
$result=$db->send_sql($query);
$row=mysql_fetch_array($result);

echo "<li id='test' class='ps '><div class='panel panel-default' ><div class='panel-heading'>Username:</div><div id='showName' class='panel-body'>".$row[1]."</div></div></li>";?>



<?php
echo "<li class='ps '><div class='panel panel-default' ><div class='panel-heading'>Email:</div><div class='panel-body' id='showEmail'>".$row[3]."</div></div></li>";?>



<?php
echo "<li class='ps '><div class='panel panel-default' ><div class='panel-heading'>Favourite hero:</div><div class='panel-body' id='showHero'>".$row[5]."</div></div></li>";?>



<?php
echo "<li class='ps '><div class='panel panel-default' ><div class='panel-heading'>Phone:</div><div class='panel-body' id='showPhone'>".$row[6]."</div></div></li>";?>



<?php
echo "<li class='ps' ><div class='panel panel-default' ><div class='panel-heading'>Self Description:</div><div class='panel-body'><div class='form-group'><textarea class='form-control' rows='6' id='showDescription'>".$row[7]."</textarea></div></div><button id='edt' class='btn btn-primary'>Edit profile</button></div></li>";



if(isset($_POST['upload'])) 
{
  $image_name = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_extn = strtolower(end(explode('.', $image_name)));
  $image_tmp_name = $_FILES['image']['tmp_name'];

  if(move_uploaded_file($image_tmp_name, "profilepho/$image_name"))
  {
    
    ?>

<script>

  $("#userPicture").attr("src","profilepho/<?php echo $image_name?>");

</script>
    <?php
    $pic = "profilepho/$image_name";


    $sqlk = "update user set prolink = '$pic' where user_name= '$name'";
    $sqlj = "commit;";
    $resy = $db->send_sql($sqlk);
    $resy = $db->send_sql($sqlj);

  }


}



?>



</ul>



</div>
<br><br><br><br><br><br><br><br><br>

<br>
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

</body>



</html>
