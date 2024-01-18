<?php
require "phpmail/Exception.php";
require "phpmail/PHPMailerAutoload.php";
require "phpmail/SMTP.php";
require "phpmail/PHPMailer.php";
require "../model/model.resetpass.php";

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "forgotPassword";
        $username = $_POST["username"];
        $email = $_POST["email"];

        $mailBody = new ModelResetPassword();
        $mailBodyTemplate = $mailBody->resetPasswordEmail($username, $email);

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
        $mail->addAddress($email);
        $mail->Subject = "Reset Password";
        $mail->Body = $mailBodyTemplate;
        $mail->isHTML(true);

        if(empty($username) || empty($email) || !$mail->send()) {
            $response = array("message" => "Failed to sent!");
        } else {
            $response = array("message" => "Success!");
        }
        break;
    default:
        echo "404 not found";
        exit;
}

echo json_encode($response);