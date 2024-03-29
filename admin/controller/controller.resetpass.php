<?php
require "phpmail/Exception.php";
require "phpmail/PHPMailerAutoload.php";
require "phpmail/SMTP.php";
require "phpmail/PHPMailer.php";
include "controller.db.php";
require "../model/model.resetpass.php";

$modelResetPass = new ModelResetPassword();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "forgotPassword":
        $username = $_POST["f_username"];
        $email = $_POST["f_email"];

        $checkUser = $modelResetPass->checkUser($username, $email);
        $mailBodyTemplate = $modelResetPass->resetPasswordMail($username, $email);

        if(!empty($username) || !empty($email)) {

            if($username != $checkUser[0] || $email != $checkUser[1]) {
                $response = array("message" => "Sorry, you input a invalid accout. Please try again.", "status" => 2);
                echo json_encode($response);
                exit;
            }

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = "html";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "progressivemedicalcorpo@gmail.com";
            $mail->Password = "yugadyzuxpfypbgd";
            $mail->setFrom("cleanspace@pmc.ph", "no-reply");
            // $mail->addAddress("rivera.jerome.dc.1525@gmail.com", "PMC");
            $mail->addAddress($email);
            $mail->Subject = "Reset Password";
            $mail->Body = $mailBodyTemplate;
            $mail->isHTML(true);

            if(!$mail->send()) {
                $response = array("message" => "Something went wrong!", "status" => 0);
            } else {
                $response = array("message" => "We sent you a link in your email. Please check your email.", "status" => 1);
            }

        } else {
            $response = array("message" => "Please double check the field, fill up the required fields.", "status" => 3);
        }

        break;

    case "updatePassword":
        $username = $_POST["u_username"];
        $password = $_POST["u_password"];
        $confirm_password = $_POST["u_confirm_password"];
        $email = $_POST["email"];

        $checkUser = $modelResetPass->checkUser($username, $email);

        if(!empty($username) || !empty($password) || !empty($confirm_password)) {

            if($username != $checkUser[0] || $email != $checkUser[1]) {
                $response = array("message" => "Password did not match. Please try again!", "status" => 4);
                echo json_encode($response);
                exit;
            }

            if($password != $confirm_password) {
                $response = array("status" => 7);
                echo json_encode($response);
                exit;
            }

            $modelResetPass->updatePassword($username, $password, $email);
            $response = array("message" => "You are successfully update your password, you may login now.", "status" => 5);

        } else {
            $response = array("message" => "Please double check the field, fill up the required fields.", "status" => 6);
        }

        break;

    default:
        echo "404 not found";
        exit;
}
echo json_encode($response);
?>