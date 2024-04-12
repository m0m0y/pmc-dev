<?php
include "controller.db.php";
include "../model/model.careers.php";

$modelCareers = new ModelCareers();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {
    case "addCareers":
        $target_dir = "../assets/img/careers/";
        $target_file = $target_dir . basename($_FILES["careers_img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // UPLOAD WITH IMAGE
        if(isset($_FILES["careers_img"]) && !empty($_FILES["careers_img"]["name"])) {

            // Check if the file is exist in the path
            if(file_exists($target_file)) {
                $response = array("message" => "Sorry, file already exists", "status" => 3);
                echo json_encode($response);
                exit;
            }

            // Checking the size of the image
            if ($_FILES["careers_img"]["size"] > 500000) {
                $response = array("message" => "Sorry, your file is too large", "status" => 2);
                echo json_encode($response);
                exit;
            }
            
            // Move image to folder and insert to database at the same time
            if (move_uploaded_file($_FILES["careers_img"]["tmp_name"], $target_file)) {
                $careers_title = $_POST["careers_title"];
                $careers_subtitle = $_POST["careers_subtitle"];
                $careers_mailto = $_POST["careers_mailto"];
                $careers_content =  $_POST["careers_content"];
                $career_img = $_FILES["careers_img"]["name"];
                $careers_status = $_POST["careers_status"];

                $modelCareers->addCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status);

                $response = array("message" => "Successfully adding new careers in the website", "status" => 1);
                echo json_encode($response);
                exit;
            } else {
                $response = array("message" => "Sorry, there was an error uploading your file", "status" => 0);
                echo json_encode($response);
                exit;        
            }

        } 
        // UPLOAD WITHOUT IMAGE
        else {
            $careers_title = $_POST["careers_title"];
            $careers_subtitle = $_POST["careers_subtitle"];
            $careers_mailto = $_POST["careers_mailto"];
            $careers_content =  $_POST["careers_content"];
            $career_img = "n/a";
            $careers_status = $_POST["careers_status"];

            $modelCareers->addCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status);

            $response = array("message" => "Successfully adding new careers in the website.", "status" => 1);
            echo json_encode($response);
            exit;

        }
        break;

    case "updateCareers":
        $target_dir = "../assets/img/careers/";
        $target_file = $target_dir . basename($_FILES["careers_img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // UPLOAD WITH IMAGE
        if(isset($_FILES["careers_img"]) && !empty($_FILES["careers_img"]["name"])) {

            // Check if the file is exist in the path
            if(file_exists($target_file)) {
                $response = array("message" => "Sorry, file already exists", "status" => 3);
                echo json_encode($response);
                exit;
            }

            // Checking the size of the image
            if ($_FILES["careers_img"]["size"] > 500000) {
                $response = array("message" => "Sorry, your file is too large", "status" => 2);
                echo json_encode($response);
                exit;
            }
            
            // Move image to folder and insert to database at the same time
            if (move_uploaded_file($_FILES["careers_img"]["tmp_name"], $target_file)) {
                $careers_title = $_POST["careers_title"];
                $careers_subtitle = $_POST["careers_subtitle"];
                $careers_mailto = $_POST["careers_mailto"];
                $careers_content = $_POST["careers_content"];
                $career_img = $_FILES["careers_img"]["name"];
                $careers_status = $_POST["careers_status"];
                $careers_id = $_POST["careers_id"];

                $modelCareers->updateCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status, $careers_id);

                $response = array("message" => "Update successfully", "status" => 4);
                echo json_encode($response);
                exit;
            } else {
                $response = array("message" => "Sorry, there was an error uploading your file.", "status" => 0);
                echo json_encode($response);
                exit;        
            }

        }
        // UPLOAD WITHOUT IMAGE
        else {
            $careers_title = $_POST["careers_title"];
            $careers_subtitle = $_POST["careers_subtitle"];
            $careers_mailto = $_POST["careers_mailto"];
            $careers_content =  $_POST["careers_content"];
            $career_img = $_POST["images"];
            $careers_status = $_POST["careers_status"];
            $careers_id = $_POST["careers_id"];

            $modelCareers->updateCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status, $careers_id);

            $response = array("message" => "Update successfully", "status" => 4);
            echo json_encode($response);
            exit;

        }
        break;

    case "deleteCareer":
        $careers_id = $_GET["careers_id"];
        $modelCareers->deleteCareer($careers_id);
        $response = array("message" => "You delete item successfully", "status" => 1);
        break;

    default;
        echo "404 not found";
        exit;
}

echo json_encode($response);
?>