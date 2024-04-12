<?php
include "controller.db.php";
include "../model/model.users.php";

$modelUsers = new ModelUsers();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "getUsers":
        $getUser = $modelUsers->getUsers();
        $s = "";
        foreach ($getUser as $k => $v) {
            $getUser[$k]["row"] = $k+1;
            $getUser[$k]["username"] = $v["username"];
            $getUser[$k]["password"] = str_pad($s,strlen($v["password"]),"*");
            $getUser[$k]["email"] = $v["email"];
            $getUser[$k]["user_type"] = $v["user_type"];
            $getUser[$k]["status"] = $v["status"] = ($v["status"] == 1) ? "Enabled" : "Disabled";
            $getUser[$k]["action"] = "
            <center>
                <button type='button' class='primary_btn' onclick='updateUserModal(\"". $v['id'] ."\", \"". $v['username'] ."\", \"". $v['password'] ."\", \"". $v['email'] ."\", \"". $v['user_type'] ."\", \"". $v['status'] ."\")'><i class='bi bi-pencil-square'></i></button>
                <button type='button' class='danger_btn' onclick='deleteUser(\"". $v['id'] ."\")'><i class='bi bi-trash-fill'></i></button>
            </center>
            ";
        }
        $response = array("userData" => $getUser);
        break;

    case "addUsers":
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $status = $_POST["status"];
        $type = $_POST["user_type"];

        if (!empty($email) && !empty($username) && !empty($password) && !empty($confirm_password)) {
            if($password != $confirm_password) {
                $response = array("message" => "Password is not match!", "status" => 0);
                echo json_encode($response);
                exit;
            } 

            $userRegistration = $modelUsers->addUser($email, $username, $password, $status, $type);
            $response = array("message" => "You successfully add new account.", "status" => 1);
        } else {
            $response = array("message" => "Please fill up the required field!", "status" => 2);
        }
        break;
    
    case "updateUsers":
        $id = $_POST["id"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = $_POST["status"];
        $user_type = $_POST["user_type"];

        if (!empty($email) && !empty($username) && !empty($password)) {
            $modelUsers->updateUser($id, $email, $username, $password, $status, $user_type);
            $response = array("message" => "The account was successfully updated.", "status" => 1);
        } else {
            $response = array("message" => "Please fill up the required field!", "status" => 0);
        }
        break;

    case "deleteUsers":
        $id = $_GET["id"];
        $modelUsers->deleteUsers($id);
        $response = array("message" => "User was successfully deleted!", "status" => 1);
        break;

    default:
        echo "404 not found";
        exit;
}

echo json_encode($response);
?>