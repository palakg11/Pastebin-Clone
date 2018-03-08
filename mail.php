<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "pankajgoenka11@gmail.com";
$mail->Password = "";	
$mail->setFrom('pankajgoenka11@gmail.com', 'Sys_admin');
$mail->addAddress($_POST["gmail"]);
$mail->Subject = "EMAIL VERIFY";
$mail->isHTML(true);
$code=substr(md5(mt_rand()),0,15);
$_SESSION["code"] = $code;
$mail->Subject = 'Messege subject';
$mail->Body    = 'Your Security code is '.'<b>'.$code.'</b>'.'<br>'.'visit <a href="localhost/pastebin/auth.php>'.'Link'.'</a>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if($mail->send()){
	echo "<script>alert('Go to ur email addereess for varification');</script>";
}
else
	echo "<script>alert('An error occured while sending the mail');</script>";

