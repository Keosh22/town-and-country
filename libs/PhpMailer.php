<?php
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer 
{



// SEND EMAIL
  public function sendMail($email, $subject, $message)
{

  $MAILHOST = "smtp.gmail.com";
  $USERNAME = "buenavideskeosh@gmail.com";
  $PASSWORD = "xyfhwkhjldfhytyw";
  $SEND_FROM = "buenavideskeosh@gmail.com";
  $SEND_FROM_NAME = "TCH Homeowners Association";
  // $REPLY_TO = "buenavideskeosh@gmail.com";
  // $REPLY_TO_NAME = "boss-ken";

  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $MAILHOST;
  $mail->Username = $USERNAME;
  $mail->Password = $PASSWORD;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;
  $mail->setFrom($SEND_FROM, $SEND_FROM_NAME);
  $mail->addAddress($email);
  // $mail->addReplyTo($REPLY_TO,$REPLY_TO_NAME);
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $message;
  $mail->AltBody = $message;

  if (!$mail->send()) {
    return "Email not send";
  } else {
    return "Email Sent";
  }
}

}
?>