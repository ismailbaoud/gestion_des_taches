<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../../../config/connectiondb.class.php";
require_once __DIR__ . "/../../modules/member.classe.php";

class _member{

    private $db;

    public function __construct() {
        $datab = new ConnectionDB();
        $this->db = $datab->getConnection();
    }

    public function display() {
        $members = member::get_members($this->db);
        
        return $members;
    }
}
?>