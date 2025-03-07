<?php
require __DIR__ . '/controllers/BeerController.php';
require __DIR__ . '/controllers/AuthController.php';
require __DIR__ . '/controllers/UserController.php';

$beerController = new BeerController();
$authController = new AuthController();
$userController = new UserController();

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

    case 'users':
        $userController->index();
        exit; 

    case 'inscription':
        $view = 'inscription';
        break;
        
    case 'registerUser':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();
        }
        exit;

    case 'login':
        $view = 'login'; 
        break;
            
    case 'loginUser':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->login();
        }
        exit;

    case (preg_match('/^userForm(\?.*)?$/', $uri) ? true : false):
        $view = 'userForm';
        require __DIR__ . "/views/layout.php";
        exit;
    
    case 'deleteUser':
        $userController->delete();
        exit;

    default:
        http_response_code(404);
        $view = '404'; 
        break;
}

require "views/layout.php";
