<?php
class Beer {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllBeers() {
        $stmt = $this->db->query("SELECT * FROM beers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBeer($name, $origin, $alcohol, $description, $image_url, $average_price) {
        $stmt = $this->db->prepare("INSERT INTO beers (name, origin, alcohol, description, image_url, average_price) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $origin, $alcohol, $description, $image_url, $average_price]); 
    }

    public function updateBeer($id, $name, $origin, $alcohol, $description, $image_url, $average_price) {
        $stmt = $this->db->prepare("UPDATE beers SET name = ?, origin = ?, alcohol = ?, description = ?, 
                                    image_url = ?, average_price = ? WHERE id = ?");
        $stmt->execute([$name, $origin, $alcohol, $description, $image_url, $average_price, $id]);
    }

    public function deleteBeer($id) {
        $stmt = $this->db->prepare("DELETE FROM beers WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
