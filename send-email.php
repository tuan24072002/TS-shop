<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer-master/src/Exception.php';
require 'vendor/PHPMailer-master/src/PHPMailer.php';
require 'vendor/PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = SMTP_SECURE;
$mail->Port       = SMTP_PORT;
$mail->Host       = SMTP_HOST;
$mail->Username   = SMTP_USER;
$mail->Password   = SMTP_PASS;
$mail->IsHTML(true);


// $mail->AddAddress("0995086534ts@gmail.com", "Tuấn");
// $mail->SetFrom("24072002ts@gmail.com", "Tran Le Anh Tuan");
// $mail->AddReplyTo("24072002ts@gmail.com", "Tran Le Anh Tuan");
// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
// $mail->Subject = "Đây là contact của khách hàng";
// $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
// $mail->MsgHTML($content); 
// if(!$mail->Send()) {
//   echo "Error while sending Email.";
//   var_dump($mail);
// } else {
//   echo "Email sent successfully";
// }