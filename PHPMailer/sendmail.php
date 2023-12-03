<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$body = file_get_contents('../PHPMailer/src/contents.html');
$mail->isSMTP();
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = ''; //past the first part of what you copied from Mailtrap
$mail->Password = ''; //past the second part of what you copied from Mailtrap
$mail->SMTPSecure = false; 
$mail->Port = 25;
$mail->SMTPAutoTLS = false;
$mail->SMTPKeepAlive = true; // add it to keep SMTP connection open after each email sent

$mail->setFrom('list@example.com', 'List manager');
$mail->Subject = "Email verification";

$users = [
  ['email' => $_POST['email'], 'name' => '']
];

foreach ($users as $user) {
  $mail->addAddress($user['email'], $username);

  $mail->Body = "<h2>Greetings, {$first_name} {$last_name}!<br>";
  $mail->Body .= "<h3>The {$faction} welcomes you</h3><br>";
  $mail->Body .= "In order to validate your registration click the link below<br>";
  $mail->Body .= "<a href='http://127.0.0.1/WebApp_WBD5204_Yassine_Ben_Mustapha/class/FormClass.php?validation=do&m=".$email."&h=".$email_hash."'>";
  $mail->Body .= "http://127.0.0.1/WebApp_WBD5204_Yassine_Ben_Mustapha/class/FormClass.php?validation=do&m=".$email."&h=".$email_hash;
  $mail->Body .= "</a>";
  $mail->Body .= "<br>If you are unable to click on that link just copy/paste it in your web browser<br>";
  $mail->Body .= "Thank you !<br>See you soon";


  $mail->AltBody = "<h2>Greetings, {$first_name} {$last_name}!\n";
  $mail->AltBody .= "<h3>The {$faction} welcomes you</h3>\n";
  $mail->AltBody .= "In order to validate your registration click the link below\n";
  $mail->AltBody .= "<a href='http://127.0.0.1/WebApp_WBD5204_Yassine_Ben_Mustapha/class/FormClass.php?validation=do&m=".$email."&h=".$email_hash."'>";
  $mail->AltBody .= "http://127.0.0.1/WebApp_WBD5204_Yassine_Ben_Mustapha/class/FormClass.php?validation=do&m=".$email."&h=".$email_hash;
  $mail->AltBody .= "</a>";
  $mail->AltBody .= "\nIf you are unable to click on that link just copy/paste it in your web browser\n";
  $mail->AltBody .= "Thank you !\nSee you soon";

  //$mail->send();
  try {
    $mail->send();
      //echo "Message sent to: ({$user['email']}) {$mail->ErrorInfo}\n";
  } catch (Exception $e) {
      //echo "Mailer Error ({$user['email']}) {$mail->ErrorInfo}\n";
  }
  $mail->clearAddresses();
}
$mail->smtpClose(); 
?>