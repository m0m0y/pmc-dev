<?php
include "controller.db.php";
include "controller.auth.php";
include "../model/model.login.php";

$modelLogin = new ModelLogin();
$auth = new Auth();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "login":
        error_reporting(E_ALL);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $users = $modelLogin->loginUser($username, $password); 

        if(!$users) {
            $response = array("message" => "Sorry, you input a invalid accout. Please try again.", "status" => 0);
            echo json_encode($response);
            exit;
        }

        $_SESSION["auth"] = true;
        $_SESSION["name"] = $users[1];
        $_SESSION["type"] = $users[4];

        $response = array("message" => "You are successfully logged in!", "status" => 1);
        break;

    default:
        echo "<h1>404 Error</h1>";
        exit;
}


echo json_encode($response);
?>