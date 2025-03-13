<?php
include("./Database.php");
$userid=$_POST['userid'];
$query="select user_id,uname from users where users.user_id not in (select following_table.user_id from following_table where following_table.following_id={$userid}) and users.user_id in (select follower_table.user_id from follower_table where follower_table.follower_id= {$userid}) and users.user_id != {$userid};";
$query1="select user_id,uname from users where users.user_id in (select following_table.user_id from following_table where following_table.following_id={$userid}) and users.user_id in (select follower_table.user_id from follower_table where follower_table.follower_id= {$userid}) and users.user_id != {$userid};";
$result=pg_query($connect,$query);
$result1=pg_query($connect,$query1);
$output="<label class='labelheader'>Follower</label><br><br>";
while($row=pg_fetch_row($result)){
    $output.="<div class='contener labelbody'>
                <label class='labelheader'>{$row[1]}</label><br>
                <input type='button' value='Unfollow' value1='{$row[0]}'>
            </div>";
}
while($row=pg_fetch_row($result1)){
    $output.="<div class='contener labelbody'>
                <label class='labelheader'>{$row[1]} <label style='font:100'>(Follow you)</label></label><br>
                <input type='button' value='Unfollow' value1='{$row[0]}'>
            </div>";
}
echo ($output);
?>