<?php
require __DIR__ . '/controllers/BeerController.php';

$beerController = new BeerController();
$view = 'home'; 

$uri = trim(str_replace('/drinkbeer', '', $_SERVER['REQUEST_URI']), '/');

switch ($uri) {
    case '':
    case 'home':
        $view = 'home'; 
        break;

    case 'beers':
        $beerController->index();
        exit; 

    default:
        http_response_code(404);
        $view = '404'; 
        break;
}

require "views/layout.php";