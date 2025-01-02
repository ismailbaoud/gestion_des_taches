<?php 

class tache{
    private $title;
    private $description;
    private $projet_id;
    private $member_id;
    private $priority;
    private $category_id;
    private $date;

    public function __construct($title,$description,$projet_id,$member_id,$priority,$category_id,$date){
        $this->title = $title;
        $this->description = $description;
        $this->projet_id = $projet_id;
        $this->member_id = $member_id;
        $this->priority = $priority;
        $this->category_id = $category_id;
        $this->date = $date;
    }

    public function add_to_db($db){
        try {
            $query = "INSERT INTO tache (title , description, date, tag, member_id, category_id,projet_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);

            $stmt->execute([$this->title, $this->description, $this->date  , $this->priority , $this->member_id, $this->category_id , $this->projet_id]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
    
    static function get_taches($conn){
        try {
            $query = "SELECT * FROM tache";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error displaying categories: " . $e->getMessage());
           
        }
    
    }

}
?>