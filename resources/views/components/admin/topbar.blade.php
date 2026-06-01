<!-- resources/views/components/topbar.blade.php -->

<header
    class="fixed top-0 left-72 right-0 h-20 bg-white shadow-sm border-b z-40">

    <div class="h-full px-8 flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-5">

            <!-- MENU BUTTON MOBILE -->
            <button class="lg:hidden text-2xl text-gray-700">

                <i class="fa-solid fa-bars"></i>

            </button>

            <!-- SEARCH -->
            <div class="hidden md:flex items-center bg-gray-100 rounded-xl px-4 py-3 w-96">

                <i class="fa-solid fa-magnifying-glass text-gray-400 mr-3"></i>

                <input type="text"
                    placeholder="Rechercher..."
                    class="bg-transparent outline-none w-full text-sm text-gray-700 placeholder-gray-400">

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-6">

            <!-- NOTIFICATIONS -->
            <button
                class="relative w-11 h-11 rounded-full bg-gray-100 flex items-center justify-center hover:bg-orange-100 transition">

                <i class="fa-regular fa-bell text-gray-600"></i>

                <!-- DOT -->
                <span
                    class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full">
                </span>

            </button>

            <!-- MESSAGE -->
            <button
                class="relative w-11 h-11 rounded-full bg-gray-100 flex items-center justify-center hover:bg-orange-100 transition">

                <i class="fa-regular fa-envelope text-gray-600"></i>

                <!-- DOT -->
                <span
                    class="absolute top-2 right-2 w-2.5 h-2.5 bg-orange-500 rounded-full">
                </span>

            </button>

            <!-- PROFILE -->
            <div class="flex items-center gap-3 bg-gray-100 px-4 py-2 rounded-2xl cursor-pointer hover:bg-gray-200 transition">

                @if(auth()->user()->image)
                {{-- Cas 1 : Si l'image vient d'un formulaire (Profil modifié via l'application) --}}
                @if(str_starts_with(auth()->user()->image, 'avatars/') || str_starts_with(auth()->user()->image, 'user_images/'))
                <img src="{{ asset('storage/' . auth()->user()->image) }}"
                    alt="Profil de {{ auth()->user()->name }}"
                    class="w-12 h-12 rounded-full object-cover border-2 border-orange-500">

                {{-- Cas 2 : Si c'est l'image locale du Seeder (images/avatars/...) --}}
                @else
                <img src="{{ asset(auth()->user()->image) }}"
                    alt="Profil de {{ auth()->user()->name }}"
                    class="w-12 h-12 rounded-full object-cover border-2 border-orange-500">
                @endif
                @else
                {{-- Cas 3 : Si aucune image n'est définie --}}
                <img src="{{ asset('images/default-avatar.png') }}"
                    alt="Profil par défaut"
                    class="w-12 h-12 rounded-full object-cover border-2 border-orange-500 opacity-80">
                @endif

                <div class="hidden md:block">
                    <h3 class="text-sm font-semibold text-gray-800 capitalize">
                        {{ auth()->user()->name }}
                    </h3>
                    <p class="text-xs text-gray-500 uppercase font-medium tracking-wider">
                        {{ auth()->user()->roles }}
                    </p>
                </div>

                <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>

            </div>

        </div>

    </div>

</header>
