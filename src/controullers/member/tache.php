<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../../config/connectiondb.class.php";
require_once __DIR__ . "/../../modules/tache.class.php";

class tache_member{

    private $db;

    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function display_todo_taches($id){
        $taches = tache::get_todo_taches($this->db,$id);
        return $taches;
    }
    public function display_doing_taches($id){
        $taches = tache::get_doing_taches($this->db,$id);
        return $taches;
    } 
    public function display_done_taches($id){
        $taches = tache::get_done_taches($this->db,$id);
        return $taches;
    }
}
if(isset($_POST["btn_tache"])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $projet_id = $_POST["projet_id"];
    $member_id = $_POST["member_id"];
    $priority = $_POST["priority"];
    $category_id = $_POST["category_id"];
    $date = $_POST["date"];


    $res = new _tache();
    $res->add_tache($title,$description,$projet_id,$member_id,$priority,$category_id,$date);
    header("location: ../../views/CTO/dashboard_CTO.php");
}
$todo_count= 0;
$doing_count= 0;
$done_count= 0;
$id=$_SESSION["member_id"];
$total_count =$todo_count + $doing_count + $done_count;
$res = new tache_member();
$taches = $res->display_todo_taches($id);
if($taches == null){ $tache = [];}
foreach ($taches as $tache) {
    $todo_count++;
}
$res = new tache_member();
$taches = $res->display_doing_taches($id);
if($taches == null){ $tache = [];}
foreach ($taches as $tache) {
    $doing_count++;
}
$res = new tache_member();
$taches = $res->display_done_taches($id);
if($taches == null){ $tache = [];}
foreach ($taches as $tache) {
    $done_count++;
}

?>