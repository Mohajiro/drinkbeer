<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Obtenez tous les users
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajoutez un nouvel user
    public function addUser($name, $password, $email, $role) {
        $stmt = $this->db->prepare("INSERT INTO user (name password, email, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $password, $email, $role]); 
    }

    // Mettez à jour un user
    public function updateUser($name, $email, $password, $role, $id) {
        $stmt = $this->db->prepare("UPDATE user SET  name = ?, email = ?, password = ?, role = ? WHERE id = ?");
        $stmt->execute([$name, $email, $password, $role, $id]);
    }

    // Supprimez un user
    public function deleteUSer($id) {
        $stmt = $this->db->prepare("DELETE FROM user WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>