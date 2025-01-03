<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../../config/connectiondb.class.php";
require_once __DIR__ . "/../../modules/member.classe.php";
require_once __DIR__ . "/../../modules/tache.class.php";
require_once __DIR__ . "/../../modules/projet.classe.php";
require_once __DIR__ . "/../../modules/member.classe.php";


class statistics{

    private $db;

    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function members() {
        $members = member::get_members($this->db);
        
        return $members;
    }

    public function project_complet() {
        $projets = projet::get_members($this->db);
        
        return $projets;
    }

    public function project_active() {
        $projets = projet::get_members($this->db);
        
        return $projets;
    }
    public function taches() {
        $taches = tache::get_all_taches($this->db);
        
        return $taches;
    }
    
}
$total_members = 0;
$complete_projects = 0;
$active_projects = 0;
$total_taches = 0;

$stat = new statistics();
$members = $stat->members();
foreach($members as $member){
    $total_members++;
}
$stat = new statistics();
$projects = $stat->project_complet();
foreach($projects as $project){
    $complete_projects++;
}
$stat = new statistics();
$projects = $stat->project_active();
foreach($projects as $project){
    $active_projects++;
}
$stat = new statistics();
$projects = $stat->taches();
foreach($projects as $project){
    $active_projects++;
}
var_dump($total_members,$complete_projects,$active_projects);
die();

?>