<?php
include "controller/controller.auth.php";
$auth = new Auth();

session_unset();
session_destroy();
$location = "login.php";
if($location) {
    header("location: " . $location);
    exit();
}