<?php
include('smtp/PHPMailerAutoload.php');

echo smtp_mailer('to_email','Subject','html');
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "sourcecode411028@gmail.com";
	$mail->Password = "-------------------";
	$mail->SetFrom("sourcecode411028@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}

function Send($number,$Sendotp){
    $connect=pg_connect("host=localhost user=postgres dbname=sourcecode password=Pranav@123")or die("Cannout opent the file");
    $query="select email from users where phoneno='{$number}'";
    $result=pg_query($connect,$query) or die("Can not Execute");
    $row=pg_fetch_row($result);
    $subject="Verification code";
    $otp=$Sendotp;
    $Content="<h3>Hello Respected User</h3>\n <br> <b>{$otp}</b> is Your one Time Password (OTP) <br> Please Do Not Share the OTP With Other <br>
    Regards,<br>
    Source Code Teams<br>
    <u>Have A Good Day</u>
    ";
    smtp_mailer($row[0],$subject,$Content);
	echo $otp;
};


if($_SERVER['REQUEST_METHOD']=='POST'){
    $number=$_POST['number'];
	$otp=$_POST['otp'];
    Send($number,$otp);
}

?>