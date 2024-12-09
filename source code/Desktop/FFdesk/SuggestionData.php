<?php
include("./Database.php");
$user_id=$_POST['userid'];
$follow=$_POST['follower'];
$query="insert into follower_table (user_id,follower_id) values($follow,$user_id);";
$query1="insert into following_table (user_id,following_id) values($user_id,$follow)";
pg_query($connect,$query)or die("Cannot Delete the Data");
pg_query($connect,$query1)or die("Cannot Delete the Data");
?>