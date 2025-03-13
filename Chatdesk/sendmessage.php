<?php
include("./Database.php");
$userid=$_POST['userid'];
$reciveid=$_POST['reciver_id'];
$message=$_POST['message'];
$query="insert into message (sender_id,reciver_id,content,ts,m_time) values ($userid,$reciveid,'$message',CURRENT_DATE,CURRENT_TIME);";
$result=pg_query($connect,$query);

?>