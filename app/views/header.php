<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="/drinkbeer/home" class="flex items-center space-x-2">
            <img src="assets/icons/logo.png" alt="Drink Beer Logo" class="h-10">
            <span class="text-xl font-bold text-blue-600">DrinkBeer</span>
        </a>
        <nav class="flex space-x-6">
            <p>Hello,
                <?php 
                if (!$_SESSION['user_name']) {
                    $_SESSION['user_name'] = 'User';
                    echo $_SESSION['user_name'];
                } else {
                    echo $_SESSION['user_name'];
                }
                ?>
            </p>
            <a href="/drinkbeer/login" class="text-gray-600 hover:text-blue-600">S'identifier</a>
            <a href="/drinkbeer/inscription" class="text-gray-600 hover:text-blue-600">S'inscrir</a>
            <a href="/drinkbeer/home" class="text-gray-600 hover:text-blue-600">Main Page</a>
            <a href="/drinkbeer/beers" class="text-gray-600 hover:text-blue-600">Catalogue des bieres</a>
        </nav>
    </div>
</header>