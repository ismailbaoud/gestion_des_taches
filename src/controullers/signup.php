<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
                header("location: /");
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

$nameregex = "/^[a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?[a-zA-Z]*$/";
$passregex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
$emailregex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

$isvalide = true;
if(isset($_POST["btn_signup"])){
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    if(empty($username) || !preg_match($nameregex, $username)){
        $isvalide = false;
        $_SESSION["errname"] = "invalide name please entervalide name ";
    }else{
        $_SESSION["errname"] = "valide name";

    }
    if(empty($email) || !preg_match($emailregex, $email)){
        $isvalide = false;
        $_SESSION["erremail"]  = "invalide email please entervalide email ";
    }else{
        $_SESSION["erremail"] = "valide name";

    }
    if(empty($password) || !preg_match($passregex, $password)){
        $isvalide = false;
        $_SESSION["errpass"] = "invalide password please entervalide password ";
    }else{

        $_SESSION["errpass"] = "valide name";
    }
    if($isvalide){

        $user = new signup();
        $user->signupset($username, $email, $password);

        header('location: /');
    }else{
       $_SESSION["infoerr"] = "<script>alert('invalide register ,please enter valide informations agine status : #".$_SESSION["errname"]."   #".$_SESSION["erremail"]."   #".$_SESSION["errpass"]."')</script>";
       header('location: /');
    }
}
?>