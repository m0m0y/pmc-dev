<?php

class ModelRegister extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function registerUser($email, $username, $password, $status, $type) {
        $query = $this->conn->prepare("INSERT INTO users (username, password, email, status, user_type) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$username, $password, $email, $status, $type]);
    }
}