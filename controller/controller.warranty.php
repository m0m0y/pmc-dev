<?php
require "phpmail/Exception.php";
require "phpmail/PHPMailerAutoload.php";
require "phpmail/SMTP.php";
require "phpmail/PHPMailer.php";
// require "../assets/mail/email_content.php";

$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$address = $_POST["address"];
$product_item = $_POST["product_item"];
$user_age = $_POST["user_age"];
$purchase_from = $_POST["purchase_from"];
$item_price = $_POST["item_price"];
$purchase_date = $_POST["purchase_date"];
$serial = $_POST["serial"];
$aware_in = $_POST["aware_in"];
$influence_by = $_POST["influence_by"];
$rate = $_POST["rate"];
$satisfaction = $_POST["satisfaction"];
$captcha = $_POST["captcha"];

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

if($name == "" || $contact == "" || $email == "" || $address == "" || $product_item == "" || $purchase_from == "" || $item_price == "" || $purchase_date == "" || $serial == "" || $captcha == "" || !$mail->send()) {
    echo "Failed to sent";
} else {
    echo "Successfully sent!";
}