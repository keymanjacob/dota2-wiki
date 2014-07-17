<?php ob_start();?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset = "utf-8"/>
    <title>Dota2 Wikipedia</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/Dota2_index.css" >
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <style>

    </style>
</head>
<body class="container">

    <div id="nav111" class = "row">

        <nav class="navbar navbar-inverse navbar-fixed-top col-md-12 row " role="navigation">


            <div class="navbar-header col-md-3">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand " href="Dota2_index.html"><img id="br" src="./icon/1.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" >
                <ul class="nav navbar-nav">

                    <li class=""><a href="#">GAMEPLAYS</a></li>
                    <li class=""><a href="#">ITEMS</a></li>
                    <li class=""><a href="heros.php">HEROPEDIA</a></li>

                    <li class=""><a href="#info" data-toggle="modal">FORUM</a></li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">DOWNLOADS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">The Game</a></li>
                            <li><a href="#">Patches</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>


            </div><!-- /.navbar-collapse -->

        </nav>
        <!--  end of nav bar -->
        <div id="form_head" class="col-md-10 col-md-offset-1 row">
            <p class="form_text col-md-8 row">
                <label class="col-md-4" for="name">Your Name &nbsp;</label><input class="col-md-6" id="name" type="text"><br><br>
                <label class="col-md-4" for="email">Email Address &nbsp;</label><input class="col-md-6" id="email" type="text"><br><br>
                <label class="col-md-4" for="passwd">Password &nbsp;</label><input class="col-md-6" id="passwd" type="text"><br><br>
                <label class="col-md-4" for="qr">QR Code &nbsp;</label><input class="col-md-6" id="qr" type="text"><br><br>
                
                
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


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>