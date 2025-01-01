<?php 

require_once 'user.php';

class member extends User {
    
    public function __construct($fullname, $email, $password) {
        parent::__construct($fullname, $email, $password);

    }

    static function check_email($db,$email){
        $check_query = "SELECT email FROM member WHERE email = ?";
        $check_stmt = $db->prepare($check_query);
        $check_stmt->execute([$email]);
        return $check_stmt;
    }
    public function add_to_db($db){
        try {
            $query = "INSERT INTO member (fullname, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$this->fullname, $this->email, $this->password]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function get_members($db){
        try {
            $query = "SELECT fullname, email FROM member";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt;
        } catch(PDOException $e) {
            return false;
        }
    }

    static function check_member($db){
        try {
            $query = "SELECT id, fullname as username, email FROM member WHERE email = ? AND password = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$email, $password]);
            return $stmt;
        } catch(PDOException $e) {
            return false;
        }
    }
    
}
?>