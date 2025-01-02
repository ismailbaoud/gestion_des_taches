<?php 

class projet{
    private $name ;
    private $description;
    private $CTO_id = 1;

    public function __construct($name,$description) {
        $this->name = $name;
        $this->description = $description;
    }

    public function add_to_db($conn){
        try {
            $query = "INSERT INTO projet (title,description, cto_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->name, $this->description, $this->CTO_id]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    static function get_projects($conn){
            try {
                $query = "SELECT title, description,status FROM projet ORDER BY title ASC";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                error_log("Error displaying categories: " . $e->getMessage());
               
            }
        
    }

}
?>