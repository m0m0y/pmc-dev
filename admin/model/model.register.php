<?php

class ModelRegister extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function registerUser($username, $password, $status, $type) {
        $query = $this->conn->prepare("INSERT INTO users (username, password, status, user_type) VALUES (?, ?, ?, ?)");
        $query->execute([$username, $password, $status, $type]);
    }
}