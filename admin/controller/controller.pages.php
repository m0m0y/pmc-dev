<?php
include "controller.db.php";

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "add":
        echo "test";
        break;
}