<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../modules/category.php";
require_once __DIR__ . "/../../../config/connectiondb.class.php";

class category_handling {
    private $db;
    
    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function getdata($name) {
        $category = new category($name);
        $category->add_to_db($this->db);
    }
    
    public static function display() {
        $datab = new ConnectionDB();
        $db = $datab->getConnection();
        
        try {
            $query = "SELECT category_id, name FROM category ORDER BY name ASC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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