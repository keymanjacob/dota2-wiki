<?php   
  define('HOST',"localhost");   
  define('USER',"root");   
  define('PWD',"90fgh314");   
  define('DB','mydb');   
 
  $connect = mysql_connect(HOST,USER,PWD) or die("数据库连接失败！");   
  mysql_select_db(DB) or die("选择数据库失败");  



  $term=strip_tags($_POST['u']);
  $term =addslashes($term);

  $phone = strip_tags($_POST['p']);
  $phone = addslashes($phone);
  $email = strip_tags($_POST['e']);
  $email = addslashes($email);
  $fHero = strip_tags($_POST['f']);
  $fHero = addslashes($fHero);
  $desc  = strip_tags($_POST['d']);
  $desc  = addslashes($desc); 
 

  //$term="Bill";   
 
  //$sql = "select user_name from user where user_name like '%".$term."%'";   
 $sql = "update user set phone ='$phone', user_email='$email', Favourite = '$fHero', selfDec='$desc' where user_name ='$term'";
  //echo $sql;   
 
  mysql_query($sql); 

  $sqll = "commit;";
  mysql_query($sqll); 


 
  $string = "";   
 /*
  if(mysql_num_rows($result)>0){   
    while ($row = mysql_fetch_array($result)){   
      $string .="<b>".$row['user_name']."</b>-";      
      $string .="<br/>\n";   
    }   
  }else{   
    $string = "No matches";   
  }   
 */
  echo  $phone;
  echo  $term;
  echo  $email;   