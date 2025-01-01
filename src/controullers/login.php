<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../src/modules/admin.php";
include_once "../../src/modules/member.classe.php";
include_once "../../src/modules/CTO.class.php";
include_once "../../config/connectiondb.class.php";

class getdata{
    private $username;
    private $email;
    private $password;
    private $db;
    
    public function __construct(){
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
        if($this->db === null) {
            die("Database connection failed");
        }
    }
    
    public function signupset($username, $email, $password){
        try {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            
            $check_stmt = member::check_email($this->db,$this->email);
            if($check_stmt->rowCount() > 0) {
                return false;
            }
            $is_exest = admin::get_admins($this->db);
            if($is_exest->rowCount() > 0){
                $member = new member($this->username, $this->email, $this->password);
                return $member->add_to_db($this->db);
            }else{
                $member = new admin($this->username, $this->email, $this->password);
                return $member->add_to_db($this->db);
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function loginset($email, $password){
        try {
            $stmt_admin = admin::check_admin($this->db,$email, $password);
            

            if($stmt_admin) {
              
                return "admin";
            }
                $stmt_CTO = CTO::check_CTO($this->db,$email, $password);
              
                if($stmt_CTO) {
                    var_dump($stmt_CTO);
                    return "CTO";
                }
                    $stmt = member::check_member($this->db,$email, $password);
                    
                    if($stmt) {
                        var_dump($stmt);
                        return "member";
                    }
                
            
        
            
            
            return false;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

if(isset($_POST["btn_signup"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $user = new getdata();
    if($user->signupset($username, $email, $password)) {
        header("location: ../../public/index.php");
    } else {
        header("location: ../../public/index.php");
    }
}

if(isset($_POST["btn_login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new getdata();
    $is_a = $user->loginset($email, $password);
   
}
?>