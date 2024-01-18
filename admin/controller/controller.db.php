<?php

    class db_conn_mysql{

        private $servername;
        private $username;
        private $password;
        private $db;

        public function db_conn() {

            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->db = "pmc_admin";

            try {
                $conn = new PDO("mysql:host=$this->servername; dbname=$this->db", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully"; 
            }
            catch(PDOException $e) {
                "Connection failed: " . $e->getMessage();
            }

        return $conn;
        }
    }
    
?>