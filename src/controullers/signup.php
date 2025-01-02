<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../src/modules/admin.php";
include_once "../../src/modules/member.classe.php";
include_once "../../src/modules/CTO.class.php";
include_once "../../config/connectiondb.class.php";

class signup{
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
            
            $check_member = member::check_email($this->db,$this->email);
            $check_CTO = CTO::check_email($this->db,$this->email);
            $check_admin = admin::check_email($this->db,$this->email);
            if($check_member->rowCount() > 0 || $check_CTO->rowCount() > 0 || $check_admin->rowCount() > 0) {
                $err = "email not found";
                header("location: ../../public/index.php?action=$err");
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
}
if(isset($_POST["btn_signup"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $user = new signup();
    $user->signupset($username, $email, $password);
    header('location: ../../public/index.php');
}
?>