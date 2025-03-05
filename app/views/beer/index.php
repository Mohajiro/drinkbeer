<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6"> Beer Catalog</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($beers as $beer) : ?>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="<?php echo htmlspecialchars($beer['image_url']); ?>" alt="<?php echo htmlspecialchars($beer['name']); ?>">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($beer['name']); ?></h2>
                        <p class="text-gray-600"> Origin: <strong><?php echo htmlspecialchars($beer['origin']); ?></strong></p>
                        <p class="text-gray-600"> Alcohol: <strong><?php echo htmlspecialchars($beer['alcohol']); ?>%</strong></p>
                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($beer['description']); ?></p>
                        <p class="mt-2 text-lg font-bold text-blue-500"> $<?php echo htmlspecialchars($beer['average_price']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
