<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class ConnectionDB
{
    private $username = "root";
    private $password = "baoud";
    private $host = "localhost";
    private $db = "project_management";
    private $conn;

    public function getConnection()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db,
                $this->username,
                $this->password
            );
            return $this->conn;

        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
}

?>