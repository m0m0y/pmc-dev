<?php
require "phpmail/Exception.php";
require "phpmail/PHPMailerAutoload.php";
require "phpmail/SMTP.php";
require "phpmail/PHPMailer.php";

// mail model content
require "../assets/mail/email_content.php";
require "../assets/mail/warranty_content.php";

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "contact";

        $name = $_POST["name"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $confirm_email = $_POST["confirm_email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $captcha = $_POST["captcha"];

        if(empty($name) || empty($contact) || empty($email) || empty($confirm_email) || empty($subject) || empty($message) || empty($captcha)) {

            $response = array("status" => "0");

        } else {

            $emailTemplate = new mailTemplate();
            $mail_content = $emailTemplate->emailContent($name, $contact, $email, $message);

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = "html";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "cpascual107@gmail.com";
            $mail->Password = "bblhchycyknrypzs";
            $mail->setFrom("cpascual107@gmail.com", "no-reply");
            // $mail->addAddress("rivera.jerome.dc.1525@gmail.com", "PMC");
            $mail->addAddress("itchaaanp@gmail.com", "PMC");
            $mail->Subject = $subject;
            $mail->Body = $mail_content;
            $mail->isHTML(true);

            if(!$mail->send()) {
                $response = array("status" => "0");
            } else {
                $response = array("status" => "1");
            }

        }

        break;

    case "warranty";

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


        if(empty($name) || empty($contact) || empty($email) || empty($address) || empty($product_item) || empty($purchase_from) || empty($item_price) || empty($purchase_date) || empty($serial)) {

            $response = array("status" => "0");

        } 
        else {

            $warrantyTemplate = new WarrantyTemplate();
            $warranty_content = $warrantyTemplate->warrantyContent($name, $contact, $email, $address, $product_item, $user_age, $purchase_from, $item_price, $purchase_date, $serial, $aware_in, $influence_by, $rate, $satisfaction);

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = "html";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "cpascual107@gmail.com";
            $mail->Password = "bblhchycyknrypzs";
            $mail->setFrom("cpascual107@gmail.com", "no-reply");
            // $mail->addAddress("rivera.jerome.dc.1525@gmail.com", "PMC");
            $mail->addAddress("itchaaanp@gmail.com", "PMC");
            $mail->Subject = "Warranty Registration";
            $mail->Body = $warranty_content;
            $mail->isHTML(true);

            if(!$mail->send()) {
                $response = array("status" => "0");
            } else {
                $response = array("status" => "1");
            }
        }
        
        break;

    default:
        echo "404 not found";
        exit;
}

echo json_encode($response);