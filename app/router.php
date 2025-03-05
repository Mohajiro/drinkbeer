<?php
require_once __DIR__ . '/controllers/BeerController.php';

$uri = trim(str_replace('/drinkbeer', '', $_SERVER['REQUEST_URI']), '/');

switch ($uri) {
    case '':
    case 'home':
        echo "<h1 class='text-center text-3xl mt-10'>🍻 Welcome to Drink Beer</h1>";
        break;

    case 'beers':
        $controller = new BeerController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        echo "<h1 class='text-center text-3xl mt-10 text-red-500'>404 - Page Not Found</h1>";
        break;
}
