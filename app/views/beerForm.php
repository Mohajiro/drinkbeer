<?php
require_once __DIR__ . '/../models/Beer.php';

$beerModel = new Beer();
$beer = null;

if (isset($_GET['id'])) {
    $beer = $beerModel->getBeerById((int)$_GET['id']);
}

if (!$beer) {
    echo "<p class='text-red-500 text-center text-2xl mt-10'>Cette bière n'existe pas.</p>";
    exit;
}

$categories = $beerModel->getAllCategories();
$selectedCategories = $beerModel->getCategoriesByBeerId($beer['id']);
?>

<div class="container mx-auto p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-6">Modifier la bière </h1>

        <form action="/drinkbeer/updateBeer" method="POST" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($beer['id']); ?>">

            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($beer['name']); ?>" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="origin" class="block text-lg font-medium text-gray-700">Origine</label>
                <input type="text" id="origin" name="origin" value="<?php echo htmlspecialchars($beer['origin']); ?>" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="alcohol" class="block text-lg font-medium text-gray-700">Taux d'alcool (%)</label>
                <input type="number" step="0.1" id="alcohol" name="alcohol" value="<?php echo htmlspecialchars($beer['alcohol']); ?>" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($beer['description']); ?></textarea>
            </div>

            <div>
                <label for="average_price" class="block text-lg font-medium text-gray-700">Prix moyen (€)</label>
                <input type="number" step="0.01" id="average_price" name="average_price" value="<?php echo htmlspecialchars($beer['average_price']); ?>" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="image_url" class="block text-lg font-medium text-gray-700">Image URL</label>
                <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($beer['image_url']); ?>" class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="categories" class="block text-lg font-medium text-gray-700">Catégories</label>
                <select id="categories" name="categories[]" multiple class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"
                            <?php echo in_array($category['id'], $selectedCategories) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300 transform hover:scale-105">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
