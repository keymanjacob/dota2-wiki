<?php
/**
 * Created by PhpStorm.
 * User: franklin
 * Date: 12/6/13
 * Time: 12:21 AM
 */

if(isset($_POST['submit'])){
    if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
    if(empty($_POST['comment'])){
        echo "<script>alert('do not submit with nothing!!!');location.href='readpage.php'</script>";
    }
    else if($_POST['comment']){
    $content=strip_tags($_POST['comment']);
    $content=addslashes($content);
    @$times=date('Y-m-d');
    $sqladd="insert into comment (content,comm_time) values('$content','$times')";
    $db->send_sql($sqladd);
    }
    }
    else {
        echo "<script>alert('please login first !!');location.href='readpage.php'</script>";
    }
}

function showComment($db){
    $sqlshow="SELECT comm_id,content,comm_time from comment ";
    $comments=$db->send_sql($sqlshow);
    while($row= mysql_fetch_array($comments)){
        $com_id=$row[0];
        $content=$row[1];
        $content=stripcslashes($content);
        $lastdate=$row[2];
        echo "<p>
                   <dl>
                          <dt>$com_id</dt>
                          <dt>$lastdate</dt>
                          <dd>$content</dd>
                          </dl>
              </p>";

    }
}
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title" id="comment">Comment</h3>
    </div>
    <div class="panel-body">
        <p>
        <div class="input-group">
            <span class="input-group-addon">comment</span>
            <form action="readpage.php" method="post">
            <input type="text" name="comment" class="form-control" placeholder="input your comment here">
                        <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" value="Sumbit" name="submit">
                        </span>
            </form>
        </div>
        </p>
        <p>
    </div>
    <?php showComment($db)?>
</div>