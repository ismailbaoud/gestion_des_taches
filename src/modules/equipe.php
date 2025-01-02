<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class equipe {
    private $name;
    
    public function add_member($conn,$cto_id,$member_id){
            try {
                $query = "UPDATE member SET cto_id = ? WHERE id = ? ";
                $stmt = $conn->prepare($query);
                $stmt->execute([$cto_id, $member_id]);
                return true;
            } catch(PDOException $e) {
                return false;
            }
    }
    static function get_equipe($db){
        try {
            $query = "SELECT member_id,fullname, email FROM member where CTO_id is null";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return false;
        }
    }
}