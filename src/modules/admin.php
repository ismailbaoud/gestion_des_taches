<?php 

    require_once 'user.php';

    class admin extends User {
        
        public function __construct($fullname, $email, $password) {
            parent::__construct($fullname, $email, $password);
        }

        public function add_to_db($db){
            try {
                $query = "INSERT INTO admin (fullname, email, password) VALUES (?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->execute([$this->fullname, $this->email, $this->password]);
                return true;
            } catch(PDOException $e) {
                return false;
            }
        }

        static function get_admins($db){
            try {
                $query = "SELECT fullname, email FROM admin";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $stmt;
            } catch(PDOException $e) {
                return false;
            }
        }

        static function check_admin($db,$email,$password){
            try {
                $query = "SELECT id, fullname as username, email FROM admin WHERE email = ? AND password = ?";
                $stmt = $db->prepare($query);
                $stmt->execute([$email, $password]);
                
                return $stmt;
            } catch(PDOException $e) {
                return false;
            }
        }
    }
?>