
<?php
session_start ();

?>
<html>
<body>
<?php


$user_id =$_SESSION['user_id'];

Personal_Profile_Edit($user_id);





?>
<a href="test-plans.php">back to personal page</a>
<?php



function extendname($filename){
	return substr(strrchr($filename,"."),1);
}

function Personal_Profile_Edit($user_id)
{
    include("include.inc.php");
    $db = new database();
    $db->setup("guangji","1990","localhost","mydb");

	$op_result = $db-> send_sql("SELECT user_password FROM user
			WHERE user_id = '$user_id'");
	$OldPassword_result= mysql_fetch_array ( $op_result );
	$OldPassword = $OldPassword_result['user_password'];
	
	$OP = strip_tags($_POST['OldPassword']);
	$criteria= 0;
        if (!fill_out($_POST))
        {
        	echo ("no input please try again");
        	$criteria=0;
        }
        else $criteria ++;
        
		if(sha1($_POST['OldPassword']) !== $OldPassword)
		{	echo  ("Wrong password");
		    $criteria= 0;
		}
		else $criteria++;
		
		if(isset($_POST['NewEmail']))
		{	
	
			$criteria++;
			$newemail =$_POST['NewEmail'];
		}
		  
		
		if ($_POST['NewPassword1'] !== $_POST['NewPassword2'])
		{
			echo ("two passwords are not same please try again");
			$criteria = 0;
		}
		else {
			$NewPassword = $_POST['NewPassword1'];
			$criteria++;
		}
		
		if(strlen($NewPassword)<6 ||strlen($NewPassword)>16)
		{
			echo ("invalid password length");
			$criteria = 0;
		}
        else{
        	$NewPassword = addslashes(strip_tags($_POST['NewPassword1']));
        	$criteria++;
        }
		
		if ($criteria == 5 )
		{
			$db-> send_sql("UPDATE user SET user_email = '$newemail',user_password ='$NewPassword'
				         WHERE user_id ='$user_id' ");
			echo ("success");
			
		}
		

}

function fill_out ($var)
{
	foreach ($var as $key => $value)
	{
		if (!isset($key)||($value ==''))

			return false;

	}
	return true;
}


?>
</body>
</html>