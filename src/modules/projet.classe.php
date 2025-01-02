<?php 

class projet{
    private $name ;
    private $description;
    private $CTO_id = 1;
    private $visibility ;

    public function __construct($name,$description,$visibility) {
        $this->name = $name;
        $this->description = $description;
        $this->visibility= $visibility;
    }

    public function add_to_db($conn){
        try {
            $query = "INSERT INTO projet (title,description, cto_id,visibility) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->name, $this->description, $this->CTO_id, $this->visibility]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    static function get_projects($conn){
            try {
                $query = "SELECT title, description,status,visibility FROM projet ORDER BY title ASC";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                error_log("Error displaying categories: " . $e->getMessage());
               
            }
        
    }

    static function get_public_projects($conn){
        try {
            $query = "SELECT title, description,status FROM projet where visibility = 'public' ORDER BY title ASC ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error displaying categories: " . $e->getMessage());
           
        }
    
}

}
?>