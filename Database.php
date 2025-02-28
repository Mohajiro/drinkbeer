<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'mysql-drinkbeer.alwaysdata.net';
    private $user = 'drinkbeer';
    private $pass = 'Qwerty2024@';
    private $name = 'drinkbeer_db';

    // La constructeur est privé pour empêcher l'instanciation directe
    private function __construct() {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    // Obtenez l'instance de la base de données
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Obtenez la connexion PDO
    public function getConnection() {
        return $this->conn;
    }
}
?>

