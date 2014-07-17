<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/8/13
 * Time: 2:00 AM
 */
 



if(isset($_POST["submit"])){

if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
    
    if(isset($_GET["noteid2"])){
        include("include.inc.php");
    $db = new database();
    $db->setup("root","admin","localhost","mydb");
    
    $query="SELECT note_id FROM likenum WHERE note_id = '$_GET[noteid2]'";
    $result=$db->send_sql($query);
    $row = mysql_fetch_array($result);
    if(empty($row[0])){
    $sqllike="INSERT INTO likenum  VALUES ('$_SESSION[user_id]', '$_GET[noteid2]',1)";
    $db->send_sql($sqllike);
    echo "<script>alert('Thank you for your support!!');location.href='readpage.php'</script>";    
    }
    else{
    $sqllike="UPDATE likenum set like_count=like_count+1 where note_id='$_GET[noteid2]'";
    $db->send_sql($sqllike);
    echo "<script>alert('Thank you for your support!!');location.href='readpage.php'</script>";
    }
}}
else {
    echo "<script>alert('please login first !!');location.href='readpage.php'</script>";
}
}

?>

<div class="col-lg-4">
    <form action="like.php?noteid2=<?php echo $_SESSION['note_id'];?>" method="post">
    <button class="btn btn-info btn-large " type="submit" value="like" name="submit">like<span class="badge pull-right" id="like_count">
            <?php
            
            $sql="select like_count from likenum where note_id='$_SESSION[note_id]'";
            $rec=$db->send_sql($sql);
            $row=mysql_fetch_row($rec);
            echo $row[0];
            ?>
        </span></button>
        </form>
</div>

