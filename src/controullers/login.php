<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
            $query = "SELECT id, password,fullname as username, email FROM admin WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->execute();
            $result = [];
            $test = $stmt->fetch(PDO::FETCH_ASSOC);
            if($test){
            if(!password_verify($password,$test["password"])){
                $result = $test;
            }}
         
            
            if($result) {
                    $_SESSION["role"] = "admin";
                    $_SESSION["admin_id"] = $result["id"];
                    $_SESSION["fullname"] = $result["username"];
                    $_SESSION["email"] = $result["email"];

                
                return "admin";
            }
            $query = "SELECT CTO_id as id,password,fullname as username, email FROM CTO WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            $test = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = [];
            if($test){
            if(!password_verify($password,$test["password"])){
                $result = $test;
            }}
            if($result) {
                    $_SESSION["role"] = "CTO";
                    $_SESSION["cto_id"] = $result["id"];
                    $_SESSION["fullname"] = $result["username"];
                    $_SESSION["email"] = $result["email"];

                
                return "CTO";
            }
            $query = "SELECT member_id,password,fullname as username, email FROM member WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            $result = [];
            $test = $stmt->fetch(PDO::FETCH_ASSOC);
            if($test){
            if(!password_verify($password,$test["password"])){
                $result = $test;
            }
        }
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
$passregex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
$isvalide = true;
if(isset($_POST["btn_login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(empty($email) || !preg_match($emailregex, $email)){
        $isvalide = false;
        $_SESSION["erremail"]  = "invalide email please entervalide email ";
    }else{
        $_SESSION["erremail"] = "valide email";

    }if($isvalide){

        $user = new login();
        $is_a = $user->loginset($email, $password);
        if($is_a == "admin"){
            header("location: /admin_dashboard");
    
        }
        elseif($is_a == "CTO"){
            header("location: /CTO_dashboard");
        }
        elseif($is_a == "member"){
            header("location: /member_dashboard");
        }else{
            header("location: /");
            
        }
    }else{
        $_SESSION["infoerr"] = "<script>alert('invalide register ,please enter valide informations agine status : #".$_SESSION["erremail"]."')</script>";
        header('location: /');
     }

}
?>