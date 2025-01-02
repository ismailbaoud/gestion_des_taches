<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../modules/equipe.php";
require_once __DIR__ . "/../../../config/connectiondb.class.php";

class equipe_handling {
    private $db;
    
    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    
    public function display() {
        
        try {
            return equipe::get_equipe($this->db);
        } catch (PDOException $e) {
            error_log("Error in category display: " . $e->getMessage());
            return [];
        }
    }
}

if(isset($_POST["btn_category"])) {
    $name = $_POST["name"];
    $category = new category_handling();
    $category->getdata($name);
    header("location: ../../views/CTO/dashboard_CTO.php");
}
?>