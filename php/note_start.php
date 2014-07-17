<?php
session_start ();
// store session data

?>
<html>
<body>


<?php
include("include.inc.php");
$db = new database();
$db->setup("guangji","1990","localhost","mydb");
echo $note_name = $_POST['note'];
echo $note_days = $_POST['days'];
echo $note_description = $_POST['description'];
echo @$note_time = date("Y-m-d");

$user_id =strip_tags($_SESSION ['user_id']);
$user_id=addslashes($user_id);
$note_name=strip_tags($note_name);
$note_name=addslashes($note_name);
$note_time=strip_tags($note_time);
$note_time=addslashes($note_time);
$note_description=strip_tags($note_description);
$note_description=addslashes($note_description);
$note_days=strip_tags($note_days);
$note_days=addslashes($note_days);
$db-> send_sql("INSERT INTO note (user_id, note_title, note_date, note_description,day_spend) VALUE ('$user_id','$note_name','$note_time', '$note_description','$note_days')");


			
echo $note_id= $db->insert_id();;

// store session data
$_SESSION ['new_note_id'] = $note_id;

?>
<a href="writepage.php">main page</a>
<?php

?>


</body>
</html>