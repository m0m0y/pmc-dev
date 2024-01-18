<?php
include "controller.db.php";
include "../model/model.register.php";

$userRegistration = new ModelRegister();

$mode = isset($_GET["mode"]) ?  $_GET["mode"] : NULL;

switch($mode) {
    case "add";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = $_POST["status"];
        $type = $_POST["user_type"];
        $userRegistration = $userRegistration->registerUser($username, $password, $status, $type);

        $response = array("message" => "Successfully Register!");
        break;

    default:
        echo "<h1>404 Error</h1>";
        exit;
}


echo json_encode($response);
?>