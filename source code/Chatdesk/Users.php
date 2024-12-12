<?php
include("./Database.php");
$userid=$_POST['userid'];
$query1="select user_id,uname from users where users.user_id in (select following_table.user_id from following_table where following_table.following_id={$userid}) and users.user_id in (select follower_table.user_id from follower_table where follower_table.follower_id= {$userid}) and users.user_id != {$userid};";
$result1=pg_query($connect,$query1);
$a=1;  
$output="<div class='header'>
                <label>Users</label><br>
                <input type='search' placeholder='Search'>
            </div><hr>";
while($row=pg_fetch_row($result1)){
    $output.=" <div class='contener' uid={$row[0]}>
            <label> {$row[1]} </label>
            </div>";
}
echo ($output);
?>