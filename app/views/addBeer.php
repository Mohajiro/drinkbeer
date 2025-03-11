<div class="container mx-auto p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h1 class="text-4xl font-extrabold text-center text-green-600 mb-6">🍺 Ajouter une bière</h1>

        <form action="/drinkbeer/insertBeer" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="origin" class="block text-lg font-medium text-gray-700">Origine</label>
                <input type="text" id="origin" name="origin" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="alcohol" class="block text-lg font-medium text-gray-700">Taux d'alcool (%)</label>
                <input type="number" step="0.1" id="alcohol" name="alcohol" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <div>
                <label for="average_price" class="block text-lg font-medium text-gray-700">Prix moyen (€)</label>
                <input type="number" step="0.01" id="average_price" name="average_price" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="image_url" class="block text-lg font-medium text-gray-700">Image URL</label>
                <input type="text" id="image_url" name="image_url" placeholder="assets/images/beer.jpg" required class="w-full p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-green-500">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                    Ajouter la bière
                </button>
            </div>
        </form>
    </div>
</div>
