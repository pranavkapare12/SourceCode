<?php
session_start();
$user_id=$_SESSION['user_id'];
$key = $_POST['key'];
$message = $_POST['comment'];

$currentDate=date('Y-m-d');
$currentTime=date('H:i:s');

$connect=pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
$query="select uname,content,event_time from users,comment where users.user_id = comment.user_id and comment.sid={$key} order by event_time,ts ASC;";

$querySend="insert into comment (sid,user_id,content,ts,event_time) values({$key},{$user_id},'{$message}','{$currentDate}','{$currentTime}');";

pg_query($connect,$querySend);

$result=pg_query($connect,$query);
$comment="";
$content="";
$content.="";
while($row=pg_fetch_row($result)){
    $comment="<div class='commrecive'><div class='commcon'><label class='user'>{$row[0]}</label><div class='cont'>{$row[1]}</div><div class='time'>{$row[2]}</div></div></div>";
    $content.= $comment;
}
$content.="";
echo $content;
?>