<?php

class ModelBranch extends db_conn_mysql { 

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function getBranches() {
        $query = $this->conn->prepare("SELECT * FROM branches");
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        return $response;
    }

    public function addNewBranch($branch_name, $branch_address, $branch_tel, $branch_mob, $branch_fax, $branch_email) {
        $query = $this->conn->prepare("INSERT INTO branches (branch_name, branch_address, branch_tel, branch_mob, branch_fax, branch_email) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$branch_name, $branch_address, $branch_tel, $branch_mob, $branch_fax, $branch_email]);
    }

    public function deleteBranch($id) {
        $query = $this->conn->prepare("DELETE FROM branches WHERE branch_id = ?");
        $query->execute([$id]);
    }

}