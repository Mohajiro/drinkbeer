<?php
require 'Database.php';
require 'Users.php';
require 'Beers.php';

$beerObj = new Beer();

$beers = $beerObj->getAllBeers();

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
    <title>Beer Catalog</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php require 'inc/header.php'; ?>

        <h1 class="title">Beer Catalog</h1>
        
        <div class="beer-grid">
            <?php foreach ($beers as $beer): ?>
                <div class="card">
                    <img class="beer-img" src="<?php echo htmlspecialchars($beer['image_url']); ?>" alt="<?php echo htmlspecialchars($beer['name']); ?>">
                    <div class="card-body">
                        <h2 class="beer-name"><?php echo htmlspecialchars($beer['name']); ?></h2>
                        <p class="beer-origin"> Origin: <strong><?php echo htmlspecialchars($beer['origin']); ?></strong></p>
                        <p class="beer-alcohol"> Alcohol: <strong><?php echo htmlspecialchars($beer['alcohol']); ?>%</strong></p>
                        <p class="beer-description"><?php echo htmlspecialchars($beer['description']); ?></p>
                        <p class="beer-price"> Price: <strong>$<?php echo htmlspecialchars($beer['average_price']); ?></strong></p>

                        <!-- <a class="delete-btn" href="index.php?id=<?php echo $beer['id']; ?>"> Delete</a> -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php require 'inc/footer.php'; ?>
    </div>
</body>
</html>
