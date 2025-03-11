<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userName = $_SESSION['user_name'] ?? null;
$userRole = $_SESSION['user_role'] ?? null; 
?>

<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="/drinkbeer/home" class="flex items-center space-x-2">
            <img src="<?php echo WEB_ROOT; ?>assets/icons/logo.png" alt="Drink Beer Logo" class="h-10">
            <span class="text-xl font-bold text-blue-600">DrinkBeer</span>
        </a>

        <nav class="flex space-x-6">
            <?php if (!$userName || $userName === "User"): ?>
                <a href="/drinkbeer/inscription" class="text-gray-600 hover:text-blue-600">S'inscrir</a>
                <a href="/drinkbeer/login" class="text-gray-600 hover:text-blue-600">S'identifier</a>
            <?php else: ?>
                <span class="text-gray-600">Bonjour, <?php echo htmlspecialchars($userName); ?>!</span>
                <a href="/drinkbeer/logout" class="text-gray-600 hover:text-red-600">Déconnexion</a>
            <?php endif; ?>

            <a href="/drinkbeer/home" class="text-gray-600 hover:text-blue-600">Main Page</a>
            <a href="/drinkbeer/beers" class="text-gray-600 hover:text-blue-600">Catalogue des bières</a>

            <?php if ($userRole === 'admin'): ?>
                <a href="/drinkbeer/users" class="text-gray-600 hover:text-green-600">Users</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
