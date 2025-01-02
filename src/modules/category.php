<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Category {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function add_to_db($conn) {
        try {
            $query = "INSERT INTO category (name) VALUES (:name)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            error_log("Error adding category: " . $e->getMessage());
            return false;
        }
    }  

    public static function display($conn) {
        try {
            $query = "SELECT category_id, name FROM category ORDER BY name ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error displaying categories: " . $e->getMessage());
            return [];
        }
    }
}
?>