<div class="container mx-auto p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h1 class="text-4xl font-extrabold text-center text-green-600 mb-6">🍺 Ajouter une bière</h1>

        <form action="/drinkbeer/insertBeer" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" value="" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="origin" class="block text-lg font-medium text-gray-700">Origine</label>
                <input type="text" id="origin" name="origin" value="" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="alcohol" class="block text-lg font-medium text-gray-700">Taux d'alcool (%)</label>
                <input type="number" step="0.1" id="alcohol" name="alcohol" value="" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <div>
                <label for="average_price" class="block text-lg font-medium text-gray-700">Prix moyen (€)</label>
                <input type="number" step="0.01" id="average_price" name="average_price" value="" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="image_url" class="block text-lg font-medium text-gray-700">Image URL</label>
                <input type="text" id="image_url" name="image_url" value="" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="categories" class="block text-lg font-medium text-gray-700">Catégories</label>
                <select id="categories" name="categories[]" multiple class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                    <?php if (isset($categories) && !empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-red-500">Aucune catégorie trouvée.</p>
                    <?php endif; ?>
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                    Ajouter la bière
                </button>
            </div>
        </form>
    </div>
</div>
