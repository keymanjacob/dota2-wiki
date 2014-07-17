<?php echo '<div class="col-xs-2 "><form action="each_post.php?pid='.$_GET['pid'].'&on='.$_GET['on'].'&oid='.$_GET['oid'].' method="POST">';?>

<?php if($friend==0)
{
	echo '<input id="ad" class="btn btn-primary" type="submit" name="addfriend" value="follow" /></form></div>';
	if("follow"==$_POST['addfriend'])
	{
		$sql66 = "insert into relationship (follower, followee) values('$user_id','$owner_id');";
		$sql77 = "commit;";
		$res99 = $db->send_sql($sql66);
		$res88 = $db->send_sql($sql77);
//$res = $db->send_sql($sql7);
		$red2 = "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid'];
		header('Location: '.$red2);
	}
}else if($friend==1)
{
	echo '<input id="ad" class="btn btn-primary" type="submit" name="addfriend" value="stop following" /></form></div>';
	
	if("stop following"==$_POST['addfriend'])
	{
		$sql6 = "delete from relationship where follower = '$user_id' and followee = '$owner_id';";
		$sql7 = "commit;";
		$res9 = $db->send_sql($sql6);
		$res = $db->send_sql($sql7);
		$red2 = "each_post.php?pid=".$_GET['pid']."&on=".$_GET['on']."&oid=".$_GET['oid'];
		header('Location: '.$red2);
	}
}

?>