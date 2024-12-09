<?php
include("./Database.php");
$user_id=$_POST['userid'];
$follow=$_POST['follower'];
$query="delete from follower_table where user_id={$follow} and follower_id={$user_id};";
$query1="delete from following_table where user_id={$user_id} and following_id={$follow};";
pg_query($connect,$query)or die("Cannot Delete the Data");
pg_query($connect,$query1)or die("Cannot Delete the Data");
?>