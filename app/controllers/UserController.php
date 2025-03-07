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
        if (isset($_GET['id'])) {
            $this->userModel->deleteUser($_GET['id']);
        }
        header("Location: /drinkbeer/users");
        exit();
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
            session_start(); // Стартуем сессию
    
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
}

