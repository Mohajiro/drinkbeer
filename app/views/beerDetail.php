<?php
$beerModel = new Beer();
$categories = $beerModel->getBeerCategories($beer['id']) ?? [];
?>

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-blue-600"><?php echo htmlspecialchars($beer['name']); ?></h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <img class="w-full h-96 object-cover" src="<?php echo WEB_ROOT; ?>assets/images/<?php echo htmlspecialchars(basename($beer['image_url'])); ?>" alt="<?php echo htmlspecialchars($beer['name']); ?>">

        <div class="p-6">
            <p class="text-gray-700 text-lg text-center mt-2"><?php echo htmlspecialchars($beer['description']); ?></p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <p class="text-gray-600 text-xl"><strong>Origine:</strong> <?php echo htmlspecialchars($beer['origin']); ?></p>
                <p class="text-gray-600 text-xl"><strong>Alcool:</strong> <?php echo htmlspecialchars($beer['alcohol']); ?>%</p>
                <p class="text-gray-600 text-xl"><strong>Prix Moyen:</strong> <?php echo htmlspecialchars($beer['average_price']); ?>€</p>
            </div>

            <div class="mt-4">
                <strong class="text-gray-700 text-lg">Catégories:</strong>
                <ul class="flex flex-wrap gap-2 mt-2">
                    <?php foreach ($categories as $category): ?>
                        <li class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm"><?php echo htmlspecialchars($category); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                <div class="mt-6 flex justify-center space-x-4">
                    <a href="/drinkbeer/beerForm?id=<?php echo $beer['id']; ?>" 
                       class="px-6 py-3 bg-yellow-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-yellow-600 transition-all">
                       Modifier
                    </a>
                    <a href="/drinkbeer/deleteBeer?id=<?php echo $beer['id']; ?>" 
                       class="px-6 py-3 bg-red-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-red-600 transition-all"
                       onclick="return confirm('Voulez-vous vraiment supprimer cette bière ?');">
                       Supprimer
                    </a>
                </div>
            <?php endif; ?>

            <a href="<?php echo WEB_ROOT; ?>beers" class="block text-center mt-6 px-6 py-3 bg-blue-500 text-white font-semibold text-lg rounded hover:bg-blue-600 transition duration-300">
                Retour au catalogue
            </a>
        </div>
    </div>
</div>
