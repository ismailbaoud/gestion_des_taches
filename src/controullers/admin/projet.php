<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../../config/connectiondb.class.php";
require_once __DIR__ . "/../../modules/projet.classe.php";

class all_projets{

    private $db;

    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function display() {
        $projets = projet::get_all_projects($this->db);
        
        return $projets;
    }
}
?>