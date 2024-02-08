<?php

class ModelUsers extends db_conn_mysql { 

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function getUsers() {
        $query = $this->conn->prepare("SELECT * FROM users WHERE status = 1");
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        return $response;
    }

    public function addUser($email, $username, $password, $status, $type) {
        $query = $this->conn->prepare("INSERT INTO users (username, password, email, status, user_type) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$username, $password, $email, $status, $type]);
    }

    public function updateUser($id, $email, $username, $password, $status, $user_type) {
        $query = $this->conn->prepare("UPDATE users SET username = ?, password = ?, email = ?, status = ?, user_type = ? WHERE id = ?");
        $query->execute([$username, $password, $email, $status, $user_type, $id]);
    }

    public function deleteUsers($id) {
        $query = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$id]);
    }
    
}