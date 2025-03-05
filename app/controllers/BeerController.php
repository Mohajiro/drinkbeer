<?php
require_once __DIR__ . '/../models/Beer.php'; 

class BeerController {
    public function index() {
        $beerModel = new Beer();
        $beers = $beerModel->getAllBeers(); 
        require __DIR__ . '/../views/beer/index.php'; 
    }
}
