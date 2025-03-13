<?php
$key =$_POST['Key'];
$connect=pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
$query="select uname,content,event_time from users,comment where users.user_id = comment.user_id and comment.sid={$key} order by event_time,ts ASC;";
$result=pg_query($connect,$query);
$header="<div class='header comm-design'><div class='cm'>Comment</div></div>";
$comment="";
$content="";
$content.="<div class='content contentmt comm-design'>";
while($row=pg_fetch_row($result)){
    $comment="<div class='commrecive'>
                    <div class='commcon'>
                        <label class='user'>{$row[0]}</label>  
                            <div class='cont'>{$row[1]}</div>
                                <div class='time'>{$row[2]}</div>
                            </div>
                        </div>";
    $content.= $comment;
}
$content.="</div>";

$send="<div class='send comm-design'>
    <input type='text' name='Comment' placeholder='Comment...' id='Message_send'>
    <button id='send'><i class='bx bxs-send'></i></button>
</div>";

$combine="$header $content $send";
echo $combine;
?>