<?php
include("./Database.php");
$userid=$_POST['userid']; 
$query="select user_id,uname from users where users.user_id not in (select following_table.user_id from following_table where following_table.following_id=$userid) and users.user_id not in (select follower_table.user_id from follower_table where follower_table.follower_id=$userid) and users.user_id != $userid;";
$result=pg_query($connect,$query);
$output="<label class='labelheader'>suggestion</label><br><br>";

    while(($row = pg_fetch_array($result))!=NULL){
        $output.="<div class='contener labelbody'>
            <label class='labelheader'>{$row[1]}</label><br>
            <input type='button' value='Follow' value1='{$row[0]}'>
            </div>";
    }
    echo($output);
?>