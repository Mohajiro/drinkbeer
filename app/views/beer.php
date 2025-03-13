<?php 
$beerModel = new Beer();
?>
    
<div class="container mx-auto p-6 flex items-end flex-col">
    <?php 
        $cat = $beerModel->getAllCategories();
    ?>
    <div class="flex flex-wrap gap-2 mt-4">
        <a href="/drinkbeer/beers" class="px-3 py-1 bg-gray-300 text-gray-800 rounded-lg text-sm <?php echo (!isset($_GET['category_id']) ? 'bg-blue-500 text-white' : ''); ?>">
            Toutes
        </a>
        <?php foreach ($cat as $category): ?>
            <a href="/drinkbeer/beers?category_id=<?php echo $category['id']; ?>"
            class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-sm <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $category['id']) ? 'bg-blue-500 text-white' : ''; ?>">
                <?php echo htmlspecialchars($category['name']); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 container mx-auto p-6">
    <?php foreach ($beers as $beer): ?>
        <?php $categories = $beerModel->getBeerCategories($beer['id']); ?>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:scale-105 transition duration-300 hover:shadow-xl">
            <a href="/drinkbeer/beer/<?php echo $beer['id']; ?>">
                <img src="<?php echo WEB_ROOT; ?>assets/images/<?php echo htmlspecialchars(basename($beer['image_url'])); ?>" 
                        alt="<?php echo htmlspecialchars($beer['name']); ?>" 
                        class="w-full h-56 object-cover rounded-t-xl">
            </a>
            <div class="p-5">
                <h2 class="text-2xl font-bold text-gray-800 truncate"><?php echo htmlspecialchars($beer['name']); ?></h2>
                <p class="text-gray-600 text-sm">Origine: <strong><?php echo htmlspecialchars($beer['origin']); ?></strong></p>
                <p class="text-gray-600 text-sm">Alcool: <strong><?php echo htmlspecialchars($beer['alcohol']); ?>%</strong></p>
                <p class="text-gray-500 text-sm mt-2  overflow-hidden truncate"><?php echo htmlspecialchars($beer['description']); ?></p>
                <p class="mt-4 text-xl font-bold text-blue-500"><?php echo htmlspecialchars($beer['average_price']); ?>€</p>

                <div class="mt-4">
                    <strong class="text-gray-700 text-sm">Catégories:</strong>
                    <ul class="flex flex-wrap gap-1 mt-2">
                        <?php foreach ($categories as $category): ?>
                            <li class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs"><?php echo htmlspecialchars($category); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <a href="/drinkbeer/beer/<?php echo $beer['id']; ?>" 
                        class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 transition-all">
                        Voir plus
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
