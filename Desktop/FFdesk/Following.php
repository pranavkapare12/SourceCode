<?php
$userid=$_POST['userid']; 
include("./Database.php");
$query1="select user_id,uname from users where users.user_id in (select following_table.user_id from following_table where following_table.following_id= {$userid}) and users.user_id not in (select follower_table.user_id from follower_table where follower_table.follower_id={$userid}) and users.user_id != {$userid};";
$query="select user_id,uname from users where users.user_id in (select following_table.user_id from following_table where following_table.following_id= {$userid}) and users.user_id in (select follower_table.user_id from follower_table where follower_table.follower_id={$userid}) and users.user_id != {$userid};";
$result1=pg_query($connect,$query);
$result=pg_query($connect,$query1);
$output="<label class='labelheader'>Following</label><br><br>";
while($row=pg_fetch_row($result)){
    $output.="<div class='contener labelbody'>
                <label class='labelheader'>{$row[1]}</label><br>
                <input type='button' value='Follow back' value1='{$row[0]}'>
            </div>";
}
while($row=pg_fetch_row($result1)){
    $output.="<div class='contener labelbody'>
                <label class='labelheader'>{$row[1]}</label><br>
            </div>";
}
echo($output);
?>