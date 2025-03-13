<?php
$password=$_POST['password_one'];
$number=$_POST['number'];
$connect=pg_connect("host=localhost user=postgres dbname=sourcecode password=Pranav@123")or die("Cannout opent the file");
$query="update users set password='{$password}' where phoneno='{$number}'";
$result=pg_query($connect,$query);
if($result)
 echo "Password Changed Successfully";
else
 echo "Failed to Change Password";
?>