<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../../config/connectiondb.class.php";
require_once __DIR__ . "/../../modules/projet.classe.php";

class _projet{

    private $db;

    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function add_project($name, $des,$visibility,$id){
        $project = new projet($name, $des,$visibility,$id);
        $project->add_to_db($this->db);
    }

    public function display_project($id){
        $projets = projet::get_projects($this->db,$id);
        return $projets;
    }
    public function display_public_project(){
        $projets = projet::get_public_projects($this->db);
        return $projets;
    }
}
if(isset($_POST["btn_project"])){
    session_start();
    $name = $_POST["name"];
    $description = $_POST["description"];
    $visibility = $_POST["visibility"];
    $id = $_SESSION["cto_id"];
    $res = new _projet();
    $res->add_project($name, $description,$visibility,$id);
    header("location: ../../views/CTO/dashboard_CTO.php");

}
?>