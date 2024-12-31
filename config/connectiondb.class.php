<?php 

class cennectiondb{
    private $username = "root";
    private $password = "baoud";
    private $host = "localhost";
    private $db = "project_management";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db,
                $this->username,
                $this->password
            );

        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>