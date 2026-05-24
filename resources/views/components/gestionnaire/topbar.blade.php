{{-- resources/views/components/gestionnaire/topbar.blade.php --}}

<header class="fixed top-0 left-72 right-0 h-20 bg-white border-b shadow-sm z-40">

    <div class="h-full px-8 flex items-center justify-between">

        <!-- LEFT -->
        <div>

            <h2 class="text-2xl font-bold text-gray-800">
                Tableau de Bord Gestionnaire
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Gérez les logements, locataires et visites
            </p>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-5">

            <!-- SEARCH -->
            <div class="hidden lg:flex items-center bg-gray-100 px-4 py-3 rounded-2xl w-80">

                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>

                <input type="text"
                       placeholder="Rechercher..."
                       class="bg-transparent outline-none px-3 text-sm w-full">

            </div>

            <!-- NOTIFICATIONS -->
            <button class="relative w-12 h-12 rounded-2xl bg-gray-100 hover:bg-orange-100 hover:text-orange-500 transition flex items-center justify-center text-gray-600">

                <i class="fa-solid fa-bell text-lg"></i>

                <!-- BADGE -->
                <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-xs flex items-center justify-center">

                    5

                </span>

            </button>


            <!-- PROFILE -->
            <div class="flex items-center gap-3 bg-gray-100 px-4 py-2 rounded-2xl cursor-pointer hover:bg-gray-200 transition">

                <!-- IMAGE -->
                <img src="https://i.pravatar.cc/100"
                     alt="profil"
                     class="w-12 h-12 rounded-full object-cover border-2 border-orange-500">

                <!-- INFO -->
                <div class="hidden md:block">

                    <h3 class="text-sm font-semibold text-gray-800">
                        Paul Ndzi
                    </h3>

                    <p class="text-xs text-gray-500">
                        Gestionnaire
                    </p>

                </div>

                <!-- ICON -->
                <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>

            </div>

        </div>

    </div>

</header>
