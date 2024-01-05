<?php
require "phpmail/Exception.php";
require "phpmail/PHPMailerAutoload.php";
require "phpmail/SMTP.php";
require "phpmail/PHPMailer.php";
require "../assets/mail/email_content.php";

$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$confirm_email = $_POST['confirm_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$captcha = $_POST['captcha'];

$emailTemplate = new mailTemplate();
$mail_content = $emailTemplate->emailContent($name, $contact, $email, $message);

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "cpascual107@gmail.com";
$mail->Password = "bblhchycyknrypzs";
$mail->setFrom('cpascual107@gmail.com', 'no-reply');
// $mail->addAddress('rivera.jerome.dc.1525@gmail.com', 'PMC');
$mail->addAddress('itchaaanp@gmail.com', 'PMC');
$mail->Subject = $subject;
$mail->Body = $mail_content;
$mail->isHTML(true);

if(empty($name) || empty($contact) || empty($email) || empty($subject) || empty($message) || empty($captcha) || !$mail->send()) {
    echo "Failed to sent";
} else {
    echo "Successfully sent!";
}
