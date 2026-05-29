<!-- resources/views/components/sidebar.blade.php -->

<aside class="w-72 h-screen bg-white shadow-lg fixed left-0 top-0 overflow-y-auto">

    <!-- LOGO -->
    <div class="h-20 flex items-center px-6 border-b">

        <a href="/" class="flex items-center gap-3">

            <!-- ICON -->
            <div
                class="w-11 h-11 rounded-xl bg-orange-500 flex items-center justify-center text-white text-xl">

                <i class="fa-solid fa-building"></i>

            </div>

            <!-- TEXT -->
            <div>

                <h1 class="text-xl font-bold text-gray-800">
                    GEST-IMMO
                </h1>

                <p class="text-xs text-gray-500">
                    Gestion des loyers
                </p>

            </div>

        </a>

    </div>

    <!-- MENU -->
    <div class="px-4 py-6">

        <!-- SECTION -->
        <p class="text-xs uppercase text-gray-400 font-semibold px-3 mb-4">
            Menu principal
        </p>

        <ul class="space-y-2">

            <!-- DASHBOARD -->
            <li>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-orange-500 text-white shadow-md">

                    <i class="fa-solid fa-house"></i>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>

            </li>


            <!-- Utilisaturs -->
            <li>

                <a href="{{route('users.list')}}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-user-tie"></i>

                    <span>
                        Utilisateurs
                    </span>

                </a>

            </li>

            <!-- GESTIONNAIRES -->
            <li>

                <a href="{{ route('users.list', ['role' => 'gestionnaire']) }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-user-tie"></i>

                    <span>
                        Gestionnaires
                    </span>

                </a>

            </li>

            <!-- LOGEMENTS -->
            <li>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-building"></i>

                    <span>
                        Logements
                    </span>

                </a>

            </li>

            <!-- LOCATAIRES -->
            <li>

                <a href="{{ route('users.list', ['role' => 'locataire']) }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-users"></i>

                    <span>
                        Locataires
                    </span>

                </a>

            </li>

            <!-- CONTRATS -->
            <li>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-file-contract"></i>

                    <span>
                        Contrats
                    </span>

                </a>

            </li>

            <!-- PAIEMENTS -->
            <li>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-money-bill-wave"></i>

                    <span>
                        Paiements
                    </span>

                </a>

            </li>

            <!-- VISITES -->
            <li>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                    <i class="fa-solid fa-calendar-check"></i>

                    <span>
                        Visites
                    </span>

                </a>

            </li>

        </ul>

        <!-- AUTRE SECTION -->
        <div class="mt-10">

            <p class="text-xs uppercase text-gray-400 font-semibold px-3 mb-4">
                Paramètres
            </p>

            <ul class="space-y-2">

                <!-- PROFILE -->
                <li>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                        <i class="fa-solid fa-user"></i>

                        <span>
                            Profil
                        </span>

                    </a>

                </li>

                <!-- SETTINGS -->
                <li>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-orange-100 hover:text-orange-500 transition">

                        <i class="fa-solid fa-gear"></i>

                        <span>
                            Paramètres
                        </span>

                    </a>

                </li>

                <div class="bg-white p-4 rounded shadow mb-6">
                    <h3 class="text-lg font-bold mb-2 text-slate-800">Visionner les autres espaces :</h3>
                    <div class="flex gap-4">
                        <a href="{{ route('gestionnaire.dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            <i class="fa-solid fa-user-gear mr-2"></i> Vue Gestionnaire
                        </a>
                        <a href="{{ route('dash-locataire') }}" class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition">
                            <i class="fa-solid fa-house-user mr-2"></i> Vue Locataire
                        </a>
                    </div>
                </div>

                <!-- LOGOUT -->
                <li>

                    <form action="{{route('logout')}}" method="POST">

                        @csrf

                        <button type="submit"
                            class="w-full flex items-center justify-center gap-3 bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl transition duration-300 shadow-sm">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Déconnexion

                        </button>

                    </form>

                </li>


            </ul>

        </div>

    </div>

</aside>
