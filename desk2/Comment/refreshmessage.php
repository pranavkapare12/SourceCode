<?php
session_start();
$user_id=$_SESSION['user_id'];
$snippet_id=$_POST['id'];
$message=$_POST['message'];
$currentDate=date('Y-m-d');
$currentTime=date('H:i:s');
$connect=pg_connect("host=localhost user=postgres dbname=sourcecode password=Pranav@123") or die("Cannot connect");
$query="select users.uname,content,event_time from users,comment where users.user_id=comment.user_id and comment.sid={$snippet_id} order by event_time,ts ASC;";
$querySend="insert into comment (sid,user_id,content,ts,event_time) values({$snippet_id},{$user_id},'{$message}','{$currentDate}','{$currentTime}');";
$resulttwo=pg_query($connect,$querySend)or dir("Cannot insert");
$result=pg_query($connect,$query);
$output="";
$content="";

while($row=pg_fetch_row($result)){
    $message="<div class='message'>
                    <label class='User'>{$row[0]}</label><br>
                    <label class='comment' style='font-size: smaller;'>{$row[1]}</label><br>
                    <label class='time' style='font-size: xx-small;'>{$row[2]}</label>
                </div>";
    $content.=$message;
}
$output.=$content;
echo $output;
?>