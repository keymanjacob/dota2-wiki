<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/9/13
 * Time: 12:14 AM
 */
 session_start();

if(!isset($_SESSION['valid_user'])||empty($_SESSION['valid_user'])||!isset($_SESSION['new_note_id'])||empty($_SESSION['new_note_id'])){
     echo  "<div class='alert alert-info'>$_SESSION[valid_user],$_SESSION[new_note_id]Please login in! <a href='../mainpage.htm' class='alert-link'>GO back to main page</a></div>";
}
else{
ini_set('display_errors',1);
error_reporting(E_ALL);
include("include.inc.php");
$dbhost = "localhost";
$dbuser = "guangji";
$dbpass = "1990";
$dbname="mydb";

$db=new database();
$db->setup($dbuser,$dbpass,$dbhost,$dbname);

 if($_POST['submit']){
    if($_FILES["log_picture"]["error"]>0){
        echo "<script>alert('added!!');location.href='writepage.php'</script>";
    }
    $uploaddir="../img/";
    $type=array("jpg","gif","png","jpeg");
    $a=strtolower(substr(strrchr($_FILES['log_picture']['name'],"."),1));
    if(!in_array($a,$type)){
        echo "jpg/gif/png/jpeg only!";
    }
    if(!isset($_POST['log_title'])||empty($_POST['log_title']) || !isset($_POST['log_description'])||empty($_POST['log_description'])|| !isset($_POST['log_day'])||empty($_POST['log_day'])|| !isset($_POST['log_place'])||empty($_POST['log_place'])|| !isset($_POST['log_state'])||empty($_POST['log_state'])|| !isset($_POST['log_country'])||empty($_POST['log_country'])){
        echo "<script>alert('please fill those areas!!');location.href='writepage.php'</script>";
    }

    else{
        $filename=explode(".",$_FILES['log_picture']['name']);
        @$time=date("m-d-H-i-s");
        $filename[0]=$time;
        $name=implode(".",$filename);
        $uploadfile=$uploaddir.$name;
        if(move_uploaded_file($_FILES['log_picture']['tmp_name'],$uploadfile)){
            $title=strip_tags($_POST['log_title']);
            $title=addslashes($title);
            $descript=strip_tags($_POST['log_description']);
            $descript=addslashes($descript);
            $day=strip_tags($_POST['log_day']);
            $day=addslashes($day);
            $place=strip_tags($_POST['log_place']);
            $place=addslashes($place);
            $state=strip_tags($_POST['log_state']);
            $state=addslashes($state);
            $country=strip_tags($_POST['log_country']);
            $country=addslashes($country);
            @$times=date('Y-m-d');
            $sqlfile="insert into log (user_id,note_id,log_title,log_description,log_path,log_time,log_day,log_place,log_state,log_country) values ('$_SESSION[user_id]','$_SESSION[new_note_id]','$title','$descript','$uploadfile','$times','$day','$place','$state','$country')";
            $db->send_sql($sqlfile);
            echo "<script>alert('added!!');location.href='writepage.php'</script>";
        }


    }

}


}
?>



