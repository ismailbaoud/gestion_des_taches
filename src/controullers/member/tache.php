<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    header("location: src/views/CTO/dashboard_CTO.php");
}


?>