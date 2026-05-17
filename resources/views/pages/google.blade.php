<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

    <!-- Titre -->
    <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">
      Se connecter
    </h1>

    <!-- Formulaire -->
    <form class="space-y-4">

      <div>
        <label class="block text-sm text-gray-600 mb-1">Email</label>
        <input
          type="email"
          placeholder="exemple@mail.com"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label class="block text-sm text-gray-600 mb-1">Mot de passe</label>
        <input
          type="password"
          placeholder="••••••••"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div class="flex justify-between items-center text-sm">
        <label class="flex items-center gap-2 text-gray-600">
          <input type="checkbox" />
          Se souvenir de moi
        </label>
        <a href="#" class="text-blue-500 hover:underline">Mot de passe oublié ?</a>
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
      >
        Se connecter
      </button>

    </form>

    <!-- Séparateur -->
    <div class="my-6 flex items-center gap-3">
      <div class="flex-1 h-px bg-gray-300"></div>
      <span class="text-sm text-gray-400">ou</span>
      <div class="flex-1 h-px bg-gray-300"></div>
    </div>

    <!-- Boutons sociaux -->
    <button class="w-full border py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-50">
      <span>🔵</span> Continuer avec Google
    </button>

    <button class="w-full border py-2 rounded-lg mt-3 flex items-center justify-center gap-2 hover:bg-gray-50">
      <span>📘</span> Continuer avec Facebook
    </button>

    <!-- Lien inscription -->
    <p class="text-center text-sm text-gray-500 mt-6">
      Pas de compte ?
      <a href="#" class="text-blue-500 hover:underline">Créer un compte</a>
    </p>

  </div>

</body>
</html>
