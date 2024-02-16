<?php
include "controller.db.php";
include "../model/model.careers.php";

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "addCareers";
        $target_dir = "../assets/img/careers/";
        $target_file = $target_dir . basename($_FILES["careers_img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        if (file_exists($target_file)) {
            $response = array("message" => "Sorry, file already exists.", "status" => 3);
            echo json_encode($response);
            exit;
        }

        // // Check if the file is exist in the path
        // if (file_exists($target_file)) {
        //     $response = array("message" => "Sorry, file already exists.", "status" => 3);
        //     echo json_encode($response);
        //     exit;
        // }


        // // Checking the size of the image
        // if ($_FILES["careers_img"]["size"] > 500000) {
        //     $response = array("message" => "Sorry, your file is too large.", "status" => 2);
        //     echo json_encode($response);
        //     exit;
        // }

         if($_FILES["careers_img"]["name"]=="" || $_FILES["careers_img"]["name"]) {
            if (move_uploaded_file($_FILES["careers_img"]["tmp_name"], $target_file)) {

                $response = array("message" => "The file has been uploaded.", "status" => 1);
                echo json_encode($response);
                exit;

            }
        }


        // // Upload to target 
        // if (move_uploaded_file($_FILES["careers_img"]["tmp_name"], $target_file)) {

        //     $response = array("message" => "The file has been uploaded.", "status" => 1);
        //     echo json_encode($response);
        //     exit;

        // } else {

        //     $response = array("message" => "Sorry, there was an error uploading your file.", "status" => 0);
        //     echo json_encode($response);
        //     exit;

        // }
        
        break;

    default;
        echo "404 not found";
        exit;
}

echo json_encode($response);
?>