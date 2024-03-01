<?php 

class ModelCareers extends db_conn_mysql { 

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function getCareers() {
        $query = $this->conn->prepare("SELECT * FROM careers");
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }

    public function addCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status) {
        $careers_content = htmlentities($careers_content);
        $query = $this->conn->prepare("INSERT INTO careers (careers_title, careers_subtitle, careers_mailto, careers_content, career_img, careers_status) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status]);
    }

    public function updateCareers($careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status, $careers_id) {
        $careers_content = htmlentities($careers_content);
        $query = $this->conn->prepare("UPDATE careers SET careers_title = ?, careers_subtitle = ?, careers_mailto = ?, careers_content = ?, career_img = ?, careers_status = ? WHERE careers_id = ?");
        $query->execute([$careers_title, $careers_subtitle, $careers_mailto, $careers_content, $career_img, $careers_status, $careers_id]);
    }

    public function deleteCareer($careers_id) {
        $query = $this->conn->prepare("DELETE FROM careers WHERE careers_id = ?");
        $query->execute([$careers_id]);
    }

}