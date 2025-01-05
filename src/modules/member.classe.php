<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'user.php';

class member extends User {
    
    public function __construct($fullname, $email, $password) {
        parent::__construct($fullname, $email, $password);

    }

   
    public function add_to_db($db){
        try {
            $query = "INSERT INTO member (fullname, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$this->fullname, $this->email, password_hash($this->password,PASSWORD_DEFAULT)]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    static function get_members($db){
        try {
            $query = "SELECT * FROM member where status = 'active'";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
           
        } catch(PDOException $e) {
            return false;
        }
    }

    static function check_member($db){
        try {
            $query = "SELECT id, fullname as username, email FROM member WHERE email = ? AND password = ? and status = 'active'";
            $stmt = $db->prepare($query);
            $stmt->execute([$email, $password]);
            return $stmt;
        } catch(PDOException $e) {
            return false;
        }
    }

    static function is_member($db){
        $query = "SELECT fullname as username, email FROM member WHERE email = :email AND password = :password and status = 'active'";
        $stmt = $db->prepare($query);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password", $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
    static function check_email($db,$email){
        $check_query = "SELECT email FROM member WHERE email = ? and status = 'active'";
        $check_stmt = $db->prepare($check_query);
        $check_stmt->execute([$email]);
        return $check_stmt;
    }
}
?>