<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once "../../src/modules/admin.php";
include_once "../../src/modules/member.classe.php";
include_once "../../src/modules/CTO.class.php";
include_once "../../config/connectiondb.class.php";

class login{
    private $username;
    private $email;
    private $password;
    private $db;
    
    public function __construct(){
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }
    
    public function loginset($email, $password){
        try {
            $query = "SELECT id, fullname as username, email FROM admin WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
         
            
            if($result) {
                    $_SESSION["role"] = "admin";
                    $_SESSION["admin_id"] = $result["id"];
                    $_SESSION["fullname"] = $result["username"];
                    $_SESSION["email"] = $result["email"];

                
                return "admin";
            }
            $query = "SELECT CTO_id as id,fullname as username, email FROM CTO WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
         
            if($result) {
                    $_SESSION["role"] = "CTO";
                    $_SESSION["cto_id"] = $result["id"];
                    $_SESSION["fullname"] = $result["username"];
                    $_SESSION["email"] = $result["email"];

                
                return "CTO";
            }
            $query = "SELECT member_id,fullname as username, email FROM member WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
         
            if($result) {
                    $_SESSION["role"] = "member";
                    $_SESSION["member_id"] = $result["member_id"];
                    $_SESSION["fullname"] = $result["username"];
                    $_SESSION["email"] = $result["email"];

                
                return "member";
            }

            
            return false;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

if(isset($_POST["btn_login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new login();
    $is_a = $user->loginset($email, $password);
    if($is_a == "admin"){
        header("location: ../views/admin/dashboard_admin.php");

    }
    elseif($is_a == "CTO"){
        header("location: ../views/CTO/dashboard_CTO.php");
    }
    elseif($is_a == "member"){
        header("location: ../views/member/dashboard_member.php");
    }

}
?>