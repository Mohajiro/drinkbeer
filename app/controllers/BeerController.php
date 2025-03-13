<?php
require_once __DIR__ . '/../models/Beer.php';

class BeerController {
    private $beerModel;

    public function __construct() {
        $this->beerModel = new Beer();
    }

    public function index() {
        $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;

        if ($categoryId) {
            $beers = $this->beerModel->getBeersByCategory($categoryId);
        } else {
            $beers = $this->beerModel->getAllBeers();
        }

        $categories = $this->beerModel->getAllCategories();
        $view = 'beer';
        require __DIR__ . '/../views/layout.php';
    }

    public function showBeer($id) {
        $beer = $this->beerModel->getBeerById($id);

        if (!$beer) {
            http_response_code(404);
            echo "<h1 class='text-red-500 text-center text-3xl'>404 - Beer Not Found</h1>";
            exit;
        }

        $view = 'beerDetail';
        require __DIR__ . '/../views/layout.php';
    }

    public function addBeer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $origin = trim($_POST['origin']);
            $alcohol = (float)$_POST['alcohol'];
            $description = trim($_POST['description']);
            $average_price = (float)$_POST['average_price'];
            $image_url = trim($_POST['image_url']);
            $categories = $_POST['categories'] ?? [];

            if ($this->beerModel->insertBeer($name, $origin, $alcohol, $description, $average_price, $image_url)) {
                $beerId = $this->beerModel->getLastInsertedId();
                $this->beerModel->updateBeerCategories($beerId, $categories);
                header("Location: /drinkbeer/beers");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'> Erreur lors de l'ajout de la bière.</p>";
            }
        }
    }

    public function deleteBeer() {
        if (isset($_GET['id'])) {
            $beerId = (int)$_GET['id'];

            if ($this->beerModel->getBeerById($beerId)) {
                $this->beerModel->deleteBeerById($beerId);
                header("Location: /drinkbeer/beers");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'>Cette bière n'existe pas.</p>";
            }
        }
    }

    public function updateBeer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $beerId = (int)$_POST['id'];
            $name = trim($_POST['name']);
            $origin = trim($_POST['origin']);
            $alcohol = (float)$_POST['alcohol'];
            $description = trim($_POST['description']);
            $average_price = (float)$_POST['average_price'];
            $image_url = trim($_POST['image_url']);
            $categories = $_POST['categories'] ?? [];

            if ($this->beerModel->updateBeer($beerId, $name, $origin, $alcohol, $description, $average_price, $image_url)) {
                $this->beerModel->updateBeerCategories($beerId, $categories);
                header("Location: /drinkbeer/beers");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'>Erreur lors de la modification.</p>";
            }
        }
    }
}
