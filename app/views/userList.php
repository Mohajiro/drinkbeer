<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Liste des utilisateurs</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nom</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Rôle</th>
                    <th class="border p-2">Créé le</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2 text-center"><?php echo htmlspecialchars($user['id']); ?></td>
                        <td class="border p-2"><?php echo htmlspecialchars($user['name']); ?></td>
                        <td class="border p-2"><?php echo htmlspecialchars($user['email']); ?></td>
                        <td class="border p-2"><?php echo htmlspecialchars($user['role']); ?></td>
                        <td class="border p-2"><?php echo htmlspecialchars($user['created_at']); ?></td>
                        <td class="border p-2 flex justify-center space-x-2">
                        <a href="/drinkbeer/userForm?id=<?php echo $user['id']; ?>" class="px-3 py-1 bg-blue-500 text-white rounded">Modifier</a>
                        <a href="/drinkbeer/deleteUser?id=<?php echo $user['id']; ?>" class="px-3 py-1 bg-red-500 text-white rounded" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
