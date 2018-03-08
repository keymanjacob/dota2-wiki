<?php

session_start();

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

$name=$_SESSION['login_name'];

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <!-- TODO: create new framework for this project -->
    <meta charset = "utf-8"/>
    <title>Dota2 Wikipedia</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/Dota2_index.css" >
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <?php 
    $colours = array('CF1100','CF00BE','F00');
    $user_colour = array_rand($colours);
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">  
    $(document).ready(function(){
//create a new WebSocket object.
var wsUri = "ws://localhost:52123/server.php";  
websocket = new WebSocket(wsUri); 

websocket.onopen = function(ev) { // connection is open 
$('#message_box').append("<div class=\"system_msg\">Welcome to the chatting hall!</div>"); //notify user
$('#message_box').append("<div class=\"system_msg\">Start your discussion</div>");
}

$('#send-btn').click(function(){ //use clicks message send button

var mymessage = $('#message').val(); //get message text
mymessage = removeHTMLTags(mymessage);
var myname = '<?php echo $name;?>';

//alert('dsdsasa'); //get user name
myname = removeHTMLTags(myname);
if(myname == ""||myname==null){ //empty name?
    alert("Enter your Name please!");
    return;
}
if(mymessage == ""||mymessage==null){ //emtpy message?
    alert("Enter Some message Please!");
    return;
}

//prepare json data
var msg = {
    message: mymessage,
    name: myname,
    color : '<?php echo $colours[$user_colour]; ?>'
};
//convert and send data to server
websocket.send(JSON.stringify(msg));
});

//#### Message received from server?
websocket.onmessage = function(ev) {
var msg = JSON.parse(ev.data); //PHP sends Json data
var type = msg.type; //message type
var umsg = msg.message; //message text
var uname = msg.name; //user name
var ucolor = msg.color; //color

if(type == 'usermsg') 
{
    $('#message_box').append("<div><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
}
if(type == 'system')
{
//$('#message_box').append("<div class=\"system_msg\">Start your discussion</div>");
}

$('#message').val(' '); //reset text
};




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

websocket.onerror   = function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
websocket.onclose   = function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 
});
</script>
<style>
.bg{
    background-color: black;
}
.idk{
    margin-top:50px;
    width:100%;
    height:310px;
}
.chat_wrapper {
    margin-top: 50px;
    margin-right: auto;
    margin-left: auto;
    background: rgba(101, 80, 50, 0.96);
    border: 0px solid #897878;
    border-radius: 14px;
    padding: 10px;
    font: 12px 'lucida grande',tahoma,verdana,arial,sans-serif;
}
.chat_wrapper .message_box {
    background: #dbe3e6;
    height: 250px;
    overflow: auto;
    border-radius:5px;
    padding: 10px;
    border: 1px solid #999999;
}
.chat_wrapper .panel input{
    padding: 2px 2px 2px 5px;
}
.system_msg{color: #7e0b0b; font-size:1.2em;}
.user_name{font-weight:bold;}
.user_message{color: #88B6E0;}
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
        <div class="col-md-10 col-md-offset-1 row">
            <section class="col-md-12 bg row">
<div class="col-sm-7 col-md-7 hidden-sm hidden-xs"><br><br><br> <iframe class="idk"  class="  " src="//www.youtube.com/embed/b1IB3mkq_20" frameborder="0" allowfullscreen></iframe>  
</div>
<div class="col-sm-5 col-md-5 col-xs-12"><div class="chat_wrapper  ">
                            <div class="message_box" id="message_box"></div>
<div class="panel">
<p id ="name" style="width:100%"><?php echo $name;?><p>
<textarea name="message" id="message" placeholder="Message" maxlength="80" style="width:100%;height:100px;resize:none;"></textarea>
<button id="send-btn">Send</button>

</div>
</div>
</div>
            </section>
            




    </div>









<div class="row">
    <footer class="col-md-12 row">
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

</div>
    

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>