<?php
require_once __DIR__ . '/../Database.php';

class Beer {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllBeers() {
        $stmt = $this->db->query("SELECT * FROM beers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
