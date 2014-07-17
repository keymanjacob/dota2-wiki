<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/11/13
 * Time: 5:48 AM
 */
session_start();
if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
    $uid=$_SESSION["user_id"];
    include("includes/include.inc.php");
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "7688326826";
    $dbname="mytravel";
    $id=array();
    $u=0;
    $db=new database();
    $db->setup($dbuser,$dbpass,$dbhost,$dbname);
    $sql="select user_name from useru where user_id='$uid'";
    $rec=$db->send_sql($sql);
    $row=mysql_fetch_row($rec);
    $uname=$row[0];
    if($uname="wang"){
        $sql="select user_name, user_id from user order by ASC";
        $rec=$db->send_sql($sql);
        while($row=mysql_fetch_array($rec)){
            global $id;
            global $u;
            $id[$u]=$row[0];
            ?>
        <a href="admin.php?uid=<?php echo $id[$u]?>">$row[1]</a><hr/>
        <?php
       $u++; }
    }
    else    {
        echo "<script>alert('you are not admin!!go away!!');location.href='mainpage.html'</script>";
    }


}
if(isset($_GET["uid"])&&!empty($_GET["uid"])){
    $delid=$_GET["uid"];
    $sql="delete from user where user_id='$delid'";
    $rec=$db->send_sql($sql);
    echo "<script>alert('deleted!!');location.href='admin.php'</script>";
}
else
?>