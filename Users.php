<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Obtenez tous les users
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajoutez un nouvel user
    public function addUser($name, $password, $email, $role) {
        $stmt = $this->db->prepare("INSERT INTO users (name, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $password, $email, $role]); 
    }

    // Mettez à jour un user
    public function updateUser($name, $email, $password, $role, $id) {
        $stmt = $this->db->prepare("UPDATE users SET  name = ?, email = ?, password = ?, role = ? WHERE id = ?");
        $stmt->execute([$name, $email, $password, $role, $id]);
    }

    // Supprimez un user
    public function deleteUSer($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>