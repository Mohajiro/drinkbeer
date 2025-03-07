<?php
require_once __DIR__ . '/../models/Beer.php';

class BeerController {
    public function index() {
        $beerModel = new Beer();
        $beers = $beerModel->getAllBeers();
        $view = 'beer';
        require __DIR__ . '/../views/layout.php'; 
    }
}
