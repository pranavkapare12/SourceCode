<?php
include("./Database.php");
$userid=$_POST['userid'];
$reciveid=$_POST['reciver_id'];
$query1="select sender_id,reciver_id,content,m_time from message where (sender_id = $userid and reciver_id= $reciveid) or (sender_id=$reciveid and reciver_id= $userid) order by ts ASC, m_time ASC;";
$result1=pg_query($connect,$query1);
$output1="";
while($row=pg_fetch_row($result1)){
    if($row[0] == $userid){
        $output1.="<div class='conmessage'><label>$row[2]</label></div>";
    }else{
        $output1.="<div class='conmessageright'><label>$row[2]</label></div>";
    }   
}
echo ($output1);
?>