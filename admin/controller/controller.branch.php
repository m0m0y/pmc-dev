<?php
include "controller.db.php";
include "../model/model.branch.php";

$modelBranch = new ModelBranch();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) { 
    case "getBranches":
        $getBranch = $modelBranch->getBranches();
        foreach ($getBranch as $k => $v) {
            $getBranch[$k]["branch_name"] = $v["branch_name"];
            $getBranch[$k]["branch_tel"] = $v["branch_tel"];
            $getBranch[$k]["branch_mob"] = $v["branch_mob"];
            $getBranch[$k]["branch_fax"] = $v["branch_fax"];
            $getBranch[$k]["branch_email"] = $v["branch_email"];
            $getBranch[$k]["branch_status"] = $v["branch_status"] = ($v["branch_status"] == 1) ? "Enabled" : "Disabled";
            $getBranch[$k]["action"] = "
            <center>
                <button type='button' class='primary_btn' onclick='updateBranchModal(\"". $v['branch_id'] ."\", \"". $v['branch_name'] ."\", \"". $v['branch_address'] ."\", \"". $v['branch_tel'] ."\", \"". $v['branch_mob'] ."\", \"". $v['branch_fax'] ."\", \"". $v['branch_email'] ."\", \"". $v['branch_status'] ."\")'><i class='bi bi-pencil-square'></i></button>
                <button type='button' class='danger_btn' onclick='deleteBranch(\"". $v['branch_id'] ."\")'><i class='bi bi-trash-fill'></i></button>
            </center>
            ";
        }
        $response = array("branchData" => $getBranch);
        break;

    case "addBranch":
        $branch_name = $_POST["branch_name"];
        $branch_address = $_POST["branch_address"];
        $branch_tel = $_POST["branch_tel"];
        $branch_mob = $_POST["branch_mob"];
        $branch_fax = $_POST["branch_fax"];
        $branch_email = $_POST["branch_email"];
        $branch_status = $_POST["branch_status"];

        if (!empty($branch_name) && !empty($branch_address) && !empty($branch_tel) && !empty($branch_email)) {
            // $modelBranch->addNewBranch($branch_name, $branch_address, $branch_tel, $branch_mob, $branch_fax, $branch_email);
            echo "test";
            $response = array("message" => "You successfully add new branch", "status" => 1);
        } else {
            $response = array("message" => "Please fill up the required field!", "status" => 0);
        }
        break;

    case "updateBranch":
        $branch_name = $_POST["branch_name"];
        $branch_address = $_POST["branch_address"];
        $branch_tel = $_POST["branch_tel"];
        $branch_mob = $_POST["branch_mob"];
        $branch_fax = $_POST["branch_fax"];
        $branch_email = $_POST["branch_email"];
        $branch_status = $_POST["branch_status"];
        $branch_id = $_POST["branch_id"];

        if(!empty($branch_name) && !empty($branch_address) && !empty($branch_tel) && !empty($branch_email)) {
            $modelBranch->updateBranches($branch_name, $branch_address, $branch_tel, $branch_mob, $branch_fax, $branch_email, $branch_status, $branch_id);
            $response = array("message" => "Update successfully", "status" => 1);
        } else {
            $response = array("message" => "Please fill up the required field!", "status" => 0);
        }
        break;

    case "deleteBranch":
        $id = $_GET["branch_id"];
        $modelBranch->deleteBranch($id);
        $response = array("message" => "Successfully deleted", "status" => 1);
        break;

    default:
        echo "404 not found";
        exit;
}

echo json_encode($response);