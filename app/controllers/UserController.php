<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        $view = 'userList';
        require __DIR__ . '/../views/layout.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $userId = (int)$_GET['id'];
    
            if ($this->userModel->getUserById($userId)) {
                $this->userModel->deleteUser($userId);
                header("Location: /drinkbeer/users");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'> L'utilisateur n'existe pas.</p>";
            }
        }
    }
    

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $role = isset($_POST['role']) ? $_POST['role'] : 'member';
    
            if ($this->userModel->registerUser($name, $email, $password, $role)) {
                header("Location: /drinkbeer/users");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'>Erreur lors de l'inscription.</p>";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
    
            $user = $this->userModel->getUserByEmail($email);
    
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
    
                header("Location: /drinkbeer/home");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'> Identifiants incorrects.</p>";
            }
        }
    }   
    
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        session_unset();
        session_destroy();
    
        header("Location: /drinkbeer/login");
        exit();
    } 

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $userId = (int)$_POST['id'];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $role = $_POST['role'];
    
            if (!empty($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $password = null; 
            }
    
            if ($this->userModel->updateUser($userId, $name, $email, $password, $role)) {
                header("Location: /drinkbeer/users");
                exit();
            } else {
                echo "<p class='text-red-500 text-center'> Erreur lors de la modification.</p>";
            }
        }
    }
    
}

