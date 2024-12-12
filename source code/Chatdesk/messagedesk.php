<?php
include("./Database.php");
$userid=$_POST['userid'];
$reciveid=$_POST['reciver_id'];
$query="select uname from users where users.user_id=$reciveid;";
$query1="select sender_id,reciver_id,content,m_time from message where (sender_id = $userid and reciver_id= $reciveid) or (sender_id=$reciveid and reciver_id= $userid) order by ts ASC, m_time ASC;";
$result=pg_query($connect,$query);
$result1=pg_query($connect,$query1);
$row=pg_fetch_row($result);
$output="<div class='contenertop' uid=$userid rid=$reciveid>
                $row[0]
            </div>";

$output1="<div class='contenercenter'>";
while($row=pg_fetch_row($result1)){
    if($row[0] == $userid){
        $output1.="<div class='conmessage'><label>$row[2]</label></div>";
    }else{
        $output1.="<div class='conmessageright'><label>$row[2]</label></div>";
    }   
}
$output1.="</div>";
            

$output2="<div class='contenerbottom'>
                <input type='text' placeholder='Message' id='input'><button style='min-width: 3rem; border-radius:2rem;'><i
                        class='bx bx-send' style='font-size: 1.5rem;'></i></button>
            </div>";

$output3="$output $output1 $output2";
echo ($output3);
?>