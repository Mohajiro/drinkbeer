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

    case 'updateBeer':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerController->updateBeer();
        }
        exit;

    case (preg_match('/^beerForm(\?.*)?$/', $uri) ? true : false):
        $view = 'beerForm';
        require __DIR__ . "/views/layout.php";
        exit; 
        
    case 'addBeer':
        $beerController->addBeer();
        exit;
    
    case 'insertBeer':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerController->insertBeer();
        }
        exit;
        
    case 'deleteBeer':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $beerController->deleteBeer();
        }
        exit;

    case (preg_match('/^beers(\?.*)?$/', $uri) ? true : false):
        $beerController->index();
        exit;

    case (preg_match('/^deleteBeer(\?.*)?$/', $uri) ? true : false):
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $beerController->deleteBeer();
        }
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

    case 'logout':
        $userController->logout();
        exit;
        
    case (preg_match('/^userForm(\?.*)?$/', $uri) ? true : false):
        $view = 'userForm';
        require __DIR__ . "/views/layout.php";
        exit;
    
    case (preg_match('/^deleteUser(\?.*)?$/', $uri) ? true : false):
        $userController->delete();
        exit;
    
    case 'updateUser':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->update();
        }
        exit;    

    case (preg_match('/^beer\/(\d+)$/', $uri, $matches) ? true : false):
        $beerController->showBeer($matches[1]);
        exit;    

    default:
        http_response_code(404);
        $view = '404'; 
        break;
}

require "views/layout.php";
