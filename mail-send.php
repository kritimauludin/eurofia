<?php
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
//SMTP Settings
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = 'webtest2211@gmail.com';
$mail->Password = '#Webtest2211#';
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->Mailer   = "smtp";
$mail->SetFrom($_POST["userEmail"], $_POST["userName"]);
$mail->AddReplyTo($_POST["userEmail"], $_POST["userName"]);

//default email adderrs
$mail->AddAddress("kritimauludin24@gmail.com");
$mail->Subject = $_POST["subject"];
$mail->WordWrap   = 80;
$mail->MsgHTML($_POST["content"]);

// foreach ($_FILES["attachment"]["name"] as $k => $v) {
// 	$mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
// }

$mail->IsHTML(true);

if (!$mail->Send()) {
  echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
  echo "<p class='success'>Mail Sent Successfully.</p>";
}
