<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Connexion</h1>
    
    <form action="/drinkbeer/loginUser" method="POST" class="bg-white p-6 rounded-lg shadow-md w-1/2 mx-auto">
        <label for="email" class="block font-medium">Email:</label>
        <input type="email" name="email" placeholder="exemple@mail.com" required class="w-full p-2 border rounded mb-2">

        <label for="password" class="block font-medium">Mot de passe:</label>
        <input type="password" name="password" required class="w-full p-2 border rounded mb-2">

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
            Se connecter
        </button>
    </form>
</div>
