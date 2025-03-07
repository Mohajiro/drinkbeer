<?php
require_once __DIR__ . '/../models/User.php';

$userModel = new User();
$user = null;

if (!empty($_GET['id'])) {
    $user = $userModel->getUserById((int)$_GET['id']);
}

if (!$user) {
    echo "<p class='text-red-500 text-center'>Utilisateur introuvable !</p>";
    exit;
}
?>


<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Modifier l'utilisateur</h1>

    <form action="/drinkbeer/updateUser" method="POST" class="bg-white p-6 rounded-lg shadow-md w-1/2 mx-auto">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id'] ?? ''); ?>">

        <label for="name" class="block font-medium">Nom</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>" class="w-full p-2 border rounded mb-2">

        <label for="email" class="block font-medium">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" class="w-full p-2 border rounded mb-2">

        <label for="password" class="block font-medium">Mot de passe</label>
        <input type="password" id="password" name="password" class="w-full p-2 border rounded mb-2">

        <label for="role" class="block font-medium">Rôle</label>
        <select name="role" id="role" class="w-full p-2 border rounded mb-2">
            <option value="member" <?php echo ($user['role'] ?? '') === 'member' ? 'selected' : ''; ?>>Member</option>
            <option value="admin" <?php echo ($user['role'] ?? '') === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>

        <label for="date" class="block font-medium">Date de création</label>
        <input type="text" name="created_at" id="date" value="<?php echo htmlspecialchars($user['created_at'] ?? ''); ?>" class="w-full p-2 border rounded mb-2" disabled>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Enregistrer</button>
    </form>
</div>
