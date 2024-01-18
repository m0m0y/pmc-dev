<?php

class ModelLogin extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function loginUser($username, $password) {
        $query = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND status = 0");
        $query->execute([$username, $password]);
        $response = $query->fetch();

        return $response;
    }
}