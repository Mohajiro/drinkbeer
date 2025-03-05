<?php
require 'Database.php';
require 'User.php';

$userObj = new User();

$users = $userObj->getAllUsers();

// $userObj->addUser('Mohajiro', 'Qwerty2024', 'defrind@gmail.com', 'admin');

// $userObj->updateUser('Jane', 'Doe', 'jane.doe@example.com', '123456', 'admin', 32);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userObj->deleteUser((int)$_GET['id']);
    header("Location: index.php"); 
    exit();
}

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
            require 'inc/header.php';
        ?>
        <?php 
            require 'inc/list.php';
        ?>
    <table>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Creation date</th>
        <?php
            foreach ($users as $user):
        ?> 
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['role'] ?></td>
                <td><?php echo $user['created_at'] ?></td>
                <td>
                <a href="index.php?id=<?php echo $user['id']; ?>">
                   Delete
                </a>
            </td>
            </tr>
        <?php
        endforeach; 
        ?>
    </table>
        <?php 
            require 'inc/footer.php';
        ?>
    </div>
</body>
</html>