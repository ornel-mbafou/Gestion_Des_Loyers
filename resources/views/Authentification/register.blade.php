{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">



    <main>
        <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-8">

            <div class="w-full max-w-lg bg-white rounded-3xl shadow-xl overflow-hidden">

                <!-- TOP -->
                <div class="bg-orange-500 p-8 text-center">

                    <!-- LOGO -->
                    <div class="flex items-center justify-center gap-4">

                        <div class="w-15 h-15 bg-white rounded-full flex items-center justify-center text-orange-500 text-3xl shadow-lg">


                            <i class="fa-solid fa-house"></i>

                        </div>

                        <h1 class="text-3xl font-bold text-white">
                            GEST-IMMO
                        </h1>
                    </div>

                    <p class="text-orange-100 mt-2 text-sm">
                        Création d’un compte utilisateur
                    </p>

                </div>

                <!-- FORM -->
                <div class="p-8">

                    <!-- TITLE -->
                    <div class="text-center mb-8">

                        <h2 class="text-2xl font-bold text-gray-800">
                            Inscription
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm">
                            Remplissez les informations ci-dessous
                        </p>

                    </div>

                    <!-- FORM -->
                    <form action="" method="POST" class="space-y-5">

                        @csrf

                        <!-- NAME -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nom complet
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                                    <i class="fa-solid fa-user"></i>

                                </span>

                                <input type="text"
                                    name="name"
                                    placeholder="Jean Dupont"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Adresse email
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                                    <i class="fa-solid fa-envelope"></i>

                                </span>

                                <input type="email"
                                    name="email"
                                    placeholder="exemple@gmail.com"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                            </div>

                        </div>

                        <!-- PHONE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Téléphone
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                                    <i class="fa-solid fa-phone"></i>

                                </span>

                                <input type="text"
                                    name="telephone"
                                    placeholder="+237 6XXXXXXXX"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                            </div>

                        </div>

                        <!-- PASSWORD -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Mot de passe
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                                    <i class="fa-solid fa-lock"></i>

                                </span>

                                <input type="password"
                                    name="password"
                                    placeholder="********"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                            </div>

                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Confirmer le mot de passe
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                                    <i class="fa-solid fa-lock"></i>

                                </span>

                                <input type="password"
                                    name="password_confirmation"
                                    placeholder="********"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none">

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition duration-300 shadow-md">

                            <i class="fa-solid fa-user-plus mr-2"></i>

                            Créer un compte

                        </button>

                    </form>

                    <!-- LOGIN -->
                    <div class="text-center mt-8">

                        <p class="text-gray-600 text-sm">

                            Vous avez déjà un compte ?

                            <a href="{{ route('login') }}"
                                class="text-orange-500 font-medium hover:underline">

                                Se connecter

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>
    </main>



</body>

</html>
