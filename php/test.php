<html>
<body>
<?php
 
$user_id=$_SESSION['user_id'];
Personal_Profile ( $user_id );

	


function Personal_Profile($user_id) {
    include("include.inc.php");
    $db = new database();
    $db->setup("guangji","1990","localhost","mydb");

	global $user_name, $user_note_num, $user_note_result,  $user_favor_num, $user_favor_result, $user_reputation, $user_log_comms_result, $user_log_comms_num,
	       $user_messages_result, $user_messages_num;
	
	
	$user_name_result = $db->send_sql ( "SELECT user_name as name, user.user_id AS id FROM user
	                                 WHERE user_id ='$user_id'" );
	$user_name = mysql_fetch_array ( $user_name_result );
	
	$user_note_num_result = $db->send_sql ( "SELECT count(note.note_id) as count FROM note
			                           WHERE user_id = '$user_id'" );
	$user_note_num = mysql_fetch_array ( $user_note_num_result );
	


	

	
	$user_note_result = $db->send_sql ("SELECT note_title, note_description, note_date, log_path FROM note, log
			                            where log_day = 1 and note.note_id = log.note_id and note.note_id in(
			                             SELECT note_id from note
			                             WHERE user_id ='$user_id' 
			                            ORDER BY note_date DESC)");
    
   
	
	$user_favor_result = $db->send_sql ("SELECT note_title, log_day, log_description, log_time FROM note, log
			                             WHERE note.note_id = log.note_id and log.log_id in (SELECT log_id FROM favorite
			                                                   WHERE user_id = '$user_id')"); 
	$user_favor_icon_result =$db->send_sql("SELECT log_path FROM log 
			                                WHERE log.note_id in (select log_id from favorite
                                                                  where user_id ='$user_id')");
	
	$user_favor_num_result = $db->send_sql ( "SELECT count(favorite.log_id) as count FROM favorite
			                           WHERE user_id = '$user_id'" );
	$user_favor_num = mysql_fetch_array ( $user_favor_num_result );
	
	
	
	$user_repu_result = $db->send_sql ( "SELECT count(*) as count FROM favorite
	                                   WHERE favorite.log_id in (SELECT DISTINCT log.log_id from log, note
                                                                WHERE log.note_id in (SELECT note.note_id FROM note
                                                                                     WHERE note.user_id ='$user_id') )" );
	$user_reputation = mysql_fetch_array ( $user_repu_result );
	
	$user_log_comms_result = $db->send_sql ( "SELECT user.user_name as name, content, comm_read, comm_time 
    		                                FROM comment 
    		                                INNER JOIN user
    		                                ON comment.user_id = user.user_id and comment.log_id IN (SELECT log.log_id FROM log
    		                                                         INNER JOIN note
                                                                     ON log.note_id = note.note_id and note.user_id = '$user_id' )
                                            ORDER BY comm_time DESC" );
	$user_log_comms_num_r = $db->send_sql ( "SELECT count(*)as count
    		                                FROM comment 
    		                                INNER JOIN user
    		                                ON comment.user_id = user.user_id and comment.log_id IN (SELECT log.log_id FROM log
    		                                                         INNER JOIN note
                                                                     ON log.note_id = note.note_id and note.user_id = '$user_id' )" );
	
	$user_log_comms_num = mysql_fetch_array ( $user_log_comms_num_r );
	
	$user_messages_result = $db->send_sql ( "SELECT user.user_name as name, content, comm_read, comm_time
			                                 FROM COMMENT AS a
                                             INNER JOIN user ON a.user_id = user.user_id
                                             and a.parent_id in ( select b.comm_id from comment as b where 
                                             b.user_id = '$user_id')
                                             AND a.log_id NOT IN (SELECT log.log_id
                                                                  FROM log
                                                                  INNER JOIN note ON log.note_id = note.note_id
                                                                  AND note.user_id ='$user_id')
			                                 ORDER BY comm_time DESC" );
	
	
	$user_messages_num_r = $db->send_sql ( "SELECT count(*)as count
			FROM COMMENT AS a
			INNER JOIN user ON a.user_id = user.user_id
			and a.parent_id in ( select b.comm_id from comment as b where
			b.user_id = '$user_id')
			AND a.log_id NOT IN (SELECT log.log_id
			FROM log
			INNER JOIN note ON log.note_id = note.note_id
			AND note.user_id ='$user_id')
			ORDER BY comm_time DESC" );
	$user_messages_num = mysql_fetch_array($user_messages_num_r);
	
}



?> 
</body>
</html>