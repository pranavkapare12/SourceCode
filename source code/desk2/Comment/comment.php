<?php
session_start();
$snippet_id=$_POST['id'];
$user_id=$_SESSION['user_id'];
$connect=pg_connect("host=localhost user=postgres dbname=sourcecode password=Pranav@123") or die("Cannot connect");
$queryheader="select stitle from snippet where  snippet.sid={$snippet_id};";
$query="select users.uname,content,event_time from users,comment where users.user_id=comment.user_id and comment.sid={$snippet_id} order by event_time,ts ASC;";
$resultHeader=pg_query($connect,$queryheader);
$result=pg_query($connect,$query);
$output="";
$row=pg_fetch_row($resultHeader);
$header="<div class='header'><label>{$row[0]}</label></div></div>";
$output.=$header;
$content="";

while($row=pg_fetch_row($result)){
    $message="<div class='message'>
                    <label class='User'>{$row[0]}</label><br>
                    <label class='comment' style='font-size: smaller;'>{$row[1]}</label><br>
                    <label class='time' style='font-size: xx-small;'>{$row[2]}</label>
                </div>";
    $content.=$message;
}
$output.="<div class='content'>".$content."</div>";
$send="<div class='send'><input type='text' name='Message' placeholder='Comment..' id='Message'><button id='Send'><i class='bx bxs-send' ></i></button></div>";
$output.=$send;
echo $output;
?>