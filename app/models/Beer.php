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

    public function getBeerById($id) {
        $stmt = $this->db->prepare("SELECT * FROM beers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertId() {
        return $this->db->lastInsertId();
    }

    public function updateBeer($id, $name, $origin, $alcohol, $description, $average_price, $image_url) {
        $stmt = $this->db->prepare("UPDATE beers SET name = ?, origin = ?, alcohol = ?, description = ?, average_price = ?, image_url = ? WHERE id = ?");
        return $stmt->execute([$name, $origin, $alcohol, $description, $average_price, $image_url, $id]);
    }

    public function insertBeer($name, $origin, $alcohol, $description, $average_price, $image_url) {
        $stmt = $this->db->prepare("INSERT INTO beers (name, origin, alcohol, description, average_price, image_url) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $origin, $alcohol, $description, $average_price, $image_url]);
    }

    public function deleteBeerById($id) {
        $stmt = $this->db->prepare("DELETE FROM beers WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAllCategories() {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoriesByBeerId($beerId) {
        $stmt = $this->db->prepare("SELECT category_id FROM beer_categories WHERE beer_id = ?");
        $stmt->execute([$beerId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function updateBeerCategories($beerId, $categories) {
        $this->db->prepare("DELETE FROM beer_categories WHERE beer_id = ?")->execute([$beerId]);

        foreach ($categories as $categoryId) {
            $stmt = $this->db->prepare("INSERT INTO beer_categories (beer_id, category_id) VALUES (?, ?)");
            $stmt->execute([$beerId, $categoryId]);
        }
    }

    public function getBeerCategories($beerId) {
        $stmt = $this->db->prepare("
            SELECT c.name 
            FROM beer_categories bc
            JOIN categories c ON bc.category_id = c.id
            WHERE bc.beer_id = ?
        ");
        $stmt->execute([$beerId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getBeersByCategory($categoryId) {
        $stmt = $this->db->prepare(" 
            SELECT beers.* FROM beers 
            JOIN beer_categories ON beers.id = beer_categories.beer_id 
            WHERE beer_categories.category_id = ?
        ");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
