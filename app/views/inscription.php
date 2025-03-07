<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Créer un compte</h1>

    <form action="/drinkbeer/registerUser" method="POST" class="bg-white p-6 rounded-lg shadow-md w-1/2 mx-auto">
        <label for="name" class="block font-medium">Nom</label>
        <input type="text" id="name" name="name" required class="w-full p-2 border rounded mb-2">

        <label for="email" class="block font-medium">Email</label>
        <input type="email" id="email" name="email" required class="w-full p-2 border rounded mb-2">

        <label for="password" class="block font-medium">Mot de passe</label>
        <input type="password" id="password" name="password" required class="w-full p-2 border rounded mb-2">

        <label for="role" class="block font-medium">Rôle</label>
        <select name="role" id="role" class="w-full p-2 border rounded mb-2">
            <option value="member" selected>Membre</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">S'inscrire</button>
    </form>
</div>
